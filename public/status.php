<?php

include('../application/model/status.php');
include('../application/model/functions.php');

$config = parse_ini_file('../application/configs/settings.ini',true);

if(isset($_GET['action']))
	$action = $_GET['action'];
else
	$action = 'select';

switch ($action) {
	case 'insert':
		if($_POST){ 
			insert('statuses',$_POST,$config['database']);		
			header("Location: /status.php");
		}else{
			ob_start();
				include('../application/views/status/insert.php');
				$content = ob_get_contents();
			ob_end_clean();		
		}
		break;
	case 'update':
		

		if($_POST){ 
	
			update('statuses',$_POST,$config['database']);		
			header("Location: /status.php");
		}else{



			$status = getStatus($_GET['id'],$config['database']);

			ob_start();
				include('../application/views/status/insert.php');
				$content = ob_get_contents();
			ob_end_clean();	
			break;
		}
	case 'delete':
		if($_POST)
		{
			if($_POST['Borrar']=="Si")
			{	
				delete('idstatuses' ,$_POST['idstatuses'],'statuses', $config['database']);
				
				// TODO: remove image				
			}
			header("Location: /status.php");
		}
		else
		{
			$status = getStatus($_GET['id'], $config['database']);
			ob_start();
				include('../application/views/status/delete.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
		break;

	case 'select':
		$registros = getStatuses($config['database']);
		ob_start();
			include('../application/views/status/select.php');
			$content = ob_get_contents();
		ob_end_clean();
		break;
	default:
		# code...
		break;
}

include('../application/views/backend.phtml');
?>