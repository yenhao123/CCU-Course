function notfound(){
	Swal.fire(
		'Sign in error',
		'user or password not found',
		'error'
	)
}

function found(username){
	Swal.fire(
		'Sign in success',
		'',
		'success'
	).then(
		function(){
			location.href = "home.php?username="+username+"&author="+username;
		}
	)
}

$(document).ready(
	function(){
		$('#signin-form').submit(
			function(){
				username = $("#username").val();
				data = {"username":username,"password":$("#password").val()};
				//alert(data["username"]+" " +data["password"]);
				var jqxhr = $.post("signin.php",
					data,
					function(response){
						if(response == "user not found"){
							notfound();	
							return false;
						}
					}
				)
				
				found(username);

				return false;
			}
		);
	}
);
