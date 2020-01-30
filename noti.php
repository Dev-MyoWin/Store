<?php

$id=$_COOKIE['notivar'];


session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$sql="UPDATE notifications SET flag='read' WHERE id=$id";
mysqli_query($conn,$sql);



header("location:notifications.php");



}
else
{
    header("location:auth/login.php");
}



?>