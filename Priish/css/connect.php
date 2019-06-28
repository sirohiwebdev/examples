<?php
class Connect {
	private $server = 'localhost';
	private $username = 'id6589841_priish_intern';
	private $password = '7paXUxaBGa';
	private $db_name = 'id6589841_priish';
	
//	private $server = 'localhost';
//	private $username = 'root';
//	private $password = 'root';
//	private $db_name = 'priish';
	
	public function __construct(){
		
	}
	public function connect_db(){
		$conn = mysqli_connect($this->server, $this->username, $this->password, $this->db_name);
		return $conn;
	}
}

?>