<?php
ob_start();
include('connection.php');
$name=$_POST['name'];
$user_name=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
if($password==$confirm)
{

$sql="INSERT INTO `users` (`name`,`user_name`,`email`,`password`,`role`,`soft_delete`) VALUES ('$name','$user_name','$email','$password','editor','false')";
mysqli_query($conn,$sql);
date_default_timezone_set('Asia/Yangon');
    $time=date('d-m-Y h:i:s A');
    $log_description=" Admin add editor ".' ('.$user_name.') '." at ".$time;
    $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);

header("location:editor_list.php");
}
else
{
    header("location:../editor_form.php");
}
?>