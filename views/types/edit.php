<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">

            <h2>Editar tipo de usuario</h2>

            <form action="<?php echo APP_URL."/types/edit"; ?>" method="POST">
            	<input type="hidden" name="id" value="<?php echo $type["id"]; ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $type["name"]; ?>">
                </div>
                <input type="submit" class="btn btn-raised btn-success" value="Guardar">
            </form>

        </div>
    </div>
</div>