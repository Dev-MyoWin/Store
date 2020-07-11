<?php
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$id=$_GET['id'];
$sql="UPDATE  `users` SET `soft_delete`='true' WHERE id=$id";
mysqli_query($conn,$sql);
header("location:editor_list.php");
}
else
{
    header("location:auth/login.php");
}
?>