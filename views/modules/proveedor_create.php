<!--  /////////////// MODULO DE CREAR Proveedor ///////////////// -->
<!-- Recuadro -->
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Registrar Proveedor</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <?php
        if (isset($_POST) && !empty($_POST)) {
            // Se instancia la clase de la Base de datos
            $con = new Database();
            // Se pasan las entradas a las variables correspondientes
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $rfc = $_POST['rfc'];
            $direccion = $_POST['direccion'];
            $email = $_POST['email'];
            //Se crea el registro en la base de datos
            $res = $con->createProveedor($nombre, $apellido, $rfc, $direccion, $email);
            if ($res) {
                $message = "Datos insertados con éxito";
                $class = "alert alert-success";
            } else {
                $message = "No se pudieron insertar los datos";
                $class = "alert alert-danger";
            }

            ?>
            <div class="<?php echo $class ?>">
                <?php echo $message; ?>
            </div>
        <?php
    }

    ?>
        <div class="row">
            <form method="post">

                <!-- Campo Nombre -->
                <div class="col-md-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class='form-control' maxlength="30" required>
                </div>

                <!-- Campo Apellido -->
                <div class="col-md-6">
                    <label>Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class='form-control' maxlength="30" required>
                </div>
              
                <!-- Campo rfc -->
                <div class="col-md-6">
                    <label>RFC:</label>
                    <input type="text" name="rfc" id="rfc" class='form-control' required>
                </div>

                <!-- Campo Direccion -->
                <div class="col-md-6">
                    <label>Direccion:</label>
                    <input type="text" name="direccion" id="direccion" class='form-control' maxlength="50" required>
                </div>
              
                <!-- Campo Email -->
                <div class="col-md-6">
                    <label>E-mail:</label>
                    <input type="email" name="email" id="email" class='form-control' maxlength="20" required>
                </div>

                <div class="col-md-12 pull-right">
                    <hr>
                    <!-- Boton de guardar datos -->
                    <button type="submit" class="btn btn-success pull-right">Guardar datos</button>
                </div>
            </form>
        </div>
        
    </div>
    <!-- /.box-content -->
</div>
<!-- /.col-xs-12 -->