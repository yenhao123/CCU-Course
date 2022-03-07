<?php
	$author = $_POST["author"];
	$t_update = $_POST["t_num"];
	$a_update = $_POST["a_num"];
/*
	$author = "admin";
	$t_update = "100";
	$a_update = "1000";
 */
	$table = $author."_ticket";

	$conn = new mysqli("www2021.csie.io","407410044","407410044","407410044","3306");
	$query = "update ".$table." set t_num=".$t_update.",a_num=".$a_update;
	$conn->query($query);
	$conn->close();

?>
