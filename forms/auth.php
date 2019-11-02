<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/db.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/controllers/users.class.php");
$user = new Users();
if (isset($_POST['pseudo']) && isset($_POST['pass'])) {
	$array = array('pseudo' => $_POST['pseudo'], 'pass' => $_POST['pass']);
	if ($user->auth($array)) {
		$_SESSION['loggued'] = 1;
		$_SESSION['ip'] = $user->getIpAddr();
		header('Refresh:5; url=../index.php');
		echo 'You are loggued in, your ip address is ' . $_SESSION['ip'];
	} else {
		header('Refresh:5; url=../index.php');
		echo 'Error, you will be redirected to the front page';
	};
} else {
	header('Refresh:5');
	echo 'Fill the form';
}
