
function dupError() {
    Swal.fire({
	title:"Duplicate Username!",
	text:"The user already exists",
	icon:"error"
    });
}
function emptyError() {
    Swal.fire({
	title: "Registration Error!",
	text: "Your username and password can not be empty.",
	icon: 'error'
});
}
function notMatchError() {
	Swal.fire({
	  title: 'Registration Error!',
	  text: 'password and confirmed password not matched',
	  icon: 'error',
	})
}
function registerSuccess() {
	Swal.fire({
	  title: 'Sucess!',
	  icon: 'success',
	}).then(
		function(){
			location.href = "http://wwweb.csie.io:2028/hw3/signin.php";
		}
	)
}
function englishOnly(){
	Swal.fire({
	  title: 'Registeration Error!',
	  text: 'username use english only',
	  icon: 'error',
	});
}

function signUp(){
	
	
	var id = document.getElementById('username').value;
	var pass = document.getElementById("inputPass").value;
	var conf = document.getElementById("confirmPass").value;
	
	var english = /^[A-Za-z]*$/;
	if (!english.test(id)){
		englishOnly();
		return;
	}

	//empty
	if(id == "" || pass == ""){
		emptyError();
		return;
	}

	//confrim passwd
	if(pass != conf){
		notMatchError();
		return;
	}
	
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById('test').innerHTML = this.responseText;
			
			if(xhttp.responseText == "id used"){
				dupError();
				return;
			}else{
				registerSuccess();
				return;
			}
		}
	}
	url = "http://wwweb.csie.io:2028/hw3/signupcheck.php?id="+id+"&passwd="+pass;
	xhttp.open("GET",url,true);
	xhttp.send();
}
