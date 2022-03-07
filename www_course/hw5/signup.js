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
		$('#form-btn').click(
			function(){
				var pass = $("#password").val();
				var confirmed = $("#confirm").val();
				if(pass == ""){
					empty();
					return false;
				}
			
				if(pass != confirmed){
					notmatch();
					return false;
				}
				
				data = {
					"email":$("#email").val(),
					"password":$("#password").val()
				};
				
				url = "http://localhost:3000/signup"
				alert(data["email"]);
				var jqxhr = $.post(url,
					data,
					function(response){
						//get response message
						url2 = "signup.txt";
						var jqxhr = $.get(url2,function(res){
							if(res == "used"){
								idused();
							}else{
								found();
							}
						})

					}
				)

				return false;
			}
		);
	}
);
