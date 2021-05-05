<?php
session_start();
$uid=$_SESSION['login_admin'];
include 'db2.php';
$su_id=$_GET['b_id'];
$tme=date("d/m/Y h:i A");
mysqli_query($con,"INSERT INTO `order_db`(`user_id`, `book_id`, `time`, `status`)
     VALUES ('$uid','$su_id','$tme','Ordered')");
header('location: user_dashboard.php');
?>
