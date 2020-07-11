<?php
ob_start();
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$sql="UPDATE notifications SET flag='read'";
mysqli_query($conn,$sql);



header("location:notifications.php");



}
else
{
    header("location:auth/login.php");
}



?>