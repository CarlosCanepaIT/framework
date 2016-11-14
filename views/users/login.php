<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">

			<h3>Inicio de sesion</h3>
			<form action="<?php echo APP_URL."/users/login"; ?>" method="POST">
				<div class="form-group">
					<label for="username">Usuario:</label>
					<input type="text" class="form-control" name="username">
				</div>
				<div class="form-group">
					<label for="password">Contraseña:</label>
					<input type="password" class="form-control" name="password">
				</div>
				<input type="submit" class="btn btn-raised btn-primary" name="" value="Iniciar sesión">
			</form>

        </div>
    </div>
</div>