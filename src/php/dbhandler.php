<?php
	class DBHandler{
		/* Constants to connect to the Database, makes the code easier and cleaner */
		private $username = "";
		private $password = "";
		private $host = ""; 
		private $database = "";
		private $table_post = "";
		private $connection;
		
		/**
		 * Makes the initial connection to the database, by taking the private member fields as parmeters
		 */
		public function __construct(){
				$this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
		}
		/** 
		 * Send the Query to the Database
		 * If there's an error it will throw a new error warning
		 * @param query is the query which we will want to interact with the database.
		 */
		public function send_query_to_db($query){
				if(!$this->connection->query($query)){
				     echo ("An error has occured: ", $this->connection->error);
			    }
				
		}
	
	}
	//closes any connection when it finishes
	$this->connection->close();
?>
