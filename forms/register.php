<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/db.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/controllers/users.class.php");
$user = new Users();
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass'])) {
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		die('Email is not valid!');
	}
	if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
		die('Username is not valid!');
	}
	if (strlen($_POST['pass']) > 20 || strlen($_POST['pass']) < 5) {
		die('Password must be between 5 and 20 characters long!');
	}
	$array = array('firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'], 'username' => $_POST['username'], 'email' => $_POST['email'], 'pass' => $_POST['pass']);
	if ($user->create_user($array))
		header("location: ../index.php");
	else {
		header('Refresh:5; url=../index.php');
		echo 'User already exist, you will be redirected to the front page';
	};
} else {
	header('Refresh:5');
	echo 'Fill the form';
}
