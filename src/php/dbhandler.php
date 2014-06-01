<?php
	class DBHandler{
		/* Constants to connect to the Database, makes the code easier and cleaner */
		private $username = "";
		private $password = "";
		private $host = ""; 
		private $database = "";
		private $table = "";
		private $connection;
		private $array_results = array();
		private $stripped_query = "";
		
		/**
		 * Makes the initial connection to the database, by taking the private member fields as parmeters
		 */
		public function __construct(){
				$this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
		}
		/** 
		 * Sets the table that is to be used 
		 * @param tablename is the table in which will be used
		 */
		public function select_table($tablename){
				$this->table = $tablename;
		}
		/** 
		 * @returns the table which is currently in use.
		 */
		public function get_table(){
			return $this->table;
		}
		/** 
		 * Send the Query to the Database
		 * If there's an error it will throw a new error warning
		 * @param query is the query which we will want to interact with the database.
		 * @return an array of associative array items, which stores all the equation title and the equation itself.
		 */
		public function send_query_to_db($query){
				if($result = $this->connection->query($query)){
					while ($values = $result->fetch_assoc()){
							$this->array_results[] = $values;
					}
					return $this->array_results;
				} else { 
					echo "An error has occured " . $this->connection->error;
				}
		}
		/** 
		 * Prevents any SQL injections and sanitises it so it allows for safe use in the database
		 * @param query is the part in which we will sanitising
		 */
		public function sanitise_query($query){
			$this->stripped_query = $this->connection->real_escape_string($query);
		}
		public function get_stripped_query(){
				return $this->stripped_query;
		}
	}
?>
