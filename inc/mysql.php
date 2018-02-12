<?php
class Mysql {
	
	// variable
	var $conn;
	var $database;
	var $host;
	var $user;
	var $password;
	var $dbpreffix;
	
	// function
	function __construct($database, $host, $user, $password, $dbpreffix) {
		$this->init ( $database, $host, $user, $password, $dbpreffix );
	}
	function init($database, $host, $user, $password, $dbpreffix) {
		$this->database = $database;
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->dbpreffix = $dbpreffix;
	}
	function open() {
		// Create connection
		$this->conn = new mysqli ( $this->host, $this->user, $this->password, $this->database );
		// Check connection
		if ($this->conn->connect_error) {
			die ( "Connection failed: " . $this->conn->connect_error );
		}
		
		return $this->conn;
	}
	function query($sql) {
		$this->conn->query ( "SET NAMES 'utf8'" );
		$result = $this->conn->query ( $sql );
		if (! $result) {
			echo "<pre><h4><font color='red'>Mysql-Error </font>Query failed!</h4><br><u>Error</u><br>".$this->conn->error . "<br><br><u>SQL</u><br>" . $sql."</pre>";
		}
		
		return $result;
	}
	function escape($sql) {
		return $this->conn->real_escape_string ( $sql );
	}
	function insertID() {
		return $this->conn->insert_id;
	}
}
?>