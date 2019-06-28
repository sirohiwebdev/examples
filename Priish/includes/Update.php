<?php
	class Update{
		
		private $column = '';
		private $value = '';
		private $condition = '';
		
		public function __construct(){
			
		}
		
		public function update_value($conn, $value, $column, $condition){
			$this->column = $column;
			$this->condition = $condition;
			$this->value = $value;
			$sql = "UPDATE users SET {$this->column} = '{$this->value}' WHERE {$this->condition}";
			//echo $sql;
			$res = mysqli_query($conn, $sql);
			if($res){
				return "true";
			}
			else{
				return "false";
			}
		}
		
	}
?>