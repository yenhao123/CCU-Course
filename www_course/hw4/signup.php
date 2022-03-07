<?php

	$id = $_POST["username"];
	$pass = $_POST["password"];
	$email = $_POST["email"];
	//$id = "407410044";
	//$pass = "a2201726";

	$host = "www2021.csie.io";
	$user = "407410044";
	$passwd = "407410044";
	$database = "407410044";
	$port = "3306";

	//connection
	$conn = new mysqli($host,$user,$passwd,$database,$port);
	if($conn->connect_error){
		die("Connection Failed: ".$conn->connect_error);
	}
	//echo "Connected";

	//check exists or not
	$sql = "select id from users";
	$res = $conn->query($sql);
	$used = 0;
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			if(strcmp($id,$row["id"]) == 0){
				$used = 1;
				die("id used");
			}
		}
	}
	
	//insert
	
	if($used != 1){

		$sql = "insert into users (id,pass,email) values ('".$id."','".$pass."','".$email."')";
		//echo $sql;
		if($conn->query($sql) === TRUE){
			echo "sign up successfully";
		}
		//create history db
		$sql = "create table ".$id."(name char(50),title char(50),content char(255),good int,com_num int,time int)";
		//echo $sql;
		$conn->query($sql);

		$ticket = $id."_ticket";
		$sql = "create table ".$ticket."(t_num int,a_num int)";
		$conn->query($sql);
		$sql = "insert into ".$ticket." (t_num,a_num) values (10,10)";
		$conn->query($sql);
	}
 	 
	$conn->close();

?>	
