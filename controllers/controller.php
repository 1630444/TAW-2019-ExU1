
<?php
    class MvcController {
        //LLAMAR A LA PLANTILLA
        public function plantilla() {
            //include se utiliza para invocar el archivo que tiene el código html
            include "views/template.php";
        }
        //Interaccion con el usuario
        public function enlacesPaginasController() {
            if (isset($_GET["action"])) {
                $enlacesController = $_GET["action"];
            } else {
                $enlacesController = "index";
            }
            $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
            include $respuesta;
        }
    }
?>