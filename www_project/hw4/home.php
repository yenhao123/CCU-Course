<?php
	include('config.php');
?>
<!DOCTYPE>
<html>
	<head>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
		<link rel="stylesheet" href="css/home.css">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		<script src="js/lot.js"></script>
		<script src="js/award.js"></script>
		<script src="js/home.js"></script>
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
					<li class="nav-item" onclick=manualar()>
						<button class=btn>Article</button>
					</li>
					<li class="nav-item" onclick=location.href="logout.php">
						<button class=btn>Logout</button>
					</li>
				</ul>
			</div>
		</nav>

		<!--content--!>
	  	<div class="container-fluid mt-3 text-center">
			<div class="row">
				<div class="col-4">
					<h2>Main Page</h2>
					<div style="text-align:right;">
						<p>username : <span id="username"><?php echo $_GET["username"];?></p>
					</div>
					<div class="border mt-3">
						<button type="text" class="btn btn-primary" style="width:100%;">Information</button><br>
						<img src="images/head.jpg" class="rounded-circle" style="width:150px;height:150px;"></img><br>
						<p>author : <span id="author"><?php echo $_GET["author"];?></span></p>
					</div>
					
					<a href="#myPopup1" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all" data-position-to="window">Poll</a>	
				
					<div data-role="popup" id="myPopup1">
						<h2 style="margin:0 50px">Post</h2>
						<hr>
						<form id="pollform">
							<div class="form-group" style="width:900px;height:600px;margin:20 50px">
								<label for="title">Title</label>
								<textarea  id="title" name="title"></textarea>
								<label for="content">Content</label>
								<textarea id="content" name="content" style="height:400px;"></textarea>
							</div>
							<div style="display:flex;justify-content:flex-end">
								<input type="button" style="width:10%;" value="cancel" id="postcancel" onclick=cancel()>
								<input type="button" style="width:10%;margin:0 10px;" value="submit" id="sub">
							</div>
						</form>
					</div>
					<div data-role="popup" id="myPopup2">
						<h2 style="margin:0 50px">Edit</h2>
						<hr>
						<form id="editform">
							<div class="form-group" style="width:900px;height:600px;margin:20 50px">
								<label for="edittitle">Title</label>
								<textarea  id="edittitle" name="edittitle"></textarea>
								<label for="editcontent">Content</label>
								<textarea id="editcontent" name="editcontent" style="height:400px;"></textarea>
							</div>
							<div style="display:flex;justify-content:flex-end">
								<input type="button" style="width:10%;" value="cancel" id="editcancel" onclick=cancel()>
								<input type="button" style="width:10%;margin:0 10px;" value="submit" id="editsub">
							</div>
						</form>
					</div>
					<div data-role="popup" id="myPopup3" style="width:400px;height:80px;">
						<p>Are you sure to delete this article?</p>
						<div style="display:flex;justify-content:flex-start">
							<input type="button" style="width:20%;margin:0 10px;text-align:left;padding:0 7px;" id="deletecancel" value="cancel" onclick=cancel()>
							<input type="button" style="width:20%;text-align:center;padding:0 7px;" value="delete" id="deletesub">
						</div>
					</div>
					<div id="lottery" class="border">
						<button type="text" class="btn btn-primary mt-5 mb-2" style="width:100%;">lottery</button>
						<p><span>tickets : </span><span id="ticket_num"></span></p>
						<p><span>account : </span><span id="account_num"></span></p>
						<img id="rotate" src="images/rotate.png" style="left:50px;top:700px;height:350px;width:350px;position:absolute;z-index:1;">				
						<img id="pointer" src="images/pointer.png" style="left:170px;top:775px;height:150px;width:100px;position:absolute;z-index:2;">
					</div>
				</div>
				<div class="col-8">
					<h2>Articles</h2>
					<div id="homeArticle">
						
					</div>
				</div>
				<input type="text" value="-1" id="articleid" style="display:none;">

			</div>
		</div>
	</body>
</html>
