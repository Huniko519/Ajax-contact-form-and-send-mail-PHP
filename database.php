<?php

Class Database {

	private $conn;

	public function connect($servername, $username, $password, $dbname) {
	    // Create connection
	    $this->conn = new mysqli($servername, $username, $password, $dbname);

	    // Check connection
	    if ($this->conn->connect_error) {
	        die("Connection failed: " . $this->conn->connect_error);
	    }
	    // return $conn;
	}
	public function select($id) {
		
	}
	public function insert($talbe, $object) {
		$sql = "INSERT INTO " . $talbe . "(";
		$sql_first = '';
		$sql_last = ") VALUES (";
		foreach ($object as $key => $value) {
		 	$sql_first .= $key . ',';
		 	$sql_last .= "'".$value."'" . ',';
		} 
		$sql_first = rtrim($sql_first, ',');
		$sql_last = rtrim($sql_last, ',');
		$sql .= $sql_first . $sql_last .")";
		return $this->conn->query($sql);
		// return $sql;
	}
	public function update() {
		
	}
	public function delete() {
		
	}
	public function close() {
		$this->conn->close();
	}
}