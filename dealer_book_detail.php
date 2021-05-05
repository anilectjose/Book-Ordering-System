<?php 
include 'db2.php';
$bo_id=$_GET['b_id'];
$result=mysqli_query($con,"SELECT * FROM `books` where book_id='$bo_id'");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BRS</title>

  <?php include 'css.php'; ?>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'header.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'sidebar2.php'; ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Book Detailed</h1>
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
                  <!-- /.card-header -->
             <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
                 <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                      <?php while($row=mysqli_fetch_assoc($result)){ ?>
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        <h3><?php echo $row['B_Name'];?> <br>
                        ₹<?php echo $row['B_Price'];?> </h3>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
                      <img src="bookimages/<?php echo $row['b_pic'];?>" alt="<?php echo $row['b_pic'];?>" width="250" height="350" style="margin-left:400px;"><br>
                          <h5><b>Author: </b> <?php echo $row['B_Author'];?> <br>
                          <b>Story Line:</b><div style="margin:-23px 0 0 100px;"><?php echo $row['Story_line'];?></div></h5>
                        <a href="edit_book.php?b_id=<?php echo $row['book_id'];?>">
                        <input type="button" class="btn btn-success" style="margin-left:400px; margin-top:30px;" value="Edit details"></a>
                        <a href="delete_book.php?b_id=<?php echo $row['book_id'];?>">
                        <input type="button" class="btn btn-danger" style="margin-left:20px; margin-top:30px;" value="Delete this book"></a>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
</div></div>
      <!-- Main content -->
        
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021 <a href="#">Book Rental</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.1.0
      </div>
    </footer>
  </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'jss.php'; ?>
</body>
</html>
