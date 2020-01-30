<?php
session_start();
if(isset($_SESSION['auth']))
{
?>
    <html>
    <head>
    <title>
    Editor Table
    </title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

    <?php include ('components/nav.php');?>
    <h1 class="my-5 text-danger ml-5"><i class="fa fa-trash"></i> &nbsp;Editor Trash</h1>

        <div class="container">
    <?php  
    include('connection.php');
    $count_sql="SELECT COUNT(id) AS count FROM user WHERE soft_delete='true'";

   $count_result=mysqli_query($conn,$count_sql);
   $role_count=mysqli_fetch_assoc($count_result);

     if($role_count['count']!=0)

    {
    ?>

    <table class="table">
    <thead>
    
     <th>No.</th>
     <th>Name</th>
     <th>User Name</th>
     <th>Email</th>
     <th>Password</th>
     <th>Role</th>
     <th></th>
     <th></th>
    </thead>
    
    
    
    <?php
    
    
    $sql="SELECT * FROM user WHERE soft_delete='true'";
    
    $result=mysqli_query($conn,$sql);
    $b=1;
    while($row=mysqli_fetch_assoc($result)):
        
        ?>
        
        <tr>
            <td><?php 
            
            echo $b;
            $b++;
            ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['user_name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['role'] ?></td>
            <td><a href="delete_editor1.php?id=<?php echo $row['id']?>"class="btn btn-danger btn-block">Delete &nbsp; <i class="fa fa-trash"></i></a></td>
            <td><a href="restore_editor.php?id=<?php echo $row['id']?>" class="btn btn-warning btn-block">Restore &nbsp; <i class="fa fa-history"></i></a></td>

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
    <a href="editor_list.php" class="btn btn-success float-right mr-5">Go Back &nbsp;<i class="fa fa-share-square"></i></a>

    </body>
    </html>
    
    <?php
}
else
{
    header("location:auth/login.php");
}
?>
