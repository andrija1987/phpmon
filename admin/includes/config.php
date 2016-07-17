<?php
class Config{
	
	// specify your own database credentials
	private $host = "localhost";
	private $db_name = "phpmon";
	private $username = "root";
	private $password = "Lokarda7";
	public $conn;
	
	// get the database connection
	public function getConnection(){
	
		$this->conn = null;
		
		try{
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
		}catch(PDOException $exception){
			echo "Connection error: " . $exception->getMessage();
		}
		
		return $this->conn;
	}
}
?>
