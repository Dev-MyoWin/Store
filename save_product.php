<?php
ob_start();
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$name=$_POST['name'];
$category=$_POST['category'];
$date=$_POST['date'];
$amount=$_POST['amount'];
$sql="INSERT INTO `products`(`name`,`categories`,`date`,`amount`,`lock_products`) VALUE ('$name','$category','$date','$amount','false')";
mysqli_query($conn,$sql);
date_default_timezone_set('Asia/Yangon');
    $date=date('Y-m-d');
    $time=date('h:i:s');
    $log_description=$_SESSION['user_name']."  add product ".' ('.$name.') '." at ".$date.$time;
    $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);

    if($amount <10)
    {
        $sql2="INSERT INTO notifications (`title`,`date`,`time`,`description`,`flag`) VALUES ('less than 10','$date','$time','$log_description','unread')";
        mysqli_query($conn,$sql2);
    }
    
   header("location:products.php");

}
else
{
    header("location:auth/login.php");
}
?>