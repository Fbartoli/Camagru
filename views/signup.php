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
	<script src="/js/functions.js"></script>
</head>
<header>
	<?php
	require_once("header.php");
	?>
</header>

<body>
	<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
	<div class="container" id="wrap">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="/forms/register.php" onsubmit="checkSignIn()" method="post" accept-charset="utf-8" class="form" role="form" name='signform'>
					<legend>Sign Up</legend>
					<h4>It's free and always will be.</h4>
					<div class="row">
						<div class="col-xs-6 col-md-6">
							<input type="text" name="firstname" value="" class="form-control input-lg" placeholder="First Name" required /> </div>
						<div class="col-xs-6 col-md-6">
							<input type="text" name="lastname" value="" class="form-control input-lg" placeholder="Last Name" required /> </div>
					</div>
					<input type="text" name="username" value="" class="form-control input-lg" placeholder="Your nickname" required />
					<input type="email" name="email" value="" class="form-control input-lg" placeholder="Your Email" required />
					<input type="password" name="pass" value="" class="form-control input-lg" placeholder="Password" required />
					<input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password" required />
					<br />
					<span class="help-block">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>
					<button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
						Create my account</button>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>
<?php require_once("footer.html"); ?>

</html>