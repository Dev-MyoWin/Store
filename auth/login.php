<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="../dist/css/login.css">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first mb-5">
            <h1>Login Here</h1>
    </div>

    <!-- Login Form -->
    <form action="login_check.php" method="POST">
      <input type="text" id="login" class=" form-control fadeIn second" name="user_name" placeholder="username" required>
      <input type="text" id="password" class=" form-control fadeIn third" name="password" placeholder="password" required>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
  </div>
</div>
</body>
</html>

