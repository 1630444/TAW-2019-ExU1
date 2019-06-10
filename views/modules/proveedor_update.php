<!--  /////////////// MODULO DE EDITAR PROVEEDORES ///////////////// -->
<!-- Recuadro -->
<?php
// Si el url tiene un id se guarda en u avariable
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    // si no se regresa al index
    header("location:index.php?action=proveedor");
}
?>
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Modificar Proveedor</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <?php
        // Se instancia la clase de la Base de datos
        $con = new Database();
        if (isset($_POST) && !empty($_POST)) {
            // Se pasan las entradas a las variables correspondientes
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $rfc = $_POST['rfc'];
            $direccion = $_POST['direccion'];
            $email = $_POST['email'];
            //Se crea el registro en la base de datos
            $res = $con->updateProveedor($id, $nombre, $apellido, $rfc, $direccion, $email);
            if ($res) {
                $message = "Datos actualizados con éxito";
                $class = "alert alert-success";
            } else {
                $message = "No se pudieron actualizar los datos";
                $class = "alert alert-danger";
            }

            ?>
            <div class="<?php echo $class ?>">
                <?php echo $message; ?>
            </div>
        <?php
    }
    $datos = $con->single($id, 'proveedor');
    ?>
        <div class="row">
            <form method="post">
              
              <!--value="<?php echo $datos->nombre; ?>"-->
              
                <!-- Campo ID -->
                <div class="col-md-6">
                    <label>Id:</label>
                    <input type="number" class='form-control' maxlength="11" value="<?php echo $datos->id; ?>" disabled>
                </div>
              
                <!-- Campo Nombre -->
                <div class="col-md-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class='form-control' maxlength="30" value="<?php echo $datos->nombre; ?>" required>
                </div>

                <!-- Campo Apellido -->
                <div class="col-md-6">
                    <label>Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class='form-control' maxlength="30" value="<?php echo $datos->apellido; ?>" required>
                </div>
              
                <!-- Campo rfc -->
                <div class="col-md-6">
                    <label>RFC:</label>
                    <input type="text" name="rfc" id="rfc" class='form-control' value="<?php echo $datos->rfc; ?>" required>
                </div>

                <!-- Campo Direccion -->
                <div class="col-md-6">
                    <label>Direccion:</label>
                    <input type="text" name="direccion" id="direccion" class='form-control' maxlength="50" value="<?php echo $datos->direccion; ?>" required>
                </div>
              
                <!-- Campo Email -->
                <div class="col-md-6">
                    <label>E-mail:</label>
                    <input type="email" name="email" id="email" class='form-control' maxlength="20" value="<?php echo $datos->email; ?>" required>
                </div>

                <div class="col-md-12 pull-right">
                    <hr>
                    <!-- Boton Actualizar datos -->
                    <button type="submit" class="btn btn-success pull-right">Actualizar datos</button>
                </div>
            </form>
        </div>

    </div>
    <!-- /.box-content -->
</div>
<!-- /.col-xs-12 -->