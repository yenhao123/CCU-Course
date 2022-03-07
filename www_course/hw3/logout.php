<?php
session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link href="logout.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    	<script src="home.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="home.html">Weather Page</a>
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
            </nav>
        </header>
	
	<main role="main" style="margin:20rem 0;text-align:center;">
		<div>
			<h2>You will be signed out after five seconds</h2>
		</div>
	</main>
    </body>

    <script>
	setTimeout(function(){location.href="signin.php"} , 5000);
    </script>

</html>
