<?php

//include('../application/model/functions.php');

function getStatuses($config){
	$link = connectDb($config);	
	selectDb($link,$config);

	$query = "SELECT * FROM mydb.statuses";

	$result = mysqli_query($link, $query);

	while($row = mysqli_fetch_assoc($result)){

		$rows[] = $row;

	}

	return $rows;
}

function getStatus($id, $config){

	$link = connectDb($config);	
	selectDb($link,$config);
	
	$query = "SELECT * FROM mydb.statuses where idstatuses = $id";

	$result = mysqli_query($link, $query);

	while($row = mysqli_fetch_assoc($result)){

		$rows[] = $row;
	}

	return $rows[0];
}
?>