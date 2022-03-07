<?php 
	/* current weather*/
	$city = $_GET["cityName"];
	//$city = "nantou";
	$url = "http://api.openweathermap.org/data/2.5/weather?q=".$city.",&appid=e6f0306f3932a3483e320f25f0c93670&units=metric";
	$weather = file_get_contents($url);
	$weather = json_decode($weather);

	//date preprocessing unixstamp to gm+8
	$date = $weather->{"dt"};
	$date = date("Y-m-d H:i:s",$date);
	$date = preg_split('/[\s]/',$date)[0];

	$temp = $weather->{"main"}->{"temp"};
	$feelslike = $weather->{"main"}->{"feels_like"};
	$humidity = $weather->{"main"}->{"humidity"};	
	$description = $weather->{"weather"}[0]->{"description"};	
	$speed = $weather->{"wind"}->{"speed"};	
	$objCur->city = $city;
	$objCur->temp = $temp;
	$objCur->humidity = $humidity;
	$objCur->descrip = $description;
	$objCur->speed = $speed;
	$curJson = json_encode($objCur);
	file_put_contents("json/weatherCur.json",$curJson);

	$host = "www2021.csie.io";
	$user = "407410044";
	$passwd = "407410044";
	$database = "407410044";
	$port = "3306";

	$conn = new mysqli($host,$user,$passwd,$database,$port);
	if($conn->connect_error){
		die("Connection Failed: ".$conn->connect_error);
	}
	echo "Connected";

	$dt = time();
	$id = $_GET["id"];
	$sql = "insert into ".$id." (city,date,temperature,feelslike,humidity,wind,dt) values ('".$city."','".$date."','".$temp."','".$feelslike."','".$humidity."','".$speed."',".$dt.")";
	echo $sql;
	if($conn->query($sql) === TRUE){
		echo "sign up successfully";
	}
	else{
		echo "Error:".$conn->error;
	}
	$conn->close();

	/* 5 days  weather forecast*/
	//$city = "taipei";
	$url = "http://api.openweathermap.org/data/2.5/forecast?q=".$city.",&appid=e6f0306f3932a3483e320f25f0c93670&units=metric";
	echo $url;
	$weather = file_get_contents($url);
	$weather = json_decode($weather);
	
	//parse info
	for($i=0;$i<5;$i++){
		$date_ar[$i] = $weather->{"list"}[$i*8]->{"dt_txt"};
		$temp_ar[$i] = $weather->{"list"}[$i*8]->{"main"}->{"temp"};
		$feelLike_ar[$i] = $weather->{"list"}[$i*8]->{"main"}->{"feels_like"};
		$humidity_ar[$i] = $weather->{"list"}[$i*8]->{"main"}->{"humidity"};
		$description_ar[$i] = $weather->{"list"}[$i*8]->{"weather"}[0]->{"description"};
		$speed_ar[$i] = $weather->{"list"}[$i*8]->{"wind"}->{"speed"};
	}

	//write to file
	$myObj->city = $city;
	$myObj->date = $date_ar;
	$myObj->temp = $temp_ar;
	$myObj->feelsLike = $feelLike_ar;
	$myObj->humidity = $humidity_ar;
	$myObj->descrip = $description_ar;
	$myObj->speed = $speed_ar;
	$myJson = json_encode($myObj);
	file_put_contents("json/weather5days.json",$myJson);

?>
