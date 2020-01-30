<?php
session_start();
if(isset($_SESSION['auth']))
{

include('connection.php');
$id=$_GET['id'];
$sql="SELECT * FROM user  WHERE id=$id";  
$result=mysqli_query($conn,$sql);
$role=mysqli_fetch_assoc($result);
$name=$role['name'];
$user_name=$role['user_name'];
$email=$role['email'];
$password=$role['password'];
$a=$role['role'];

if($a=='editor'){
   

    $chage_admin_sql = "UPDATE user SET role='editor' WHERE role='admin'";
    mysqli_query($conn,$chage_admin_sql);

 
    
    date_default_timezone_set('Asia/Yangon');
        $time=date('d-m-Y h:i:s A');
        $log_description=$_SESSION['user_name']." promote  ".$user_name."  from editor to admin "." at ".$time;
        $log_sql="INSERT INTO log (`description`) VALUES ('$log_description')";
        mysqli_query($conn,$log_sql);
       

    
    $sql="UPDATE user SET name='$name',user_name='$user_name',email='$email',role='admin',password='$password' WHERE id=$id";
    mysqli_query($conn,$sql);
    
    $user_name = $_SESSION['user_name'];
    
    session_unset();
    
    $_SESSION['auth']= "true";
    $_SESSION['user_name']=$user_name;
    $_SESSION['role'] ="editor";
    
    
    }
    else
    {
        $sql="UPDATE user SET name='$name',user_name='$user_name',email='$email',role='editor',password='$password' WHERE id=$id";
        mysqli_query($conn,$sql);
    
    }
    
    header("location:editor_list.php");
    
}
else
{
    header("location:auth/login.php");
}
?>