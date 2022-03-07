function idused(){
	Swal.fire(
		'Sign up error',
		'username used',
		'error'
	)
}

function found(){
	Swal.fire(
		'Sign up success',
		'',
		'success'
	).then(
		function(){
				location.href = "signin.html";
		}
	)
}

function empty(){
	Swal.fire(
		'Sign up error',
		'user or password could not empty',
		'error'
	)
}

function notmatch(){
	Swal.fire(
		'sign up error',
		"password and cofirmed password are't matched",
		'error'
	)
}

$(document).ready(
	function(){
		$('#signup-form').submit(
			function(){
				var user = $("#username").val();
				var pass = $("#password").val();
				var confirmed = $("#confirm").val();
				if(user == ""||pass == ""){
					empty();
					return false;
				}
			
				if(pass != confirmed){
					notmatch();
					return false;
				}
				
				data = {username:$("#username").val(),email:$("#email").val(),password:$("#password").val()};
				//alert(data["username"]+" " +data["password"]);
				var jqxhr = $.post("signup.php",
					data,
					function(response){
						//alert(response);
						if(response == "id used"){
							idused();
							return false;
						}
					}
				)
				
				found();

				return false;
			}
		);
	}
);
