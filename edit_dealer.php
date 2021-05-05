<?php 
include 'db2.php';

$su_id=$_GET['b_id'];
$result=mysqli_query($con,"SELECT * FROM `dealer_db` join role_db on dealer_db.role_id=role_db.role_id where role_db.role_id='$su_id'");

if(isset($_POST['submit']))
 {

    $name=$_POST['exampleInputName1'];
    $email=$_POST['exampleInputEmail1'];    
    $phone=$_POST['exampleInputPhone1'];
    $place=$_POST['exampleInputPlace1'];
    $passw=$_POST['exampleInputPassword1'];

    mysqli_query($con, "UPDATE `role_db` SET `uname`='$name',`password`='$passw' WHERE role_id='$su_id'");

    mysqli_query($con,"UPDATE `dealer_db` SET `d_name`='$name',
    `d_email`='$email',`d_phone`='$phone',`d_place`='$place' WHERE role_id='$su_id'");

        echo "<script>alert('Added');</script>";
        echo "<script>window.history.back();</script>";
 }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BRS</title>

  <?php include 'css.php'; ?>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'header.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'sidebar.php'; ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Dealer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Enter below fields</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php while($row=mysqli_fetch_assoc($result)){ ?>
              <form method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="exampleInputName1" placeholder="Enter name" value="<?php echo $row['uname'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="exampleInputEmail1" placeholder="Enter email" value="<?php echo $row['d_email'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" class="form-control" name="exampleInputPhone1" placeholder="Enter phone" value="<?php echo $row['d_phone'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Place</label>
                    <input type="text" class="form-control" name="exampleInputPlace1" placeholder="Enter place" value="<?php echo $row['d_place'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="exampleInputPassword1" placeholder="Password" value="<?php echo $row['password'];?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Update" name="submit">
                  <input type="reset" class="btn btn-danger" style="margin-left:20px;">
                </div>
              </form>
              <?php } ?>
            </div>
            <!-- /.card -->
      <!-- /.content -->
    </div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'jss.php'; ?>
</body>
</html>
