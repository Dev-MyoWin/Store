<?php

session_start();
$_SESSION['page_index']='list';
if(isset($_SESSION['auth']) && ($_SESSION['role']=="admin"))
{
    include('connection.php');
    
    $trash_sql="SELECT COUNT(id) as count FROM user WHERE soft_delete='true'";
    $trash_result=mysqli_query($conn,$trash_sql);
    $trash_row=mysqli_fetch_assoc($trash_result);

?>
    <html>
    <head>
    <title>
    Editor Table
    </title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

    <?php include ('components/nav.php')?>
    <h1 class="my-5 text-primary ml-5"><i class="fa fa-users"></i> &nbsp;Editor List</h1>

        <div class="container">
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
     <th></th>
    </thead>
    
    
    
    <?php
    
    
    $sql="SELECT * FROM user   WHERE soft_delete='false'";
    
    $result=mysqli_query($conn,$sql);
    $a=1;
    while($row=mysqli_fetch_assoc($result)):
        
        ?>
        
        <tr>
            <td><?php 
            echo $a;
            $a++;
            
            ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['user_name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['role'] ?></td>
            <?php 
             if($row['role']=='admin')
             {
            ?>
             <td><a href="edit_editor.php?id=<?php echo $row['id']?>"class="btn btn-info btn-block">Edit &nbsp; <i class="fa fa-pencil"></i></a></td>
                   
            <?php
             }
             else
             {
             ?>
              <td><a href="promote_editor.php?id=<?php echo $row['id']?>"class="btn btn-success btn-block">Promote &nbsp;<i class="fa fa-angle-double-up"></i></a></td>
             <td><a href="edit_editor.php?id=<?php echo $row['id']?>"class="btn btn-info btn-block">Edit &nbsp; <i class="fa fa-pencil"></i></a></td>
            <td><a href="delete_editor.php?id=<?php echo $row['id']?>"class="btn btn-danger btn-block">Delete &nbsp; <i class="fa fa-trash"></i></a></td>
             <?php
             }  
             ?>  
        </tr>
        
        <?php
        
    endwhile;
    ?>
    
    
    </table>
    
   
    </div>
    <a href="auth/editor_form.php" class="btn btn-success float-right my-5 mr-5">Add New Editor &nbsp; <i class="fa fa-plus"></i></a>
    
    <a href="editor_trash.php" class="btn btn-warning float-right my-5 mr-3"> View trash Editor &nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;(<?php echo $trash_row['count']?>)</a>
    </body>
    </html>
    
    <?php
}
else
{
   
    header("location:index.php");
}
?>
