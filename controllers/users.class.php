<?php
class Users extends DB
{
	function getall()
	{
		return $this->select("SELECT * FROM `user`");
	}

	function get($username, $email)
	{
		return $this->select('SELECT id, firstname, lastname, username, pass, reg_date FROM `user` WHERE username ="' . $username . '" OR email ="' . $email . '"');
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
		$uniqid = null;
		$username = $array['username'];
		$email = $array['email'];
		if (!($this->get($username, $email))) {
			$uniqid = $this->create($array);
			$from    = 'noreply@localhost';
			$subject = 'Account Activation Required';
			$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
			$activate_link = 'localhost:8000/forms/activate.php?username=' . $username . '&code=' . $uniqid;
			$message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
			mail($_POST['email'], $subject, $message, $headers);
			echo 'Please check your email to activate your account!';
			return true;
		} else
			return NULL;
	}

	function update_user($array)
	{
		if ($this->update($array)) {
			return true;
		} else
			return NULL;
	}

	function auth($username, $password)
	{
		$info = $this->getUser($username);
		if ((isset($info))) {
			if (hash('whirlpool', $password) === $info['pass'] && $info['activated'] === 1)
				return true;
		} else
			return NULL;
	}

	function code($username, $code)
	{
		$info = $this->getUser($username);
		if ((isset($info))) {
			if ($code === $info['activation_code'])
				return true;
		} else
			return NULL;
	}
}
