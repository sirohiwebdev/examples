<?php
	session_start();
if(!isset($_SESSION['user'])){
	header('location:../index.php');
	die();
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title> </title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
			<div class="col-md-2"></div>
			<div class="col-md-8 ">
			<?php
						if($_SESSION['user']["m_verified"]==0||$_SESSION['user']["e_verified"]==0){
						
				?>
				<div class="alert alert-danger mt-4">
					Your identity verification is pending.
				</div>
					<?php
						}
						if($_SESSION['user']["m_verified"]==0){
						
				?>
						<div class="bg-white p-5 mt-4 rounded shadow-sm" id="verify-mobile">
							<p id="sms-text" class="text-danger">Your mobile verification is required to complete you registration process.</p>
							<button id="verify-sms-btn" class="btn btn-warning d-block" onClick="sendSMS()">Click to verify Mobile</button>
							<form id="verify-code-sms" class="form-inline d-none">
								<input id="sms-code" class="form-control mr-5" type="text" maxlength=4 required placeholder ="Enter Code">
								<button type="button" class="btn btn-primary" onClick="verifyMobile()"> Verify
								</button>
							</form> 
						</div>
							<?php
						}
					?>
					
					<?php
						if($_SESSION['user']['e_verified']==0){
							?>
						<div class="bg-white p-5 mt-4 rounded shadow-sm">
							<p id="email-text" class="text-danger">Your E-mail verification is required to complete you registration process.</p>
							<button onClick="verifyEmail()" class="btn btn-warning d-block">Click to verify E-mail</button>
						</div>
							<?php
						}
					?>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<script>
document.getElementById('sms-code').addEventListener('keypress', (event)=>{
		var eventType = event.which||event.keyCode;
		//$('.data').html(eventType);
		if(!(eventType>=48&&eventType<=57)){
			return event.preventDefault();
		}
		
	});
		
		var recievedSMS = 0000;
		var rawData = 'none';
		var newData = [];
		
		function sendSMS(){
			$.ajax({
				url:'send-sms.php',
				data:'',
				method:'post',
				success: function(response){
					data = response;
					newData = data.split('+');
					recievedSMS = newData[1];
					if(newData[0]=="success"){
						$('#sms-text').removeClass('text-danger');
						$('#sms-text').addClass('text-success');
						$('#sms-text').html("Enter 4-digit code sent to registered mobile number.");
						addFormToDiv();
					}
					else{
						$('#sms-text').html("Error sending verification code.");
					}
					
				},
				error: function(){
					alert("Do nothing");
				}
			});
		}
		function addFormToDiv(){
			console.log("AddFormToDiv");
			$('#verify-sms-btn').removeClass('d-block');
			$('#verify-sms-btn').hide();
			$('#verify-code-sms').removeClass('d-none');
			
		}
		
		function verifyMobile(){
			
			smsCode = $('#sms-code');
			console.log(smsCode.val());
			
			if(smsCode.val()==''){
				alert("empty");
			}
			else if(smsCode.val()==recievedSMS){
				console.log("Correct");
				$.ajax({
					url:'update-data.php',
					method: 'post',
					data: "means=ajax&column=m_verified&value=1",
					success: function(response){
					if(response!=null){
						console.log(response);
						location.reload();
					}
					},
						
					error: function(response){
					console.log(response);
				}
				
				});
				
				
			}
			else{
				console.log("Error");
			}
			
		}
		function verifyEmail(){
			$.ajax({
					url:'verification-mail.php',
					method: 'post',
					data: "verify_email=true",
					success: function(response){
					if(response!=null){
						$('#email-text').removeClass('text-danger');
						$('#email-text').addClass('text-success');
						$('#email-text').html(response);
						//location.reload();
					}
					},
					error: function(response){
					$('#email-text').html(response);	
					console.log(response);
				}
				
				});
		}
	</script>
	
</body>
</html>