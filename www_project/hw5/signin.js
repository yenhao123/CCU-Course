function nemail(){
	Swal.fire(
		'Sign in error',
		'invalid email',
		'error'
	)
}

function password(){
	Swal.fire(
		'Sign in error',
		'invalid password',
		'error'
	)
}

function found(){
	Swal.fire(
		'Sign in success',
		'',
		'success'
	).then(
		function(){
			location.href = "friend.html";
		}
	)
}

$(document).ready(
	function(){
		$('#form-btn').click(
			function(){
				email = $("#email").val();
				data = {"email":email,"password":$("#password").val()};
				url = "http://localhost:3000/signin";
				alert(data["email"]);
				//alert(data["username"]+" " +data["password"]);
				var jqxhr = $.post(url,
					data,
					function(response){
						alert("done");
						url2 = "signin.txt";
						$.get(url2,function(res2){
							if(res2 == "success")found();
							else if(res2 == "password")password();
							else if(res2 == "email")nemail();
						})
					});
				
				return false;
			}
		);
	}
);
