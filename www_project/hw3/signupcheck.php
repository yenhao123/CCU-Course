<?php

	$id = $_GET["id"];
	$pass = $_GET["passwd"];
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

		$sql = "insert into users (id,pass) values ('".$id."','".$pass."')";
		//echo $sql;
		if($conn->query($sql) === TRUE){
			echo "sign up successfully";
		}
		//echo "Error:".$conn->error;

		echo "sign up successfully";
		//create history db
		$sql = "create table ".$id."(city char(50),temperature char(50),feelslike char(50),date char(50),humidity char(50),wind char(50),dt int)";
		$conn->query($sql);
	}
 	 
	$conn->close();

?>	
