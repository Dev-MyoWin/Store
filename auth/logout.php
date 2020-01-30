<?php 
session_start();
include("../connection.php");
date_default_timezone_set('Asia/Yangon');
$time=date('d-m-Y h:i:s A');
$log_description= $_SESSION['user_name']."  logged out  "." at ".$time;
$log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
mysqli_query($conn,$log_sql);
session_destroy();
header("location:login.php");
?>
