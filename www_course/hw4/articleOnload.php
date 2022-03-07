<?php


	$conn = new mysqli("www2021.csie.io","407410044","407410044","407410044","3306");

	$sql = "select * from users";
	$res = $conn->query($sql);
	$num = 0;
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			$member[$num++] = $row["id"];
		}
	}
	
	$num = 0;
	for($i=0;$i<count($member);$i++){
		$sql = "select * from ".$member[$i];
		$res = $conn->query($sql);
		if($res->num_rows>0){
			while($row = $res->fetch_assoc()){
				$author[$num] = $row["name"];
				$title[$num] = $row["title"];
				$time[$num] = $row["time"];
				$num ++;
			}
		}
	}
	$myobj = new StdClass();
	$myobj->author = $author;
	$myobj->title = $title;
	$myobj->time = $time;
	$myjson = json_encode($myobj);
	$filename = "json/article.json";
	file_put_contents($filename,$myjson);

/*
	$myobjs = array();
	for($i=0;$i<count($member);$i++){
		$sql = "select * from ".$member[$i];
		$res = $conn->query($sql);
		$num = 0;
		if($res->num_rows>0){
			while($row = $res->fetch_assoc()){
				$title[$num] = $row["title"];
				$time[$num] = $row["time"];
				$num ++;
			}
			$myobj = new StdClass();
			$myobj->author = $member[$i];
			$myobj->title = $title;
			$myobj->time = $time;
			$myobjs[] = $myobj;
		}
	}
	$myjson = json_encode($myobjs);
	$filename = "json/article.json";
	file_put_contents($filename,$myjson);
 */	
	$conn->close();
?>
