<!DOCTYPE html>
<?php require_once("header.php"); ?>

<body>
	<ul><?php
		require "./models/db.class.php";
		require "./controllers/users.class.php";
		$users = new Users();
		foreach ($users->getall() as $u) {
			echo "<li>" . $u['username'] . "</li>";
		}
		?></ul>
</body>
<?php require_once("footer.html"); ?>

</html>