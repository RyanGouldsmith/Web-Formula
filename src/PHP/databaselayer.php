<?php
	/**
	* @Author Ryan Gouldsmith 
	* @Version 0.1
	* This class is the Database Layer to connect to the database
	*/
	class DatabaseLayer{
		/*Enter the details as you need them*/
		private $hostname='';
		private $dbname = '';
		private $table ='';
		private $connection;		
		private $username = '';
		private $password = '';
		/* This is the constructor for the Database class, this is where it makes a connection to the database*/
		public function __construct(){
			$this->connection = mysqli_connect($this->hostname, $this->dbname, $this->username, $this->password); 
		}
		/*This is where we sanitise any user input so it reduces any chance of SQL inection/tainting*/
		public function sanitiseItem($query){
			return mysqli_escape_real_string($this->getConnection(),$query);
		}
		/*Returns the connection made to the database*/
		public function getConnection(){
			return connection;
		}
		/*Sends the query to the database, it uses the last connection made the database*/
		public function sendQuery($query){
			mysqli_query($this->getConnection(),$query);
		}
		/*Allows the user to select the table name*/
		public function selectTable($tablename){
			$this->table = $tablename;
		}
	}
?>
