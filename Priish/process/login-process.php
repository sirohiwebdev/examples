<?php
session_start();
	if(isset($_POST['login'])){
		include('connect.php');
		include('../includes/Login.php');
		$connect = new Connect;
		$conn = $connect->connect_db();
		$email = stripslashes(mysqli_real_escape_string($conn, $_POST['email']));
		$password = stripslashes(mysqli_real_escape_string($conn, $_POST['password']));
		
		//echo $email.'And password: '.$password;
		
		$login_user = new Login;
		$logged_in =  $login_user->login_user($email, $password, $conn);
		//var_dump($logged_in);		
		if($logged_in!==null){
			$_SESSION['user'] = $logged_in;
			header('location: ../main.php');
		}
		else{			
			header('location:../login.php?err');
		} 
		
		
	}
else{
	header('location:../');
}
?>