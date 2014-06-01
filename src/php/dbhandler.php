<?php
	class DBHandler{
		/* Constants to connect to the Database, makes the code easier and cleaner */
		private $username = "";
		private $password = "";
		private $host = ""; 
		private $database = "";
		private $table_post = "";
		private $connection = "";
		
		/**
		 * Makes the initial connection to the database, by taking the private member fields as parmeters
		 */
		public function __construct(){
				$this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		}
		/** 
		 * Send the Query to the Database
		 */
		public function send_query_to_db($query){
				
		}
	
	}
?>
