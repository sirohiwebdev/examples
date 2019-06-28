<?php
session_start();
if(isset($_SESSION['user'])){
	header('location: ../main.php');
}

	if(isset($_POST['signup'])){
		include('connect.php');
		require '../includes/Register.php';
		require '../includes/Login.php';
		$connect = new Connect;
		$user_registration = new Register;
		$conn = $connect->connect_db('priish');
		$name = stripslashes(mysqli_real_escape_string($conn, $_POST['name']));
		$email = stripslashes(mysqli_real_escape_string($conn, $_POST['email']));
		$mobile = stripslashes(mysqli_real_escape_string($conn, $_POST['mobile']));
		$password = stripslashes(mysqli_real_escape_string($conn, $_POST['password']));
		
		echo 'Name: '.$name.', Email: '.$email.', Password: '.$password.', Mobile '.$mobile;
		
		if(!$user_registration->is_email_exists($email, $conn)){
			
			//echo "<br/>New Email<br/>";
			
			if(!$user_registration->is_mobile_exists($mobile, $conn)){
				
				//echo "New Mobile<br/>";
				
				if($user_registration->register_user($name, $email, $password, $mobile, $conn)){
					
					$login_user = new Login;
					
					$logged_in =  $login_user->login_user($email, $password, $conn);
					
					//var_dump($logged_in);
					
					if($logged_in !=="false"){
						$_SESSION['user'] = $logged_in;
						header('location: ../main.php');
					}
					else{
					
						echo "error Log In.";
					} 
				}
					
				}
			
			else{
				header('location:../signup.php?err=m_reg');
			}
			}
		else{
		header('location:../signup.php?err=e_reg');
		 die();
		}
		
		}
		else{
			header('location:../');
			die();
			}
		
?>