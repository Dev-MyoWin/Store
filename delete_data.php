<?php
ob_start();
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$sql="DELETE FROM products ";
$sql1="DELETE FROM categories ";
$sql2="DELETE FROM `users` WHERE `role`!='admin'";
$sql3="DELETE FROM log";
$sql4="DELETE FROM notifications";
mysqli_query($conn,$sql);
mysqli_query($conn,$sql1);
mysqli_query($conn,$sql2);
mysqli_query($conn,$sql3);
mysqli_query($conn,$sql4);

date_default_timezone_set('Asia/Yangon');
    $time=date('d-m-Y h:i:s A');
    $log_description=$_SESSION['user_name']." Delete All DATA "." at ".$time;
    $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);
header("location:auth/login.php");
}
else
{
    header("location:auth/login.php");
}
?>