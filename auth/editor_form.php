
<!------ Include the above in your HEAD tag ---------->
<?php
session_start();
$_SESSION['page_index']='form';
if(isset($_SESSION['auth']) && ($_SESSION['role']=="admin"))
{
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head> 
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	
	<!-- Website CSS style -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	
	<!-- Website Font style -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	
	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../dist/css/register.css">
	<script type="text/javascript" src="../dist/plugins/jquery-3.4.1.js"></script>
	
	<title>Admin</title>
	
	<style>
	#message {
		display:none;
		background: #f1f1f1;
		color: #000;
		position: relative;
		padding: 10px;
		margin-top: 10px;
	}
	#message p {
		font-size: 10px;
	}
	#message1 {
		display:none;
		background: #f1f1f1;
		color: #000;
		position: relative;
		padding: 10px;
		margin-top: 10px;
	}
	#message1 p {
		font-size: 10px;
	}
	.invalid {
		color: red;
	}
	
	.valid {
		color: green;
	}
	.invalid:after {
		position: relative;
		left:10px;
		content: "✖";
	}
	
	</style>
	</head>
	<body>
	<div class="container">
	<div class="row main">
	<div class="panel-heading">
	<div class="panel-title text-center">
	<h1 class="title text-primary">Editor Form <i class="fa fa-edit"></i></h1>
	<hr />
	
	</div>
	</div> 
	<div class="main-login main-center">
	<form class="form-horizontal" method="post" action="../editor_action.php" onsubmit="Validate()">
	
	<div class="form-group">
	<label for="name" class="cols-sm-2 control-label">Your Name</label>
	<div class="cols-sm-10">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
	<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" required />
	</div>
	</div>
	</div>
	
	
	<div class="form-group">
	<label for="username" class="cols-sm-2 control-label">Username</label>
	<div class="cols-sm-10">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
	<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username" required />
	</div>
	</div>
	</div>
	
	
	
	
	<div class="form-group">
	<label for="email" class="cols-sm-2 control-label">Your Email</label>
	<div class="cols-sm-10">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
	<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email" required />
	</div>
	</div>
	</div>
	
	
	
	
	<div class="form-group">
	<label for="password" class="cols-sm-2 control-label">Password</label>
	<div class="cols-sm-10">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
	<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required/>
	</div>
	<div id="message">
	<p id="error">Password must have minimum 6 & 12 character</p>

	
	</div>
	</div>
	</div>
	
	<div class="form-group">
	<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
	<div class="cols-sm-10">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
	<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password" required />
	</div>
	
	<div id="message1">
	<p id="test">Password must be match</p>
	</div>
	</div>
	</div>
	
	<div class="form-group">
	
	<button type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Register" id="register"style="display:none" >Register</button>
	<button type="button" class="btn btn-lg btn-block login-button" id="register1">Register</button>
	
	</div>
	
	</form>
	
	</div>
	</div>
	</div>
	
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript">
	
	var pass= document.getElementById("password");
	var Conf = document.getElementById("confirm");
	

	
	pass.onfocus = function() {
		document.getElementById("message").style.display = "block";
	}
	
	pass.onblur = function() {
		document.getElementById("message").style.display = "none";
	}
	
	pass.onkeyup = function() {
		
		
		
		if(pass.value.length >=6 && pass.value.length <=12) 
		{
			error.classList.remove("invalid");
			error.classList.add("valid");
		} 
		
		else 
		{
			error.classList.remove("valid");
			error.classList.add("invalid");
		}

	
	};
	
	
	Conf.onfocus = function() {
		document.getElementById("message1").style.display = "block";
	}
	
	Conf.onblur = function() {
		document.getElementById("message1").style.display = "none";
	}
	
	Conf.onkeyup = function()
	{
		if(pass.value == Conf.value && Conf.value.length <=12 && Conf.value.length >=6 )
		{
			test.classList.remove("invalid");
			test.classList.add("valid");
			document.getElementById("register").style.display = "block";
		    document.getElementById("register1").style.display = "none";
	
		}
				
		else
		{
			test.classList.remove("valid");
			test.classList.add("invalid");
			document.getElementById("register").style.display = "none";
		    document.getElementById("register1").style.display = "block";
		}


		
	}




	
	</script>
	</body>
	</html>
	<?php
}
else
{
	
	header("location:index.php");
}
?>