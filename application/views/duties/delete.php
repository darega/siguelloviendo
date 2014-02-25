<form method="post" 
	  enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="idduties" value="<?=$_GET['id'];?>"/>
</li>
<li>
Name: <?=isset($duty['duty'])?$duty['duty']:'';?>
</li>

<br />
<button type="submit" name="Borrar" value="Si" class="btn btn-success">Si</button>

<button type="submit" name="Borrar" value="No" class="btn btn-danger">NO</button>



</ul>
</form>