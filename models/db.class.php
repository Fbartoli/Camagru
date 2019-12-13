<?php
class DB
{
	private $user = "root";
	private $db = "camagru";
	private $pass = "1234";
	private $host = "127.0.0.1:3306";
	private $pdo = null;
	private $stmt = null;

	function __construct()
	{
		try {
			$this->pdo = new PDO(
				"mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8",
				$this->user,
				$this->pass,
				[
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES => false,
				]
			);
		} catch (Exception $ex) {
			die($ex->getMessage());
		}
	}

	function __destruct()
	{
		if ($this->stmt !== null) {
			$this->stmt = null;
		}
		if ($this->pdo !== null) {
			$this->pdo = null;
		}
	}

	function select($sql)
	{
		$result = false;
		try {
			$this->stmt = $this->pdo->prepare($sql);
			$this->stmt->execute();
			$result = $this->stmt->fetchAll();
		} catch (Exception $ex) {
			die($ex->getMessage());
		}
		$this->stmt = null;
		return $result;
	}

	function create($array)
	{
		try {
			$array['pass'] = hash('whirlpool', $array['pass']);
			$uniqid = uniqid();
			$this->stmt = $this->pdo->prepare("INSERT INTO `user`(firstname, lastname, username, email, pass, activation_code) VALUES (:firstname, :lastname, :username, :email, :pass, :activation_code)");
			$this->stmt->execute([':firstname' => $array['firstname'], ':lastname' => $array['lastname'], ':username' => $array['username'], ':email' => $array['email'], ':pass' => $array['pass'], ':activation_code' => $uniqid]);
		} catch (Exception $ex) {
			die($ex->getMessage());
		}
		$this->stmt = null;
		return $uniqid;
	}

	function update($array)
	{
		try {
			if (isset($array['pass']) && !empty($array['pass'])) {
				$array['pass'] = hash('whirlpool', $array['pass']);
				$this->stmt = $this->pdo->prepare("UPDATE `user` SET username = :username, email = :email, pass = :pass WHERE username = :oldusr");
				$this->stmt->execute([':username' => $array['username'], ':email' => $array['email'], ':pass' => $array['pass'], ':oldusr' => $array['oldusr']]);
			} else {
				$this->stmt = $this->pdo->prepare("UPDATE `user` SET username = :username, email = :email WHERE username = :oldusr");
				$this->stmt->execute([':username' => $array['username'], ':email' => $array['email'], ':oldusr' => $array['oldusr']]);
			}
		} catch (Exception $ex) {
			$ex->getMessage();
			return false;
		}
		$this->stmt = null;
		return true;
	}

	function activation($username)
	{
		try {
			$this->stmt = $this->pdo->prepare("UPDATE `user` SET `activated` = 1 WHERE `username` = :username");
			$this->stmt->execute([':username' => $username]);
		} catch (Exception $ex) {
			die($ex->getMessage());
		}
		$this->stmt = null;
		return true;
	}

	function getUser($username)
	{
		$result = false;
		try {
			$this->stmt = $this->pdo->prepare('SELECT *	 FROM user WHERE username = :username');
			$this->stmt->execute([':username' => $username]);
			$result = $this->stmt->fetch();
		} catch (Exception $ex) {
			die($ex->getMessage());
		}
		$this->stmt = null;
		return $result;
	}
}
