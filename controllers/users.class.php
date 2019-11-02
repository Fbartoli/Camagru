<?php
class Users extends DB
{
	function getall()
	{
		return $this->select("SELECT * FROM `user`");
	}

	function get($pseudo, $email)
	{
		return $this->select('SELECT id, firstname, lastname, pseudo, pass, reg_date FROM `user` WHERE pseudo ="' . $pseudo . '" OR email ="' . $email . '"');
	}

	function getIpAddr()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			//ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			//ip pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	function create_user($array)
	{
		$pseudo = $array['pseudo'];
		$email = $array['email'];
		if (!($this->get($pseudo, $email))) {
			$array['pass'] = hash('whirlpool', $array['pass']);
			$query = "INSERT INTO `user`(firstname, lastname, pseudo, email, pass) VALUES ('" . $array['firstname'] . "', '" . $array['lastname'] . "', '" . $array['pseudo'] . "', '" . $array['email'] . "', '" . $array['pass'] . "')";
			return $this->create($query);
		} else
			return NULL;
	}
	function auth($array)
	{
		$pseudo = $array['pseudo'];
		$info = $this->get($pseudo, "");
		if ((isset($info))) {
			$array['pass'] = hash('whirlpool', $array['pass']);
			if ($info[0]['pass'] === $array['pass'])
				return true;
		} else
			return NULL;
	}
}
