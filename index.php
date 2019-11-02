<?php
session_start();
define("LOCAL", $_SERVER['HTTP_HOST']);
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
	case '/signup':
		require __DIR__ . '/views/signup.php';
		break;
	case '/post':
		require __DIR__ . '/views/post.php';
		break;
	case '/logout':
		require __DIR__ . '/forms/logout.php';
		break;
	case '/signin':
		require __DIR__ . '/views/signin.php';
		break;
	default:
		require __DIR__ . '/views/main.php';
		break;
}
