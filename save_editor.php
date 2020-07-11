<?php
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$name=$_POST['name'];
$user_name=$_POST['user_name'];
$email=$_POST['email'];
$role=$_POST['role'];
$password=$_POST['password'];
$sql="INSERT INTO `users`(`name`,`user_name`,`email`,`password`,`role`) VALUE ('$name','$user_name','$email','$password','$role')";
mysqli_query($conn,$sql);
header("location:editor_list.php");

}
else
{
    header("location:auth/login.php");
}
?>