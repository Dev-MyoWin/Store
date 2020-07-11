<?php
ob_start();
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$id=$_POST['id'];
$name=$_POST['name'];
$user_name=$_POST['user_name'];
$email=$_POST['email'];
$role=$_POST['role'];
$password=$_POST['password'];

if($role=='admin'){

$chage_admin_sql = "UPDATE `users` SET role='editor' WHERE role='admin'";
mysqli_query($conn,$chage_admin_sql);

date_default_timezone_set('Asia/Yangon');
    $time=date('d-m-Y h:i:s A');
    $log_description=$_SESSION['user_name']." promote  ".$user_name."  from editor to admin "." at ".$time;
    $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);

$sql="UPDATE `users` SET name='$name',user_name='$user_name',email='$email',role='admin',password='$password' WHERE id=$id";
mysqli_query($conn,$sql);

$user_name = $_SESSION['user_name'];

session_unset();

$_SESSION['auth']= "true";
$_SESSION['user_name']=$user_name;
$_SESSION['role'] ="editor";


}
else
{
    $sql="UPDATE `users` SET name='$name',user_name='$user_name',email='$email',role='editor',password='$password' WHERE id=$id";
    mysqli_query($conn,$sql);

}

header('location:editor_list.php');


}
else
{
    header("location:auth/login.php");
}
?>