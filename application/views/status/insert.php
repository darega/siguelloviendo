
<form method="post" 
	  enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="idstatuses" value="<?=isset($_GET['id'])?$_GET['id']:'';?>"/>
</li>
<li>
Status: <input type="text" name="status" value="<?=isset($status['status'])?$status['status']:'';?>"/>
</li>


<br />
<button type="submit" name="Enviar" class="btn btn-success">Enviar</button>

<button type="reset" name="Borrar"  class="btn btn-danger">Borrar</button>



</ul>
</form>
