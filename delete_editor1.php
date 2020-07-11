<?php
ob_start();
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$id=$_GET['id'];

$editor_name_result=mysqli_query($conn,"SELECT * FROM `users` WHERE id=$id");
$editor_name_row=mysqli_fetch_assoc($editor_name_result);
$editor_name=$editor_name_row['user_name'];

$sql="DELETE FROM `users`  WHERE id=$id";
mysqli_query($conn,$sql);


date_default_timezone_set('Asia/Yangon');
    $time=date('d-m-Y h:i:s A');
    $log_description=$_SESSION['user_name']." Delete Editor ".' ('.$editor_name.') '." at ".$time;
    $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);
header("location:editor_trash.php");

}
else
{
    header("location:auth/login.php");
}
?>