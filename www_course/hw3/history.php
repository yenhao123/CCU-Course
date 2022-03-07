<?php
	include("config.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<link href="css/history.css">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		<script type="text/javascript" src="js/history.js"></script>
	</head>
	<body>
		<header>		
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="home.php">Weather Page</a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mx-2">
				<button type="button" class="btn btn-outline-success" onclick=logout()>Logout</button>
                        </li>
                        <li class="nav-item">
                            	<button type="button" class="btn btn-outline-success" onclick=goHistory()>History</button>
                        </li>
		    </ul>
                </div>
		<span class="navbar-brand" id="id" value=<?php echo $_SESSION["username"];?>>
			<?php echo "Hello,".$_SESSION["username"];?>
		</span>
            </nav>
		</header>
		<main>	
		    <div class="weather" style="margin:5rem 10rem 0;text-align:center;">
			<h1 style="margin:10px;">The Weather History</h1>
			<form class="form-search">
			    <input type="text" id="cityName" class="form-control" style="max-width:330px;margin:auto;" placeholder="Eg. NewYork,Tokyo"/><br/>
			    <button type="button" style="text-align: center;" class="btn btn-lg btn-primary btn-block" onclick=search()>Search</button>
			</form>
			<span id="test"></span>
			<table id="table-search" class="table table-striped" style="max-width:800px;margin:auto;">
				<thead>
				<tr>
					<th>#</th>
					<th>City</th>
					<th>Date</th>
					<th>Temperature</th>
					<th>FeelsLike</th>
					<th>Humidity</th>
					<th>Wind</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</br></th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<th scope="row">2</br></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<th scope="row">3</br></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<th scope="row">4</br></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<th scope="row">5</br></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<th scope="row">6</br></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<th scope="row">7</br></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
			</table>
		    </div>
		    <ul class="nav justify-content-center">
			<li class="nav-item">
			    <button class="btn" value=1 onclick=changePage(this)>1</a>
			</li>
			<li class="nav-item">
			    <button class="btn" value=2 onclick=changePage(this)>2</a>
			</li>
			<li class="nav-item">
			    <button class="btn" value=3 onclick=changePage(this)>3</a>
			</li>
			<li class="nav-item">
				<button class="btn" value=4 onclick=changePage(this)>4</a>
			</li>
		    </ul>
		</main>
	</body>
</html>
