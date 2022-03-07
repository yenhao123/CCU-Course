<?php
	$conn = new mysqli("www2021.csie.io","407410044","407410044","407410044","3306");
	if($conn->connect_error){
		die("connected failed");
	}
	echo "connected";
	
	$page = $_GET["page"];
	//$page = 1;
	$start = ($page-1)*7;
	$limit = $page*7;
	$num = 0;
	$id = $_GET["id"];
	for($count=$start;$count<$limit;$count++){
		$next_count = $count+1;
		$sql = "select city,date,temperature,feelslike,humidity,wind from ".$id." order by dt desc limit ".$count.",".$next_count;
		echo $sql;
		$res = $conn->query($sql);
		if($res->num_rows > 0){
			$row = $res->fetch_assoc();
			var_dump($row);
			$city[$num] = $row["city"];
			$date[$num] = $row["date"];
			$temp[$num] = $row["temperature"];
			$feelslike[$num] = $row["feelslike"];
			$humidity[$num] = $row["humidity"];
			$wind[$num] = $row["wind"];
			$num ++;
		}
		else{
			break;
		}
	}
	//var_dump($city);
	$myobj = new StdClass();
	$myobj->city = $city;
	$myobj->date = $date;
	$myobj->temp = $temp;
	$myobj->feelslike = $feelslike;
	$myobj->humidity = $humidity;
	$myobj->wind = $wind;
	$myjson = json_encode($myobj);
	file_put_contents("json/history.json",$myjson);
	
	$conn->close();
?>
