<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/about' :
        require __DIR__ . '/views/about.php';
        break;
    default:
        require __DIR__ . '/views/main.php';
        break;
}