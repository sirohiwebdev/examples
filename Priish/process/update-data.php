<?php
session_start();
	require '../includes/Update.php';
	require 'connect.php';
	$connect = new Connect;
	$conn = $connect->connect_db();
	$update = new Update;
	
	if(isset($_POST['means'])){
		 	
		$column = $_POST['column'];
		$value = $_POST['value'];
		$condition = "email='".$_SESSION['user']['email']."'";
		//echo $condition;
		$update_result = $update->update_value($conn,$value, $column, $condition);
		//echo "--".$update_result;
		if($update_result){
			echo true;
			$_SESSION['user'][$column]= $value;
		}
		else{
			echo false;
		}
			
		
	}
	else{
		echo false ;
	}
mysqli_close($conn);
	
?>