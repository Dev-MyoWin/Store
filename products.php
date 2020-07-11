<?php
ob_start();
session_start();
$_SESSION['page_index']='products';
if(isset($_SESSION['auth']))
{
    ?>
    <html>
    <head>
    <title>
    View products
    </title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    
    <?php include ("components/nav.php");?>
    <h1 class="my-5 text-primary ml-5"><i class="fa fa-align-justify"></i>&nbsp;&nbsp;Products</h1>
    <div class="container">
    <?php
    include('connection.php');

    $count_sql="SELECT COUNT(id) AS count FROM products";
    
    $count_result=mysqli_query($conn,$count_sql);
    $role_count=mysqli_fetch_assoc($count_result);
    
    if($role_count['count']!=0)
    {
    ?>

    <table class="table">
    <thead>
    <th>Lock</th>
    <th>No.</th>
    <th>Name</th>
    <th>Category</th>
    <th>Created date</th>
    <th class="text-center">Amount</th>
    <th></th>
    <th></th>
    </thead>
    
    
    
    <?php
    
    include('connection.php');
    
    $sql="SELECT * FROM products";
    
    $result=mysqli_query($conn,$sql);
    $i=1;
    while($row=mysqli_fetch_assoc($result)):
        if($row['lock_products']=='false')
        {
        ?> 
        
        
        <tr>

        <td>
        
 
       
        <span><a href="lock_products.php?id=<?php echo $row['id']?>" class="btn btn-outline-success"><i class="fa fa-unlock-alt"></i></a></span>
    
        

    
        </td>

        <td><?php 
        echo $i;
        $i++;
        
        ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['categories'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td> 
        <div class="row">

        <div class="col-sm-4">

        <a href="decrease_amount.php?id=<?php echo $row['id']?>" class="btn btn-outline-info" ><i class="fa fa-minus"></i></a>
    

        </div>
        <strong class="col-sm-4"> 
        <?php 
        if($row['amount']<=10)
        {
            echo("<span class='text-warning'>".$row['amount']."</span>");
        }
        else if($row['amount']>=100)
        {
            echo("<span class='text-success'>".$row['amount']."</span>");
            
        }
        else
        {
            echo("<span class='text-info'>".$row['amount']."</span>");
            
        }
        ?>
        </strong> 
        <div class="col-sm-4 ">

        <a href="increase_amount.php?id=<?php echo $row['id']?>" class="btn btn-outline-info" ><i class="fa fa-plus"></i></a>
        

        </div>
        </div>
        </td>
        <td><a href="edit_product.php?id=<?php echo $row['id']?>"class="btn btn-info btn-block">Edit &nbsp; <i class="fa fa-pencil"></i></a></td>
        <td><a href="delete_product.php?id=<?php echo $row['id']?>"class="btn btn-danger btn-block">Delete &nbsp; <i class="fa fa-trash"></i></a></td>
        
        </tr>
        
        <?php
    }
        else
        {
            ?>

            <tr>

        <td>
        
 
       
        <span><a href="unlock_products.php?id=<?php echo $row['id']?>" class="btn btn-outline-danger"><i class="fa fa-lock"></i></a></span>
    


        </td>

        <td><?php 
        echo $i;
        $i++;
        
        ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['categories'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td> 
        <div class="row">

        <div class="col-sm-4">
        <a href="" class="btn btn-outline-secondary" ><i class="fa fa-minus"></i></a>
        </div>
        <strong class="col-sm-4"> 
        <?php 
        if($row['amount']<=10)
        {
            echo("<span class='text-warning'>".$row['amount']."</span>");
        }
        else if($row['amount']>=100)
        {
            echo("<span class='text-success'>".$row['amount']."</span>");
            
        }
        else
        {
            echo("<span class='text-info'>".$row['amount']."</span>");
            
        }
        ?>
        </strong> 
        <div class="col-sm-4 ">
        <a href="" class="btn btn-outline-secondary" ><i class="fa fa-plus"></i></a>
        </div>
        </div>
        </td>
        <td><a href="" class="btn btn-secondary btn-block disabled">Edit &nbsp; <i class="fa fa-pencil"></i></a></td>
        <td><a href="" class="btn btn-secondary btn-block disabled">Delete &nbsp; <i class="fa fa-trash"></i></a></td>
        
        </tr>
            <?php
       
        }
    
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
    <a href="new_product.php" class="btn btn-success float-right my-5 mr-5">Add New Item &nbsp; <i class="fa fa-plus"></i></a>

    </body>
    </html>
    
    
    <?php
}
else
{
    header("location:auth/login.php");
}
?>