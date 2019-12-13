<?php
session_start();
define("LOCAL", $_SERVER['HTTP_HOST']);
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
	case '/user':
		require ROOT . '/views/user.php';
		break;
	case '/signup':
		error_log("test1");
		require ROOT . '/views/signup.php';
		break;
	case '/post':
		require ROOT . '/views/post.php';
		break;
	case '/logout':
		require ROOT . '/forms/logout.php';
		break;
	case '/signin':
		require ROOT . '/views/signin.php';
		break;
	default:
		require ROOT . '/views/main.php';
		break;
}
