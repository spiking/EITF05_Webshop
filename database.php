<?php

class Database {
	private $_host;
	private $_username;
	private $_password;
	private $_database;
	private $conn;

	public function __construct() {
		require('connect_database.php');
		$this->_host = $_host;
		$this->_username = $_username;
		$this->_password = $_password;
		$this->_database = $_database;
	}

	private function getConnection() {
		if (!isset($this->conn)) {
			try {
				$this->conn = new PDO("mysql:host=$this->_host;dbname=$this->_database",
					$this->_username, $this->_password);
			} catch (PDOException $e) {
				header('location: /connection_error.html');
			}
		}
		return $this->conn;
	}

	/*Inget prepared statement*/
		public function executeQuery($query) {
		$result = false;
		try {
			$stmt = $this->getConnection()->query($query);
			$result = $stmt->fetchAll();
		} catch (PDOException $e) {
			$error = "*** Internal error: " . $e->getMessage() . "\n query: " . $query;
			die($error);
		}
		return $result;
	}
<<<<<<< HEAD
	
}
?>
=======

}


?>
>>>>>>> 62e9b5337ac95a2c280738ef09fa69f240363881
