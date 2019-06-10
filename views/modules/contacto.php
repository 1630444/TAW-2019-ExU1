<!--  /////////////// MODULO DE CONTACTO ///////////////// -->
<!-- Recuadro -->
<div class="col-xs-12">
    <div class="box-content">
        <h4 class="box-title" style="margin-left: auto; margin-right: auto; font-size:25px; text-align: center;">Contacto</h4>
        <hr>
        <!--/// Todo el contenido del recuadro ////-->

        <!-- Boton para agregar registro -->
        <div class="pull-right">
            <a href="index.php?action=contacto_create" class="btn btn-success waves-effect waves-lights"><i class="fa fa-plus"></i> Agregar contacto</a>
        </div>
        <br>
        <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
                <!-- Se ponen las cabezeras de la tabla -->
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                  <th>Telefono</th>
                  <th>Proveedor</th>
                </tr>
            </thead>
            <tfoot>
                <!-- Se ponen el pie de la tabla, las mismcasque lascabezereas -->
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                  <th>Telefono</th>
                  <th>Proveedor</th>
                </tr>
            </tfoot>

            <?php
            // Se incluye la clase de base de datos, en donde se realia la conexion.
            // Se instancia la clase de la Base de datos
            $con = new Database();
            // Se llama a la funcion que regresa los registros de la tabla 
            $listado = $con->readTable('contacto');
            ?>
            <tbody>
                <?php
                // Se recorre cada uno de los registros que halla regresado la consulta para poder consultar los datos de cada uno y guardarlos en variables individuales.
                while ($row = $listado->fetch(PDO::FETCH_OBJ)) {
                    $id = $row->id;
                    ?>
                    <tr>
                        <!-- Se agrega una fila -->
                        <td><?php echo $id; ?></td>
                        <td><?php echo $row->nombre; ?></td>
                      <td><?php echo $row->apellido; ?></td>
                      <td><?php echo $row->email; ?></td>
                      <td><?php echo $row->tel; ?></td>
                        <td><?php echo $con->singleData($row->id_proveedor,'proveedor','apellido'); ?></td>
                        <td>
                            <!--Botón para modificar el registro-->
                            <a class="btn btn-warning waves-effect waves-light" title="Editar" data-toggle="tooltip" onclick="
                                            if(confirm('¿Seguro que desea modificar este registro?')){
                                                document.location.href = 'index.php?action=contacto_update&id=<?php echo $id; ?>'
                                            }"><i class="fa fa-edit">Editar</i></a>
                            <!--Botón para eliminar el registro-->
                            <a class="btn btn-danger waves-effect waves-light" title="Eliminar" data-toggle="tooltip" onclick="
                                            if(confirm('¿Seguro que desea eliminar este registro?')){
                                                document.location.href = 'index.php?action=delete&id=<?php echo $id; ?>&table=contacto'
                                            }"><i class="fa fa-trash">Eliminar</i></a>
                        </td>
                    </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>
    <!-- /.box-content -->
</div>
<!-- /.col-xs-12 -->