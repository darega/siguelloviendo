<form method="post" 
	  enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="idstatuses" value="<?=$_GET['id'];?>"/>
</li>
<li>
Name: <?=isset($status['status'])?$status['status']:'';?>
</li>

<br />
<button type="submit" name="Borrar" value="Si" class="btn btn-success">Si</button>

<button type="submit" name="Borrar" value="No" class="btn btn-danger">NO</button>



</ul>
</form>