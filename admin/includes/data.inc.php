<?php
class Data{
	
	// database connection and table name
	private $conn;
	private $table_name = "servers";
	
	// object properties
	public $id;
	public $name;
	public $url;
	public $location;
	public $host;
	public $type;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	// create product
	function create(){
		
		//write query
		$query = "INSERT INTO " . $this->table_name . " values('',?,?,?,?,?)";
		
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(2, $this->name);
		$stmt->bindParam(1, $this->url);
		$stmt->bindParam(3, $this->location);
		$stmt->bindParam(4, $this->host);
		$stmt->bindParam(5, $this->type);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	// read products
	function readAll($page, $from_record_num, $records_per_page){

		$query = "SELECT 
					*
				FROM 
					" . $this->table_name . "
				ORDER BY 
					id 
				LIMIT 
					{$from_record_num}, {$records_per_page}";
		
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// used for paging products
	public function countAll(){
		
		$query = "SELECT id FROM " . $this->table_name . "";
		
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$num = $stmt->rowCount();
		
		return $num;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT 
					*
				FROM 
					" . $this->table_name . " 
				WHERE 
					id = ?"; 
				

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->name = $row['name'];
		$this->url = $row['url'];
		$this->location = $row['location'];
		$this->host = $row['host'];
		$this->type = $row['type'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					name = :name, 
					url =  :url, 
					location = :location,
					host = :host,
					type = :type
				WHERE
					id = :id";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $this->id);
		$stmt->bindParam(':name', $this->name);
		$stmt->bindParam(':url', $this->url);
		$stmt->bindParam(':location', $this->location);
		$stmt->bindParam(':host', $this->host);
		$stmt->bindParam(':type', $this->type);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?> 
