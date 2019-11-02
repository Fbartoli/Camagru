<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title></title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="/style/style.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
	<script src="../js/functions.js"></script>
	<script src="https://kit.fontawesome.com/62c51c8b2f.js" crossorigin="anonymous"></script>
</head>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">
			<img src="/img/camagru.png" class="img-fluid" />
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<?php if ($_SESSION['loggued'] === 0) {
					echo '<li class="nav-item">
					<a class="nav-link" href="/signup">signup</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/signin">signin</a>
				</li>';
				} else {
					echo '<li class="nav-item">
					<a class="nav-link" href="/post">post</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/logout">logout</a>
				</li>';
				};

				?>
			</ul>
		</div>
	</nav>
</header>