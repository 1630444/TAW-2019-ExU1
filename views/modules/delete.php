
<?php 
$con = new Database();
$id='';
$table='';
$id2='';
if (isset($_GET['id']))
    $id=intval($_GET['id']);

if (isset($_GET['table']))
    $table=$_GET['table'];

if (isset($_GET['id2']))
  $id2=$_GET['id2'];

	$res = $con->delete($id,$table);

	if($res){
    if ($id2!=''){
      header("location: index.php?action=".$table."&id=$id2");
    }else{
		header("location: index.php?action=".$table."&id=$id");
    }
	}else{
		echo "Error al eliminar el registro";
	}
?>