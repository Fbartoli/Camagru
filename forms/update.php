<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/db.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/controllers/users.class.php");
session_start();
$user = new Users();
if (isset($_POST['username']) && isset($_POST['email'])) {
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		die('Email is not valid!');
	}
	if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
		die('Username is not valid!');
	}
	if (isset($_POST['pass']) && !empty($_POST['pass'])) {
		if (strlen($_POST['pass']) > 20 || strlen($_POST['pass']) < 5) {
			die('Password must be between 5 and 20 characters long!');
		}
		$array = array('username' => $_POST['username'], 'email' => $_POST['email'], 'pass' => $_POST['pass'], 'oldusr' => $_POST['oldusr']);
		if ($user->update_user($array)) {
			$_SESSION['username'] = $_POST['username'];
			header("location: ../index.php");
		} else {
			header('Refresh:5; url=../index.php');
			echo 'ERROR, you will be redirected to the front page';
		};
	}
	$array = array('username' => $_POST['username'], 'email' => $_POST['email'], 'oldusr' => $_POST['oldusr']);
	if ($user->update_user($array)) {
		$_SESSION['username'] = $_POST['username'];
		header("location: ../index.php");
	} else {
		header('Refresh:5; url=../index.php');
		echo 'ERROR, you will be redirected to the front page';
	};
} else {
	header('Refresh:5');
	echo 'Fill the form';
}
