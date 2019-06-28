<?php
session_start();
$verify = false;

require '../includes/Update.php';
require 'connect.php';

$update = new Update;
$connect = new Connect;
$conn = $connect->connect_db();
$updated = false;


	if(isset($_GET['utm_m'])&&isset($_GET['t'])){
		if(password_verify($_SESSION['user']['email'], $_GET['utm_m'])){
			$time_now = strtotime('now');
			if(($time_now - $_GET['t'])<=600){
				$verify = true;
				
				if($verify){
					$condition = "email = '".$_SESSION['user']['email']."'";
					$updated = $update->update_value($conn, '1', 'e_verified',$condition);
					if($updated){
						$_SESSION['user']['e_verified'] = '1';
					}
				}
			}
			else{
				echo "<center><strong>Link Expired. Try again.....</strong></center>";
				die();
			}
}
		
	}else{
		header('location:../index.php');
		die();
	}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Priish Web Development Intern Demo</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

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
	include('../includes/header.php');
	
?>
		<div class="height-nav"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-3"></div>
				<div class="col-6">
				
					<?php
					if($updated){
						?>
						<div class="alert alert-success mt-4 p-2 text-center">
							E-mail verified.
						
						<a href="../main.php">
						<button class="btn btn-success">
						Go to home
						</button>
						</div>
					</a>
				<?php
					}
					?>
				</div>
				<div class="col-3"></div>
			</div>
		</div>
</body>
</html>