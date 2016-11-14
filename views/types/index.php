<script>
	function confirmarEliminacion($id)
	{
		eliminar = confirm("¿Deseas eliminar este registro?");
		if (eliminar)
			window.location.href = "<?php echo APP_URL.'/types/delete/';?>"+$id;
		else
			alert("Eliminación cancelada");
	}
</script>
<div class="container">
	<div class="row">
		<h2>Tipos de usuarios</h2>
		<h4>Número de tipos: <small><?php echo $typesCount; ?></small></h4>
		<p>
			<a class="btn btn-raised btn-success" href="<?php echo APP_URL."/types/add/"; ?>" role="button">
				<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
			</a>
		</p>
		<div class="table-responsive">
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
				<?php
				if (!empty($types)) {
					foreach ($types as $type): 
				?>
				<tr>
					<th scope="row"><?php echo $type["types"]["id"]; ?></th>
					<td><?php echo $type["types"]["name"]; ?></td>
					<td>
						<?php echo $this->Html->link("Edit", array(
							"controller"=>"types", 
							"method"=>"edit", 
							"arg" => $type["types"]["id"]
						)); ?>
						<!--<a class="btn btn-raised btn-info" href="<?php// echo APP_URL."/users/edit/".$user["users"]["id"]; ?>" role="button">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>-->
						<button class="btn btn-raised btn-danger" onclick="confirmarEliminacion(<?php echo $type["types"]["id"]; ?>);">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</button>
					</td>
				</tr>
				<?php 
					endforeach;
				}
				?>
				</tbody>
			</table>
		</div>		
	</div>
</div>