<?php

//include('../application/model/functions.php');

function getDuties($config){
	$link = connectDb($config);	
	selectDb($link,$config);

	$query = "SELECT * FROM mydb.duties";

	$result = mysqli_query($link, $query);

	while($row = mysqli_fetch_assoc($result)){

		$rows[] = $row;
	}
	return $rows;
}

function getDuty($id, $config){

	$link = connectDb($config);	
	selectDb($link,$config);
	
	$query = "SELECT * FROM mydb.duties where idduties = $id";

	$result = mysqli_query($link, $query);

	while($row = mysqli_fetch_assoc($result)){

		$rows[] = $row;
	}

	return $rows[0];
}
?>