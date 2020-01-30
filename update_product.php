<?php
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$id=$_POST['id'];
$name=$_POST['name'];
$category=$_POST['category'];
$date=$_POST['date'];
$amount=$_POST['amount'];

$product_sql="SELECT * FROM products WHERE id=$id";
$product_result=mysqli_query($conn,$product_sql);
$product_row=mysqli_fetch_assoc($product_result);
$old_name=$product_row['name'];
$old_category=$product_row['categories'];
$old_date=$product_row['date'];
$old_amount=$product_row['amount'];

   

$sql="UPDATE products SET name='$name',categories='$category',date='$date',amount='$amount' WHERE id=$id";
mysqli_query($conn,$sql);
date_default_timezone_set('Asia/Yangon');
    $date=date('Y-m-d');
    $time=date('h:i:s');
    $log_description=$_SESSION['user_name']."  edit product ".' ('.$old_name.') '." to ".' ('.$name.') '." at ".$date.$time;
    $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);

    $log_description1=$_SESSION['user_name']."  edit product ".' ('.$old_category.') '." to ".' ('.$category.') '." at ".$date.$time;
    $log_sql1="INSERT INTO log (`description`) VALUES ('$log_description1')";
    mysqli_query($conn,$log_sql1);

    $log_description2=$_SESSION['user_name']."  edit product ".' ('.$old_date.') '." to ".' ('.$date.') '." at ".$date.$time;
    $log_sql2="INSERT INTO log (`description`) VALUES ('$log_description2') ";
    mysqli_query($conn,$log_sql2);

    $log_description3=$_SESSION['user_name']."  edit product ".' ('.$old_amount.') '." to ".' ('.$amount.') '." at ".$date.$time;
    $log_sql3="INSERT INTO log (`description`) VALUES ('$log_description3') ";
    mysqli_query($conn,$log_sql3);

    if($amount <10)
    {
        $sql2="INSERT INTO notifications (`title`,`date`,`time`,`description`,`flag`) VALUES ('less than 10','$date','$time','$log_description','unread')";
        mysqli_query($conn,$sql2);
    }

header('location:products.php');
  
}
else
{
    header("location:auth/login.php");
}
?>