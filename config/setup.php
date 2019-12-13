<?php
require_once("database.php");

$link = mysqli_connect($host, $user, $pass);
if (mysqli_connect_error()) {
	echo "Could not connect to the database";
}
$query = "DROP DATABASE camagru";
mysqli_query($link, $query);
if ($error = mysqli_error($link)) {
	echo $error . PHP_EOL;
}
$query = "CREATE DATABASE IF NOT EXISTS camagru";
mysqli_query($link, $query);
if ($error = mysqli_error($link)) {
	echo $error . PHP_EOL;
}
mysqli_close($link);

$link = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_error()) {
	echo "Could not connect to the database";
}
$query = "CREATE TABLE IF NOT EXISTS user (
	id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	pseudo VARCHAR(30) NOT NULL,
	email VARCHAR(50) NOT NULL,
	pass VARCHAR(128) NOT NULL,
	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
mysqli_query($link, $query);
if ($error = mysqli_error($link)) {
	echo $error . PHP_EOL;
}

$query = "CREATE TABLE IF NOT EXISTS post (
	id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	userId INT(4) UNSIGNED NOT NULL,
	link VARCHAR(256),
	post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
mysqli_query($link, $query);
if ($error = mysqli_error($link)) {
	echo $error . PHP_EOL;
}
