<!DOCTYPE html>
<html class="no-js">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/js/functions.js"></script>
</head>
<header>
	<?php
	require_once("header.php");
	?>
</header>

<body>
	<div class="container" id="wrap">
		<div class="row">
			<div class="col-md-12">
				<form action="/forms/auth.php" onsubmit="checkSignIn()" method="post" accept-charset="utf-8" class="form" role="form" name='signform'>
					<legend>Sign In</legend>
					<label for="username">
						<i class="fas fa-user"></i>
					</label>
					<input type="text" name="username" value="" class="form-control input-lg" placeholder="Your nickname" required />
					<label for="password">
						<i class="fas fa-lock"></i>
					</label>
					<input type="password" name="pass" value="" class="form-control input-lg" placeholder="Password" required />
					<br />
					<button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
						Sign In</button>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>
<?php require_once("footer.html"); ?>

</html>