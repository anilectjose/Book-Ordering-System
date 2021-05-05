<?php
include 'db2.php';
$su_id=$_GET['o_id'];
$stts=$_GET['sts'];
if($stts==1){
   mysqli_query($con,"UPDATE `order_db` SET `status`='Placed'  WHERE `order_id`='$su_id'");
}
elseif($stts==2){
   mysqli_query($con,"UPDATE `order_db` SET `status`='Cancelled'  WHERE `order_id`='$su_id'");
}
elseif($stts==3){
    mysqli_query($con,"UPDATE `order_db` SET `status`='Delivered'  WHERE `order_id`='$su_id'");
 }
header('location: manage_orders.php');
?>
