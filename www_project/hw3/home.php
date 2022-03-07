<?php
	include("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="css/home.css" rel="stylesheet">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.all.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	<script type="text/javascript" src="js/home.js"></script>
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

        <main role="main">
            <div class="weather" style="margin:5rem 10rem 0;text-align:center">
                <h1>The Weather Now In Your City</h1>
                <h5>Enter the name of a city</h5>
                <form class="form-search">
                    <input type="text" id="cityName" class="form-control" placeholder="Eg. NewYork,Tokyo"/><br/>
                    <button type="button" style="text-align: center;" class="btn btn-lg btn-primary btn-block" onclick=search()>Search</button>
                </form>
		<div id="curWeather" class="container-sm bg-light">
			<p id="cur1"></p>
			<p id="cur2"></p>
			<p id="cur3"></p>
			<p id="cur4"></p>
		</div>
		<div id="test"></div>
	    	<table id="table-search" class="table table-striped" style="max-width:800px;margin:auto;">
			<thead>
			<tr>
				<th>#</th>
				<th>City</th>
				<th>Date</th>
				<th>Temperature</th>
				<th>FeelsLike</th>
				<th>Humidity</th>
				<th>Description</th>
				<th>Wind</th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">.</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th scope="row">.</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th scope="row">.</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th scope="row">.</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th scope="row">.</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
		</table>
	    </div>
           
	     </div>
        </main>
    </body>
</html>
