<?php
class DB {
	private $user = "root";
	private $db = "camagru";
	private $pass = "1234";
	private $host = "127.0.0.1:3306";
	private $pdo = null;
	private $stmt = null;

	function __construct(){
		try {
		$this->pdo = new PDO(
			"mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8",
			$this->user, $this->pass, [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
			]
		);
		} catch (Exception $ex) { die($ex->getMessage()); }
	}

	function __destruct(){
		if ($this->stmt!==null) { $this->stmt = null; }
		if ($this->pdo!==null) { $this->pdo = null; }
	}

	function select($sql){
		$result = false;
		try {
		$this->stmt = $this->pdo->prepare($sql);
		$this->stmt->execute();
		$result = $this->stmt->fetchAll();
		} catch (Exception $ex) { die($ex->getMessage()); }
		$this->stmt = null;
		return $result;
	}

	function create($sql){
		$result = false;
		try {
		$this->stmt = $this->pdo->prepare($sql);
		$this->stmt->execute();
		} catch (Exception $ex) { die($ex->getMessage()); }
		$this->stmt = null;
		return true;
	}
}
