<?php

include('../application/model/duties.php');
include('../application/model/functions.php');

$config = parse_ini_file('../application/configs/settings.ini',true);

if(isset($_GET['action']))
	$action = $_GET['action'];
else
	$action = 'select';

switch ($action) {
	case 'insert':
		if($_POST){ 
			insert('duties',$_POST,$config['database']);		
			header("Location: /duties.php");
		}else{
			ob_start();
				include('../application/views/duties/insert.php');
				$content = ob_get_contents();
			ob_end_clean();		
		}
		break;
	case 'update':
		

		if($_POST){ 
	
			update('duties',$_POST,$config['database']);		
			header("Location: /duties.php");
		}else{



			$duty = getDuty($_GET['id'],$config['database']);

			ob_start();
				include('../application/views/duties/insert.php');
				$content = ob_get_contents();
			ob_end_clean();	
			break;
		}
	case 'delete':
		if($_POST)
		{
			if($_POST['Borrar']=="Si")
			{	
				delete('idduties' ,$_POST['idduties'],'duties', $config['database']);
				
				// TODO: remove image				
			}
			header("Location: /duties.php");
		}
		else
		{
			$duty = getDuty($_GET['id'], $config['database']);
			ob_start();
				include('../application/views/duties/delete.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
		break;

	case 'select':
		$registros = getDuties($config['database']);
		ob_start();
			include('../application/views/duties/select.php');
			$content = ob_get_contents();
		ob_end_clean();
		break;
	default:
		# code...
		break;
}

include('../application/views/backend.phtml');
?>