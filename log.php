<?php
ob_start();
session_start();
$_SESSION['page_index']='log';
if(isset($_SESSION['auth']))
{
?>
<html>
<head>
<title>
View Log
</title>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include ("components/nav.php");?>
    <div class="container w-50">
    <h1 class="my-5 text-primary"><i class="fa fa-file"></i>&nbsp; &nbsp;Log</h1>

    <?php
    include('connection.php');
    ?>

<table class="table table-striped">
<thead>

 <th>No.</th>
 <th>Description</th>
</thead>



<?php
  $sql="SELECT * FROM log ORDER BY id DESC LIMIT 10";
    
  $result=mysqli_query($conn,$sql);

$x=1;
while($row=mysqli_fetch_assoc($result)):
    
    ?>
    
    <tr>
        <td> <?php echo $x; $x++; ?> </td>
        <td><?php echo $row['description'] ?></td>

    </tr>
    
    <?php
    
endwhile;
?>


</table>
</div>

</body>
</html>
<?php
}
else
{
    header("location:auth/login.php");
}
?>