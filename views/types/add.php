<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            <h2>Agregar tipo de usuario</h2>

            <form action="<?php echo APP_URL."/types/add"; ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" class="form-control" name="name">
                </div>
                <input type="submit" class="btn btn-raised btn-success" value="Guardar">
            </form>
        </div>
    </div>
</div>
