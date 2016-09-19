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
				header('location: ../connection_error.html');
			}
		}
		return $this->conn;
	}

	public function executeQuery($query, $param = null) {
		$result = false;
		try {
			$stmt = $this->getConnection()->prepare($query);
			$stmt->execute($param);
			$result = $stmt->fetchAll();
		} catch (PDOException $e) {
			$error = "*** Internal error: " . $e->getMessage() . "\n query: " . $query;
			die($error);
		}
		return $result;
	}

    public function executeUpdate($query, $param = null) {
		try {
			$stmt = $this->getConnection()->prepare($query);
  			$stmt->execute($param);
  			$rows = $stmt->rowCount();
  		} catch (PDOException $e) {
			$error = "*** Internal error: " . $e->getMessage() . "<p>" . $query;
			die($error);
		}
		return $rows;
	}

	/*Login attempts tracking*/

	public function confirmIPAddress($ip){
		$sql = "Select attempts, UNIX_TIMESTAMP(failTime) as failTime, (CASE WHEN failTime IS NOT NULL THEN 'Denied' ELSE 'Approved' END) as Status FROM loginAttempts WHERE ip = '$ip'";
		$result = $this->executeQuery($sql);

		if(count($result) == 0){
			//Case: IP not in database
			return 1;
		}
		if($result[0]["Status"] == "Denied"){
			$failTime = $result[0]["failTime"];
			$currentTime = time();
			if(($currentTime - $failTime) > 30 * 60){
				$this->clearLoginAttempts($ip);
				return 1;
			}
			return 0;
		}

		return 1;
	}

	public function addLoginAttempt($ip){

		$sql = "SELECT * FROM loginAttempts WHERE IP ='$ip'";
		$result = $this->executeQuery($sql);

		if($result){
			$attempts = $result[0]["attempts"] + 1;

			if($attempts == 5){
				$sql = "UPDATE loginAttempts SET attempts ='$attempts', failTime = NOW() WHERE IP = '$ip'";
				$this->executeUpdate($sql);
			}
			else{
				$sql = "UPDATE loginAttempts SET attempts = '$attempts' WHERE IP = '$ip'";
				$this->executeUpdate($sql);
			}
		}else{
			$sql = "INSERT INTO loginAttempts VALUES ('$ip', 1, NULL)";
			$this->executeUpdate($sql);
		}
	}

	public function clearLoginAttempts($ip) {
		$sql = "UPDATE loginAttempts SET attempts = 0, failTime = NULL WHERE ip = '$ip'";
		return $this->executeUpdate($sql);
	}



}
?>