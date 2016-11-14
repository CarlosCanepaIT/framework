<script>
	function confirmarEliminacion($id)
	{
		eliminar = confirm("¿Deseas eliminar este registro?");
		if (eliminar)
			window.location.href = "<?php echo APP_URL.'/users/delete/';?>"+$id;
		else
			alert("Eliminación cancelada");
	}
</script>
<div class="container">
	<div class="row">
		<h2>Listado de usuarios</h2>
		<h4>Número de usuarios: <small><?php echo $usersCount; ?></small></h4>
		<p>
			<a class="btn btn-raised btn-success" href="<?php echo APP_URL."/users/add/"; ?>" role="button">
				<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
			</a>
		</p>
		<div class="table-responsive">
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Password</th>
						<th>Type</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
				<?php
				if (!empty($users)) {
					foreach ($users as $user): 
				?>
				<tr>
					<th scope="row"><?php echo $user["users"]["id"]; ?></th>
					<td><?php echo $user["users"]["username"]; ?></td>
					<td><?php echo $user["users"]["password"]; ?></td>
					<td><?php echo $user["types"]["name"]; ?></td>
					<td>
						<?php echo $this->Html->link("Edit", array(
							"controller"=>"users", 
							"method"=>"edit", 
							"arg" => $user["users"]["id"]
						)); ?>
						<!--<a class="btn btn-raised btn-info" href="<?php// echo APP_URL."/users/edit/".$user["users"]["id"]; ?>" role="button">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>-->
						<button class="btn btn-raised btn-danger" onclick="confirmarEliminacion(<?php echo $user["users"]["id"]; ?>);">
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