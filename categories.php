<?php
session_start();
$_SESSION['page_index']='categories';
if(isset($_SESSION['auth']))
{
?>
<html>
<head>
<title>
View categories
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
<h1 class="my-5 text-primary ml-5"><i class="fa fa-th-list"></i>&nbsp; &nbsp;Categories</h1>
    <div class="container">
    <?php
    include('connection.php');

    $count_sql="SELECT COUNT(id) AS count FROM categories";
    
    $count_result=mysqli_query($conn,$count_sql);
    $role_count=mysqli_fetch_assoc($count_result);
    
    if($role_count['count']!=0)
    {
    ?>

<table class="table">
<thead>

 <th>No.</th>
 <th>Name</th>
 <th></th>
 <th></th>
</thead>



<?php
  $sql="SELECT * FROM categories";
    
  $result=mysqli_query($conn,$sql);

$x=1;
while($row=mysqli_fetch_assoc($result)):
    
    ?>
    
    <tr>
        <td><?php 
        echo $x;
        $x++;
        ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><a href="edit_categories.php?id=<?php echo $row['id']?>" class="btn btn-info btn-block">Edit &nbsp; <i class="fa fa-pencil"></i></a></td>
        <td><a href="delete_categories.php?id=<?php echo $row['id']?>"class="btn btn-danger btn-block">Delete &nbsp; <i class="fa fa-trash"></i></a></td>

    </tr>
    
    <?php
    
endwhile;
?>


</table>
<?php
}
else
{
?>
<center><h3 class="display-4">No Data</h3></center>
<?php
}
?>
</div>
<a href="new_categories.php" class="btn btn-success float-right mr-5 mt-5">Add New Category &nbsp; <i class="fa fa-plus"></i></a>

</body>
</html>
<?php
}
else
{
    header("location:auth/login.php");
}
?>