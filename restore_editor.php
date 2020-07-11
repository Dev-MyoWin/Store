<?php
ob_start();
session_start();
if(isset($_SESSION['auth'])&& ($_SESSION['role'])=='admin')
{

include('connection.php');
$id=$_GET['id'];
$sql="UPDATE  `users` SET `soft_delete`='false' WHERE id=$id";
mysqli_query($conn,$sql);

 header("location:editor_trash.php");


}
else
{
    header("location:auth/login.php");
}
?>