<?php
ob_start();
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$id=$_GET['id'];
$sql="UPDATE  products SET `lock_products`='false' WHERE id=$id";
mysqli_query($conn,$sql);
header("location:products.php");

}
else
{
    header("location:auth/login.php");
}
?>