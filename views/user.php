<?php
require_once "./models/db.class.php";
require_once "./controllers/users.class.php";
$users = new Users();
$info = $users->getUser($_SESSION['username']);
print_r($_SESSION);
print_r($info);
?>

<!DOCTYPE html>
<?php require_once("header.php"); ?>

<body>
	<form action="/forms/update.php" method="post">
		<input type="text" name="username" value="<?php echo $info['username']; ?>" class="form-control input-lg" placeholder="Your nickname" required />
		<input type="text" name="oldusr" value="<?php echo $info['username']; ?>" class="form-control input-lg" placeholder="Your nickname" required style="display: none;" />
		<input type="email" name="email" value="<?php echo $info['email']; ?>" class="form-control input-lg" placeholder="Your Email" required />
		<input type="password" name="pass" value="" class="form-control input-lg" placeholder="Password" />
		<button type="submit">OK</button>
	</form>
</body>
<?php require_once("footer.html"); ?>

</html>