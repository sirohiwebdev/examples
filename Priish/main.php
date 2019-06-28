<?php
session_start();
	if(!isset($_SESSION['user'])){
		header('location: index.php');
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
		<div class="height-nav"></div>
		<div class="container-fluid">
			<div class="row">
					<?php
	
				 if($_SESSION['user']['e_verified']==0||$_SESSION['user']['m_verified']==0){
					//echo "Unverified User.";
					 header('location:process/verify-user.php');
	}
				?>
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="p-5 mt-5 text-center">
						<p class="text-success display-4">
							Hello, <?php echo ucwords(strtolower($_SESSION['user']['name'])) ?>
						</p>
					</div>
				</div>
				<div class="col-md-3"></div>
				
			</div>	
		</div>

</body>
</html>












