<!DOCTYPE>
<html>
    <head>
        <meta charset = "utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="home.css" rel="stylesheet">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.all.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    </head>
    <body>
    	<script>
		window.onload = function(){
			Swal.fire({
				title: 'Please Login',
				text: "You don't have permission to access",
				icon: 'warning'
			}).then(
				function(){
					location.href = "http://wwweb.csie.io:2028/hw3/signin.php";
				}
			)
		}	
	</script>
    </body>
</html>
