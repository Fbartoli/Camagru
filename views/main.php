<!DOCTYPE html>
<?php require_once("header.html"); ?>

<body>
	<ul><?php
		require "./models/db.class.php";
		require "./controllers/users.class.php";
		$users = new Users();
		foreach ($users->getall() as $u) {
			echo "<li>" . $u['pseudo'] . "</li>";
		}
		?></ul>
</body>
<footer> join us, blabla</footer>

</html>