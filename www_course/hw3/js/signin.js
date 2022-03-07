function userNotFound(){
	Swal.fire({
		title: "Login Error",
		text: "user not found",
		icon: "error"
	});
}

function signIn(){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){
			//document.getElementById("test").innerHTML = this.responseText;
			if(this.responseText == "user not found"){
				userNotFound();
				return;
			}else{
				location.href="http://wwweb.csie.io:2028/hw3/home.php";
			}
		}
	}
	id = document.getElementById("signin_inputUser").value;
	passwd = document.getElementById("signin_inputPass").value;
	url = "http://wwweb.csie.io:2028/hw3/signincheck.php?id="+id+"&passwd="+passwd;
	xhttp.open("GET",url,true);
	xhttp.send();
}
