
<?php
class EnlacesPaginas
{
    public function enlacesPaginasModel($enlacesModel)
    {
        if (
            $enlacesModel == "proveedor" ||
            $enlacesModel == "proveedor_create" ||
            $enlacesModel == "proveedor_update" ||
            $enlacesModel == "contacto" ||
            $enlacesModel == "contacto_create" ||
            $enlacesModel == "contacto_update" ||
            $enlacesModel == "delete" 
        ) {
            $module = "views/modules/" . $enlacesModel . ".php";
        } else if ($enlacesModel == "index") {
		
        } else {
            $module = "views/modules/inicio.php";
        }
        return $module;
    }
}
?>