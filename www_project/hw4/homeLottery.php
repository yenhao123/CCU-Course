<?php
	$author = $_POST["author"];
	//$author = "admin";
	$conn = new mysqli("www2021.csie.io","407410044","407410044","407410044","3306");
	
	$ticket = $author."_ticket";
	$sql = "select * from ".$ticket;
	//echo $sql;
	$res = $conn->query($sql);

	$num = 0;
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			$ticket = $row["t_num"];
			$account = $row["a_num"];
		}
	}
	
	echo $ticket;
	echo " ";
	echo $account;
	
	$conn->close();

?>
