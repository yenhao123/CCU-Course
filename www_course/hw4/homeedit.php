<?php

	$author = $_POST["username"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	$time = $_POST["time"];
/*
	$author = "admin";
	$title = "hhhh";
	$content = "hhhh";
	$time = "1622194362";
*/
	$conn = new mysqli("www2021.csie.io","407410044","407410044","407410044","3306");
	$sql = "update ".$author." set title='".$title."',content='".$content."' where time=".$time;
	echo $sql;
	$conn->query($sql);
	echo $conn->error;
	$conn->close();
?>
