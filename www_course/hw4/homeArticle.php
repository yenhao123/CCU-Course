<?php
	$author = $_POST["author"];
	//$author = "admin";
	//echo $author;
	$conn = new mysqli("www2021.csie.io","407410044","407410044","407410044","3306");
	if($conn->connect_error){
		die("Connection failed");
	}
	
	$sql = "select * from ".$author;
	$res = $conn->query($sql);
	
	$num = 0;
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			$title[$num] = $row["title"];
			$content[$num] = $row["content"];
			$good[$num] = $row["good"];
			$com_num[$num] = $row["com_num"];
			$time[$num] = $row["time"];
			$num ++;
		}
	}else{
		die("no any articles");
	}
	$myobj = new StdClass();
	$myobj->title = $title;
	$myobj->content = $content;
	$myobj->good = $good;
	$myobj->com_num = $com_num;
	$myobj->time = $time;
	//var_dump($myobj);
	$myjson = json_encode($myobj);
	$filename = "json/".$author.".json";
	file_put_contents($filename,$myjson);
	
	$conn->close();
	
?>
