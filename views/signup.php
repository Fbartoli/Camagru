<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="">
</head>
<header>
	<?php
	require_once("header.html");
	?>
</header>

<body>
	<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
	<form action="../forms/signup.php" method="post">
		<input type="text" value="" name="firstname" placeholder="firstname" required>
		<input type="text" value="" name="lastname" placeholder="lastname" required>
		<input type="text" value="" name="email" placeholder="email" required>
		<input type="text" value="" name="pass" placeholder="password" required>
		<input type="text" value="" name="pseudo" placeholder="pseudo" required>
		<button type="submit">Register</button>
	</form>
	<script src="" async defer></script>
</body>
<footer> join us, blabla</footer>

</html>