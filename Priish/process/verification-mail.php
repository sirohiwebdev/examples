<?php
if(!isset($_POST['verify_email'])){
	die();
	header('location:../index.php');
}
	session_start();
	 $to = $_SESSION['user']['email'];
	 //$to = 'abhisheksirohi@gmail.com';
	 $sub = 'Verify your email to continue';

			$message = '<p>This message is regarding your e-mail verification at Priish website for testing.<br/>
			<a href="http://xplorito.com/Priish/process/verify-email.php?utm_m='.password_hash($to, PASSWORD_DEFAULT).'&t='.strtotime('now').'" style="">Click to verify</a><br></p>';
			$headers  = "From: Abhishek Sirohi < admin@sirohiwebdev.com >\n";
			$headers .= "reply-to: admin@sirohiwebdev.com \n"; 
			$headers .= "X-Sender: testsite < admin@sirohiwebdev.com >\n";
			$headers .= 'X-Mailer: PHP/' . phpversion();
			$headers .= "X-Priority: 1\n"; // Urgent message!
			$headers .= "Return-Path: admin@sirohiwebdev.com\n"; // Return path for errors
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
			
			
			if(mail($to,$sub,$message, $headers)){
				echo "We have sent you a verification mail. Please check your inbox to verify.";
			}
			else{
				echo "Error sending mail.Try again later";
			}
				
?>