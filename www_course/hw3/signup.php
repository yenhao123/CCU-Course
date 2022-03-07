<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">        
        <link href="css/signup.css" rel="stylesheet">
	<script text="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	<script text="text/javascript" src="js/signup.js"></script>
    </head>
    <body>
        <form class="form-signup">
		<ul class="nav nav-tabs nav-fill">
			<li class="nav-item">
			    <a class="nav-link" href="signin.php">Sign in</a>
		    </li>
		    <li class="nav-item">
			    <a class="nav-link active" aria-current="page" href=#>Sign up</a>
			</li>
		    </ul>
            <input type="text" id="username" class="form-control" placeholder="Username" required autofocus/>
            <input type="password" id="inputPass" class="form-control" placeholder="Password" required>
            <input type="password" id="confirmPass" class="form-control" placeholder="Confirm Password" required>
            <div class="d-flex justify-content-between">
		<label>
            		<input type="checkbox" value="remember-me"> Remember me</input>
		</label>
            </div>
	    <div class="text-center" style="padding:20px;">
            	<button class="btn btn-lg btn-primary btn-block" type="button" onclick=signUp()>Sign up</button>
	    </div>
	    <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
		<span id="test"></span>	
        </form>
    </body>
</html>
