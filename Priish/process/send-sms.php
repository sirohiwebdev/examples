<?php
session_start();
if(!isset($_SESSION['user'])){
	header('location:../index.php');
	die();
	
}
	$random_value =   mt_rand(1000,9999);
	//echo $_SESSION['user']['mobile'];
	// Authorisation details.
	$username = "abhisheksirohi19@gmail.com";
	$hash = "091d62427f213beb6976e3b54bfbc4cf30f7da3a44c9f31c0d9a0e50a4efdaf2";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = $_SESSION['user']['mobile']; // A single number or a comma-seperated list of numbers
	$message = "One time password for verification at sirohiwebdev is {$random_value}.Don't share with anyone";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	//This is the result from the API
	$result = curl_exec($ch);
 $result;
	$result = json_decode($result);
	curl_close($ch);
	echo $result->status.'+'.$random_value;
?>