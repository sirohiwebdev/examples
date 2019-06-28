<?php 
 class Login{
	 
	 private $email = 'dummy';
	 private $password = 'dummy';
	 
	 
	 
	 public function login_user($email, $password, $conn){
		 $this->email = $email;
		 $this->password = $password;
		 $sql = "SELECT * FROM users WHERE email ='".$this->email."'";
		 //echo $sql;
		 $res = mysqli_query($conn, $sql);
		 if($res){
			 $count = mysqli_num_rows($res);
				 if($count == 1){
					 $row = mysqli_fetch_assoc($res);
					 if(password_verify($this->password, $row['password'])){
						 return $row;
					 }
					 
				 }
			 else{
				return null;
			 }
		 }
		 else{
			 return null;
		 }
	 }
		 
	 
 }
?>