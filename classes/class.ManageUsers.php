<?php
include_once ('class.database.php');

class ManageUsers {
	public $link;
	
	function __construct() {
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}
	
	function registerUser($username, $password, $email, $ip_address, $date, $time) {
		try {
			$query  = $this->link->prepare("INSERT INTO users (username, password, email, ip_address, reg_date, reg_time) VALUES (?,?,?,?,?, ?)");
			$values = array ($username, $password, $email, $ip_address, $time, $date);
			if (!$query->execute($values))
				die('error');
			$count = $query->rowCount();
			return $count;
		}
		catch (PDOException $e) {
			die( $e->getMessage());
		}
	}
	function  loginUser($username, $password) {
		$query = $this->link->query("SELECT * FROM users WHERE username = '$username' and password = '$password'");
		$rowCount = $query->rowCount();
		return $rowCount;
	}
	function getUserInfo($username) {
		$query = $this->link->query("SELECT * FROM users WHERE username = '$username'");
		$rowCount = $query->rowCount();
		if ($rowCount === 1)
		{
			$result = $query->fetchAll();
			return $result[0];
		}
		else
		{
			return $rowCount;
		}
	}
}
