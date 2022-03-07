<?php
	$id = $_POST["username"];
	$pass = $_POST["password"];

	$conn = new mysqli("www2021.csie.io","407410044","407410044","407410044","3306");
	if($conn->connect_error){
		die("Connection Failed:".$conn->connect_error);
	}

	$sql = "select id,pass from users";
	$res = $conn->query($sql);
	$success = 0;
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			if(strcmp($id,$row["id"])==0 && strcmp($pass,$row["pass"])==0){
				$success = 1;
			}
		}
	}

	if($success === 1){
		echo "login success";
		session_start();
		$_SESSION["username"] = $id;
		$_SESSION["passwd"] = $pass;
		$_SESSION["keyword"] = $id.$pass;
		setcookie("cookie",session_id(),time()+3600);
	}else{
		echo "user not found";
	}


?>
