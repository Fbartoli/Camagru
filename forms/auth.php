<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/db.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/controllers/users.class.php");
$user = new Users();
if (isset($_POST['username'], $_POST['pass'])) {
	if ($user->auth($_POST['username'], $_POST['pass'])) {
		$_SESSION['loggued'] = TRUE;
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['ip'] = $user->getIpAddr();
		header('Refresh:5; url=../index.php');
		echo 'You are loggued in, your ip address is ' . $_SESSION['ip'];
	} else {
		header('Refresh:5; url=../index.php');
		echo 'Error, you will be redirected to the front page';
	};
} else {
	die("Please fill the form");
}
