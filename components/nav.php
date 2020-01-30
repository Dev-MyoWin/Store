<?php 
include('connection.php');
    
$noti_sql="SELECT COUNT(id) as count FROM notifications WHERE flag='unread'";
$noti_result=mysqli_query($conn,$noti_sql);
$noti_row=mysqli_fetch_assoc($noti_result);

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Store Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item <?php  if($_SESSION['page_index']=='products') echo 'active';?>">
        <a class="nav-link" href=" products.php">Products</a>
      </li>
      <li class="nav-item <?php  if($_SESSION['page_index']=='categories') echo 'active';?>">
        <a class="nav-link" href="categories.php">Categories</a>
      </li>
     
      
      <li class="nav-item dropdown">
        
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION['user_name'].' ( '.$_SESSION['role'].' ) ';?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <?php if($_SESSION['role']=="admin")
          {
          ?>

          <a class="btn btn-block text-left " href="auth/editor_form.php"><i class="fa fa-user-plus float-left"></i>&nbsp;&nbsp;&nbsp;Add Editior</a>
          <a class="btn btn-block text-left " href="editor_list.php"><i class="fa fa-users float-left"></i>&nbsp;&nbsp;&nbsp;View Editior</a>
          <a class="btn btn-block text-left " href="log.php"><i class="fa fa-file"></i>&nbsp;&nbsp;&nbsp;View Log</a>
          <a class="btn btn-block  text-danger text-left" href="delete_data.php"> <i class="fa fa-trash float-left"></i>&nbsp;&nbsp;&nbsp;Erase All Data</a>

          <?php
          }
          ?>
      
          <a class="btn btn-block text-left" href="auth/logout.php"> <i class="fa fa-power-off float-left"></i>&nbsp;&nbsp;&nbsp;Log out</a>

        </div>
      </li>
     
    </ul>
    <form class="form-inline my-2 mr-5 my-lg-0">
     
     <a class="nav-link  my-2 my-sm-0 text-warning <?php  if($_SESSION['page_index']=='notifications') echo 'active';?>" href="notifications.php"><i class="fa fa-bell"></i>&nbsp;&nbsp;Notification &nbsp;&nbsp;<?php if($noti_row['count']!=0)echo '('.$noti_row['count'].')'?></a>

    </form>
    
  </div>
</nav>