<?php
session_start();
include('../connection.php');
$name=$_POST['user_name'];
$password=$_POST['password'];
$sql="SELECT * FROM `users` WHERE `user_name`='$name' AND `password`='$password'  ";
$result=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($result);

if($row)
{
    $_SESSION['auth']= "true";
    $_SESSION['user_name']=$row['user_name'];
    $_SESSION['role'] =$row['role'];
    date_default_timezone_set('Asia/Yangon');
    $time=date('d-m-Y h:i:s A');
    $log_description=$row['user_name']."  logged in "." at ".$time;
    $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);
    
    header("location:../index.php");
}
else
{
   echo"error";
}
?>
