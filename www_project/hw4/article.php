<?php
	include("config.php");
?>
<!DOCTYPE>
<html>
	<head>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" href="css/article.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		<script src="js/article.js"></script>
	</head>
	<body>
		<!--navbar--!>
	
	  	<nav class="navbar navbar-expend-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id=navbarNav>
				<ul class="navbar-nav">
				<li class="nav-item active" onclick=manualhome()>
						<button class=btn>Home</button>
					</li>
					<li class="nav-item">
						<button class=btn>Article</button>
					</li>
					<li class="nav-item" onclick=location.href="logout.php">
						<button class=btn>Logout</button>
					</li>
				</ul>
			</div>
		</nav>

		<!--content--!>
	  	<div class="container-fluid mt-3">
			<div class="row">
				<div class="col text-start">
					<div class="d-flex justify-content-between">
						<h2>Article Page</h2>
						<p>username : <span id="username"><?php echo $_GET["username"];?></span><span id="author" style="display:none;"><?php echo $_GET["author"];?></span></p>
					</div>
					<label for="search">Search</label><br>		
					<input type="text" id="search" name="search" placeholder="search" value="">
				</div>
			</div>
			<div class="row">
				<div class="col" id="table-search">
					
				</div>
			</div>
		</div>
	</body>
</html>
