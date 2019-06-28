<?php 
class Register {
	private $name = 'User Name';
	private $email = 'user@example.com';
	private $mobile = '0098765432';
	private $password = 'fafas';
	
	
	public function is_email_exists($email, $con){
		$this->email = $email;
		$sql = "SELECT email FROM users WHERE email = '".$this->email."'";
		$res = mysqli_query($con, $sql);
		if($res){
			$row = mysqli_num_rows($res);
			if($row ==1){
			return true;
			}
			else{
				echo false;
			}
		}
		
	}
	
	public function is_mobile_exists($mobile, $con){
		$this->mobile = $mobile;
		$sql = "SELECT email FROM users WHERE email = '".$this->mobile."'";
		$res = mysqli_query($con, $sql);
		if($res){
			$row = mysqli_num_rows($res);
			if($row ==1){
			return true;
			}
			else{
				echo false;
			}
		}
		
	}
	
	public function register_user($name, $email, $password, $mobile, $con){
		$this->name = $name;
		$this->email = $email;
		$this->mobile = $mobile;
		$this->password = password_hash($password, PASSWORD_DEFAULT);
		
		$sql = "INSERT INTO users VALUES('','".$this->name."','".$this->email."','','".$this->mobile."','','".$this->password."')";
		//echo $sql;
		$res = mysqli_query($con, $sql);
		//var_dump($res);
		if($res){
			return true;
			}
			else{
				return false;
			}
		}
}
?>