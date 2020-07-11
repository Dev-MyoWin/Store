<?php
ob_start();
session_start();
if(isset($_SESSION['auth']))
{

include("connection.php");
$id=$_GET['id'];
$sql="SELECT * FROM products WHERE id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$b=$row['amount'];
if($b>0){
    $a=$row['amount']-1;
}else{
    $a=0;
}

 $sql1="UPDATE products SET amount='$a' WHERE id=$id";
mysqli_query($conn,$sql1);
date_default_timezone_set('Asia/Yangon');
    $date=date('Y-m-d');
    $time=date('h:i:s');

    $log_description=$_SESSION['user_name']."   Decrease ".'('. $name .')'." Amount  "." from ".'  ('.$b.')  '." to ".' ('.$a.') '." at ".$date.$time;
    $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
    mysqli_query($conn,$log_sql);
    if($a <10 && $a>0)
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