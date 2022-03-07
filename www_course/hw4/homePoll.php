<?php
	$author = $_POST["username"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	 
	//echo $author;
	//addslash make sql syntax success
	$title = addSlashes($title);
	$content = addSlashes($content);

	$conn = new mysqli("www2021.csie.io","407410044","407410044","407410044","3306");
	if($conn->connect_error){
		die("Connection failed");
	}

	$good = 0;
	$com_num = 0;
	$time = time();

	$sql = "insert into ".$author." (name,title,content,good,com_num,time) values ('".$author."','".$title."','".$content."',".$good.",".$com_num.",".$time.")";
	echo $sql;
	$conn->query($sql);
	$conn->close();
?>
