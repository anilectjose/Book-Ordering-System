<?php
include 'db2.php';
session_start();

if (isset($_POST["submit"]))
{
  $usrname = $_POST['usrnm'];
  $epassword = $_POST['pswd'];

  $sql=mysqli_query($con,"SELECT * FROM role_db WHERE `uname`='$usrname' AND `password`='$epassword'");
  while ($row = mysqli_fetch_assoc($sql)) {

  if($row['role']=='admin')
  {
    $_SESSION['login_admin']=$row['role_id'];
    header("location: dashboard.php");
  }
  elseif($row['role']=='dealer')
  {
    $_SESSION['login_admin']=$row['role_id'];
    header("location: dealer_dashboard.php");
  }
  elseif($row['role']=='user')
  {
    $_SESSION['login_admin']=$row['role_id'];
    header("location: user_dashboard.php");
  }
  else
  {
    echo "<script>alert('Username and password are incorrect')</script>";
    echo "<script>window.location='user_dashboard.php'</script>";
  }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Book Rental </b>System</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email" name="usrnm">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pswd">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" value="Sign In" name="submit">
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-0">
        <a href="register.php" class="text-center" style="color:red;">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
