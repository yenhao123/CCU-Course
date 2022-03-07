<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">        
        <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
        <link href="css/signin.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    	<script src="js/signin.js"></script>
    </head>
    <body>
            <form class="form-signin">
		    <ul class="nav nav-tabs nav-fill">
			    <li class="nav-item">
				    <a class="nav-link active" aria-current="page" href=#>Sign in</a>
			    </li>
			    <li class="nav-item">
				    <a class="nav-link" href="signup.php">Sign up</a>
			    </li>
		    </ul>
		<input type="text" id="signin_inputUser" class="form-control" placeholder="ID" required autofocus>
                <input type="password" id="signin_inputPass" class="form-control" placeholder="Password" required>
                <div class="d-flex justify-content-between">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me</input>
                    </label>
                </div>
		<div class="text-center" style="padding:20px;">
                	<button class="btn btn-lg btn-primary" type="button" onclick='signIn()'>Sign in</button>
		</div>
                <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
            </form>
	    <span id="test"></span>
    </body>
</html>
