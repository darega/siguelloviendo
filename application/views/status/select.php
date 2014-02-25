
  <h2 class="sub-header">Statuses</h2>
  <h3 class="sub-header"><a href="?action=insert">( + ) Add Status</a></h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Status</th>  
          <th>Update</th>
          <th>Delete</th>                
        </tr>
      </thead>
      <tbody>
        
      <?php foreach ($registros as $key => $registro): ?>
      	<tr>
	      	<?php foreach ($registro as $key => $column): ?>
				<td><?=$column ?>				
			<?php endforeach;?> 
			<td><a href="?action=update&id=<?=$registro['idstatuses'];?>">Update</a></td>
			<td><a href="?action=delete&id=<?=$registro['idstatuses'];?>">Delete</a></td>

	    </tr>
      <?php endforeach;?>
	  
	  </tbody>
	</table>
