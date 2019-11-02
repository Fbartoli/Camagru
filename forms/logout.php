<?php
if ($_SESSION['loggued'] === 1) {
	$_SESSION['loggued'] = 0;
	header('location: /index.php');
}
