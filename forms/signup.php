<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/models/db.class.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/controllers/users.class.php");
	$user = new Users();
	$array = array('firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'], 'pseudo' => $_POST['pseudo'], 'email' => $_POST['email'], 'pass' => $_POST['pass']);
	if ($user->create_user($array))
		header("location: ../index.php");
	else {
		header('Refresh:5; url=../index.php');
		echo 'User already exist';
	};
