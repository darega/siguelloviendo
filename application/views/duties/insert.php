
<form method="post" 
	  enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="idduties" value="<?=isset($_GET['id'])?$_GET['id']:'';?>"/>
</li>
<li>
Duty: <input type="text" name="duty" value="<?=isset($duty['duty'])?$duty['duty']:'';?>"/>
</li>
<br />
<button type="submit" name="Enviar" class="btn btn-success">Enviar</button>

<button type="reset" name="Borrar"  class="btn btn-danger">Borrar</button>
</ul>
</form>
