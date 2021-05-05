<?php
include 'db2.php';
$su_id=$_GET['b_id'];
mysqli_query($con,"DELETE FROM `books` WHERE book_id='$su_id'");
header('location: dealer_view_books.php');
?>
