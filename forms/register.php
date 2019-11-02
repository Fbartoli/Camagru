<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/db.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/controllers/users.class.php");
$user = new Users();
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['pass'])) {
	$array = array('firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'], 'pseudo' => $_POST['pseudo'], 'email' => $_POST['email'], 'pass' => $_POST['pass']);
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
