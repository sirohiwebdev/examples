<?php
session_start();
if(isset($_SESSION['user'])){
	header('location:main.php');
}
$err = '';
if(isset($_GET['err'])){
	$err = 'Invalid Credentials. Try Again !';
	
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Priish Web Development Intern Demo</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$('nav').removeClass('bg-transparent');
		$('nav').removeClass('navbar-dark');
		$('nav').addClass('bg-my-white');
		$('nav').addClass('navbar-light');
		$('nav').addClass('nav-shadow');
		
	});
</script>
</head>

<body>
<?php
	include('includes/header.php');
?>

<div class="container-fluid">
<div class="height-nav"></div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<div class="login-area">
			<center>
				<h1 class="display-4 mb-4">Login Here</h1>
			</center>
			
				<form action="process/login-process.php" method="post" class="" name="loginForm" onSubmit="return validateForm()">
				<div id="error" class="text-danger">
					<?php echo $err; ?>
				</div>
				<div class="form-group">
					<label for="emailInput">Enter Email</label>
					<input type="text" id="emailInput" name="email" class="form-control"></input>
				</div>
				<div class="form-group mb-4">
					<label for="emailInput">Enter Password</label>
					<input type="password" id="passwordInput" name="password" class="form-control"></input>
				</div>
				<div class="form-group">
					<button type="submit" name="login" class="btn btn-block btn-lg btn-primary">Login</button>
				</div>
			</form>
				<div class="d-flex justify-content-center flex-column">
					<div class="forgot-pass text-center">
						<a href="forgot.php" class="btn-link mb-5">Forgot Password ?</a>
					</div>
					<div>
						<div class="text-muted text-center mb-1">Not yet register
						<a href="signup.php" class="btn-link">
						<button class="btn btn-lg btn-success btn-block mt-4">Sign Up</button>
						</div></a>
						<div></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
	
	
	<script>
		function validateEmail(email) {
  			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  			return re.test(email);
}
		function validateForm(){
			var loginForm = document.forms['loginForm'];
			var email = loginForm['email'].value;
			var password = loginForm['password'].value;
			var result = false;
			$('.data').html(email+", "+password+",");
			if(email==''||password==''){
				$('#error').html("Fill out all fields.");
				return result;
			}
			else if(!validateEmail(email)){
				$('#error').html("Enter a valid E-mail.");
				document.getElementById('emailInput').focus;
				return result;
			}
			else{
				result = true;
				return result;
			}
			
			
		}
</script>
</body>
</html>