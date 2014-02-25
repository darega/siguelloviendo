<?php
function showPre($data){

	echo '<pre>';
	print_r($data);
	echo '</pre>';
	return;
}

/**
 * Get DBMS link conection
 * @param unknown $config
 * @return link
 */
function connectDb($config)
{

	$link = mysqli_connect($config['host'],
			$config['user'],
			$config['password']
	);
	return $link;
}


/**
 * Select database
 * @param unknown $config
 * @return null
 */
function selectDb($link, $config)
{
	mysqli_select_db($link, $config['db'] );
	mysqli_query($link, 'SET NAMES utf8');
	return;
}


function update($tablename, $data, $config){


	//Se recogen los nombres de los campos de la tabla 
	//para poder realizar el insert correctamente
	$fields = getFields($tablename,$data,$config);


	$query = "UPDATE ".$tablename." SET ";
	foreach ($fields[1] as $key => $value)
	{

		if(count($fields[1]) > 1){

			$query.=$key . "='".$value."'";
		}else{
			$query.=$key . "='".$value."'";
		}

		
	}
	$query.= " WHERE ";

	foreach ($fields[0] as $key => $value)
	{
		$query.=$value."='".$data[$value]."' AND ";
	}	
	$query = substr($query, 0, strlen($query)-4);

	$link = connectDb($config);
	selectDb($link, $config);
	$result = mysqli_query($link, $query);

	return $result;
}
function insert($tablename, $data, $config){

	//Se recogen los nombres de los campos de la tabla 
	//para poder realizar el insert correctamente
	$fields = getFields($tablename,$data,$config);

	$query = "INSERT INTO ".$tablename." SET ";
	foreach ($fields[1] as $key => $value)
	{
		$query.=$key . "='".$value."',";
	}
	$query = substr($query, 0, strlen($query)-1);
	$link = connectDb($config);
	selectDb($link, $config);
	$result = mysqli_query($link, $query);

	return $result;
}
function delete($key,$id,$tablename,$config){
//TODO: Habría que conseguir el key de la tabla, sin necesidad de  pasárselo a la función.
	$link = connectDb($config);
	selectDb($link, $config);	
	$sql = "DELETE FROM $tablename WHERE $key = ".$id;

	$result = mysqli_query($link, $sql);
	
	return $result;

}
function getFields($tablename,$data,$config){

	$query = "DESCRIBE ".$tablename;
	$link = connectDb($config);
	selectDb($link,$config);
	$result = mysqli_query($link,$query);
	
	while($row = mysqli_fetch_assoc($result)){

		if($row['Key']!=='PRI')
			$fields[] = $row['Field'];
		else
			$pkey[]=$row['Field'];			

	}
	foreach ($data as $key => $value)
	{
		if(!in_array($key, $fields))
			unset($data[$key]);
		
	}	
	

	return array($pkey, $data);



} 
?>