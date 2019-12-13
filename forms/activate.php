<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/db.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/controllers/users.class.php");
$user = new Users();
if (isset($_GET['username'], $_GET['code'])) {
	if ($user->activation($_GET['username'], $_GET['code']) === true) {
		header('Refresh:5; url=../index.php');
		echo 'Account activated';
	} else {
		header('Refresh:5; url=../index.php');
		echo 'Error, This account cannot be activated, you will be redirected';
	};
} else {
	header('Refresh:5; url=../index.php');
	echo 'Error, This account cannot be activated, you will be redirected';
}
