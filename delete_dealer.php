<?php
include 'db2.php';
$su_id=$_GET['b_id'];
mysqli_query($con,"DELETE FROM `dealer_db` WHERE role_id='$su_id'");
mysqli_query($con,"DELETE FROM `role_db` WHERE role_id='$su_id'");
header('location: view_dealers.php');
?>
