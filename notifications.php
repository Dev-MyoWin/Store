<?php
ob_start();
session_start();
$_SESSION['page_index']='notifications';
if(isset($_SESSION['auth']))
{
    

    ?>
    <html>
    <head>
    <title>
    View Notifications
    </title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
  .new-logo1 
  {
      display:none;
  }
  .new-logo{
    width: 50px;
    margin-left: 60px;
    margin-top: -40px;
    }
    </style>
    <script
     src="https://code.jquery.com/jquery-3.4.1.min.js"
     integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
     crossorigin="anonymous"></script>
    </head>
    <body>
    <?php include ("components/nav.php");?>
    <div class="container">
    <h1 class="my-5 text-primary"><i class="fa fa-bell"></i>&nbsp; &nbsp;Notifications</h1>
    <a href="read-all.php" class="btn btn-info float-right mb-1 ">Mark All Read&nbsp; <i class="fa fa-check"></i></a>
    
    <?php
    include('connection.php');
    
    $count_sql="SELECT COUNT(id) AS count FROM notifications";
    
    $count_result=mysqli_query($conn,$count_sql);
    $role_count=mysqli_fetch_assoc($count_result);
    
    if($role_count['count']!=0)
    {
        ?>
        
        <table class="table">
        <thead>
        
        <th>No.</th>
        <th>Title</th>
        <th>Date</th>
        <th>Time</th>
        <th></th>
        <th></th>
        </thead>
        
        
        
        <?php
        $sql="SELECT * FROM notifications ORDER BY id DESC LIMIT 10";
        
        $result=mysqli_query($conn,$sql);
      
        $x=1;
        while($row=mysqli_fetch_assoc($result)):
           ?> 
        <tr>
            <td><?php 
            echo $x;
            $x++;
            ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><?php echo $row['time'] ?></td>
            
            <td>
            <input type="hidden" value="<?php echo $row['description']?>">
            <input type="hidden" value="<?php echo $row['id']?>">
            <a href="#" class="btn btn-outline-secondary view" data-toggle="modal" data-target="#myModal" ><i class="fa fa-eye"></i></a>  <br>      
            <img src="dist/image/new_logo.png" alt="" class=" <?php echo ($row['flag']=='unread')?'new-logo':' new-logo1';?>">
            
            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
               <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Notifications</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
            
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php
                        
                        echo $_COOKIE['notivar'];
                        
                        ?>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                   
                    <a href="noti.php" class="btn btn-danger" > Close</a>
                
                    </div>
                </div>
                </div>
            </div>
          
            </td>
            
            
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

    <script type="text/javascript" >
     $(".view").click(function()
     
     {
        var id=$(this).prev().val();
        var description=$(this).prev().prev().val();
        document.cookie="notivar="+id;
        $('.modal-body').text(description);

     });

    //  $(".noti-row").click(function()
    //  {
    //     $(this).find('a.view').click();
    //  }
    //  );

    </script>


    </body>
    </html>
    <?php
}
else
{
    header("location:auth/login.php");
}
?>