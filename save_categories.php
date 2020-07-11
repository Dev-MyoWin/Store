<?php
ob_start();
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$name=$_POST['name'];
$sql="INSERT INTO `categories`(`name`) VALUE ('$name')";
mysqli_query($conn,$sql);
date_default_timezone_set('Asia/Yangon');
    $time=date('d-m-Y h:i:s A');
    $log_description=$_SESSION['user_name']."  add category ".' ('.$name.') '." at ".$time;
    $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);
    header("location:categories.php");

}
else
{
    header("location:auth/login.php");
}
?>