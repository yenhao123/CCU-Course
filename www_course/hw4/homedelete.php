<?php

	$author = $_POST["username"];
	$time = $_POST["time"];
	
	//$author = "admin";
	//$time = "1622194362";
	$conn = new mysqli("www2021.csie.io","407410044","407410044","407410044","3306");
	$sql = "delete from ".$author." where time=".$time;
	echo $sql;
	$conn->query($sql);
	$conn->close();

?>
