<!--  /////////////// MODULO DE CREAR CONTACTO ///////////////// -->
<!-- Recuadro -->
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Registrar Contacto</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <?php
      // Se instancia la clase de la Base de datos
            $con = new Database();
        if (isset($_POST) && !empty($_POST)) {
            
            // Se pasan las entradas a las variables correspondientes
            $nombre = $_POST['nombre'];
          $apellido = $_POST['apellido'];
          $email = $_POST['email'];
          $tel = $_POST['tel'];
            $id_proveedor = $_POST['id_proveedor'];
            
            //Se crea el registro en la base de datos
            $res = $con->createContacto($nombre, $apellido, $email, $tel, $id_proveedor);
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
              
              <!-- Campo Email -->
                <div class="col-md-6">
                    <label>E-mail:</label>
                    <input type="email" name="email" id="email" class='form-control' maxlength="20" required>
                </div>
              
              <!-- Campo Telefono -->
                <div class="col-md-6">
                    <label>Telefono:</label>
                    <input type="text" name="tel" id="tel" class='form-control' maxlength="15" required>
                </div>
              
                <!-- Campo Proveedor -->
                <div class="col-md-6">
                    <label>Proveedor:</label>
                    <select name="id_proveedor" id="id_proveedor" class='form-control' required>
                      <option value="" selected disabled hidden>Seleccione un proveedor</option>
                      <?php
                      // Se consiguen todos los registros para llenar el select
                      $listado = $con->readTable('proveedor');
                      while ($row = $listado->fetch(PDO::FETCH_OBJ)) {
                        echo "<option value=\"$row->id\">$row->apellido $row->nombre</option>";
                      }
                      ?>
                    </select>
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