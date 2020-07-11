<?php
ob_start();
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$id=$_GET['id'];
$sql="DELETE FROM products WHERE id=$id";
mysqli_query($conn,$sql);
date_default_timezone_set('Asia/Yangon');
    $time=date('d-m-Y h:i:s A');
    $log_description=$_SESSION['user_name']." delete product "." at ".$time;
    $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);
header("location:products.php");

}
else
{
    header("location:auth/login.php");
}
?>
