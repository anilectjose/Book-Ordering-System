<?php 
include 'db2.php';

 if(isset($_POST['submit']))
 {

    $name=$_POST['exampleInputName1'];
    $email=$_POST['exampleInputEmail1'];    
    $phone=$_POST['exampleInputPhone1'];
    $place=$_POST['exampleInputPlace1'];
    $passw=$_POST['exampleInputPassword1'];

    $fileName=$_FILES["file"]["name"];
    $targetDir="profile/";
    $targetFilePath = $targetDir . $fileName; 
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    mysqli_query($con, "INSERT INTO `role_db`(`uname`, `password`, `role`,`sts`) VALUES ('$name','$passw','dealer',1)");
    $roleid =mysqli_insert_id($con);
    mysqli_query($con,"INSERT INTO `dealer_db`(`d_name`, `d_email`, `d_phone`, `d_place`, `d_pic`, `role_id`) 
    VALUES ('$name','$email','$phone','$place','$fileName','$roleid')");

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
            <h1 class="m-0">Add Dealer</h1>
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
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="exampleInputName1" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" class="form-control" name="exampleInputPhone1" placeholder="Enter phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Place</label>
                    <input type="text" class="form-control" name="exampleInputPlace1" placeholder="Enter place">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                        <label class="custom-file-label" for="exampleInputFile">Upload proof</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="submit">
                  <input type="reset" class="btn btn-danger" style="margin-left:20px;">
                  <a href="view_dealers.php">
                      <input type="button" class="btn btn-warning" style="margin-left:20px;" value="View all Dealers">
                      </a>
                </div>
              </form>
            </div>
            <!-- /.card -->
      <!-- /.content -->
    </div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'jss.php'; ?>
</body>
</html>
