
  <h2 class="sub-header">Duties</h2>
  <h3 class="sub-header"><a href="?action=insert">( + ) Add Duty</a></h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Duty</th>  
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
			<td><a href="?action=update&id=<?=$registro['idduties'];?>">Update</a></td>
			<td><a href="?action=delete&id=<?=$registro['idduties'];?>">Delete</a></td>

	    </tr>
      <?php endforeach;?>
	  
	  </tbody>
	</table>
