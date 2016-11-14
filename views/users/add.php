<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            <h2>Agregar Usuario</h2>

            <form action="<?php echo APP_URL."/users/add"; ?>" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="type_id">Type:</label>
                    <!--<input type="text" class="form-control" name="rol">-->
                    <select class="form-control" name="type_id" id="type_id">
                    <?php foreach ($types as $type): ?>
                        <option value="<?php echo $type["types"]["id"]; ?>">
                            <?php echo $type["types"]["name"]; ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-raised btn-success" value="Guardar">
            </form>
        </div>
    </div>
</div>
