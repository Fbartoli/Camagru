<?php
define("LOCAL", $_SERVER['HTTP_HOST']);
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/signup' :
        require __DIR__ . '/views/signup.php';
        break;
    default:
        require __DIR__ . '/views/main.php';
        break;
}