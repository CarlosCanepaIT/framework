<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">

            <h2>Editar Usuario</h2>

            <form action="<?php echo APP_URL."/users/edit"; ?>" method="POST">
            	<input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $user["username"]; ?>">
                </div>
                <div class="form-group">
                    <label for="newPassword">NewPassword:</label>
                    <input type="password" class="form-control" name="newPassword">
                </div>
                <div class="form-group">
                    <label for="type_id">Type:</label>
                    <!--<input type="text" class="form-control" name="rol">-->
                    <select class="form-control" name="type_id" id="type_id">
                        <?php 
                        foreach ($types as $type):
                            if ($type["types"]["id"] == $user["type_id"]) {
                        ?>
                            <option selected value="<?php echo $type["types"]["id"]; ?>">
                                <?php echo $type["types"]["name"]; ?>
                            </option>
                        <?php 
                            } else {
                        ?>
                            <option value="<?php echo $type["types"]["id"]; ?>">
                                <?php echo $type["types"]["name"]; ?>
                            </option>
                        <?php
                            }
                            endforeach;
                        ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-raised btn-success" value="Guardar">
            </form>

        </div>
    </div>
</div>