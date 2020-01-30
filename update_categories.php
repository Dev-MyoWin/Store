<?php
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$id=$_POST['id'];
$name=$_POST['name'];
$product_sql="SELECT name FROM categories WHERE id=$id";
$product_result=mysqli_query($conn,$product_sql);
$product_row=mysqli_fetch_assoc($product_result);
$old_product_name=$product_row['name'];
$update_product_sql="UPDATE products SET `categories`='$name' WHERE `categories`='$old_product_name'";
mysqli_query($conn,$update_product_sql);

$sql="UPDATE categories SET name='$name' WHERE id=$id";
mysqli_query($conn,$sql);
date_default_timezone_set('Asia/Yangon');
    $time=date('d-m-Y h:i:s A');
    $log_description=$_SESSION['user_name']." edit category ".' ('.$old_product_name.') '." to ".' ('.$name.') '."at".$time;
    $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);
header('location:categories.php');



}
else
{
    header("location:auth/login.php");
}

?>