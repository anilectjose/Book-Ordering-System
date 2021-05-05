<?php 
include 'db2.php';

 if(isset($_POST['submit']))
 {

    $name=$_POST['exampleInputName1'];
    $auth=$_POST['exampleInputEmail1'];    
    $pric=$_POST['exampleInputPhone1'];
    $stry=$_POST['exampleInputPlace1'];
    $cate=$_POST['exampleInputPassword1'];

    $fileName=$_FILES["file"]["name"];
    $targetDir="bookimages/";
    $targetFilePath = $targetDir . $fileName; 
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

    mysqli_query($con, "INSERT INTO `books`(`B_Name`, `B_Author`, `B_Price`, `B_Category`, `Story_line`,`b_pic`)
     VALUES ('$name','$auth','$pric','$cate','$stry','$fileName')");

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
            <h1 class="m-0">Add Books</h1>
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

    <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputName1">Book Name</label>
                    <input type="text" class="form-control" name="exampleInputName1" placeholder="Enter book name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Author Name</label>
                    <input type="text" class="form-control" name="exampleInputEmail1" placeholder="Enter author name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPhone1">Price</label>
                    <input type="number" class="form-control" name="exampleInputPhone1" placeholder="Enter price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <input type="text" class="form-control" name="exampleInputPassword1" placeholder="Enter category">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPlace1">Story</label>
                    <input type="text" class="form-control" name="exampleInputPlace1" placeholder="Enter story">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Add Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                        <label class="custom-file-label" for="exampleInputFile">Upload Front Page</label>
                      </div>
                      <div class="input-group-append">
                        <input type="submit" class="btn btn-success" style="margin-left:20px;" value="Add Book" name="submit">
                      </div>
                    </div>
                  </div>
                </div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'jss.php'; ?>
</body>
</html>
