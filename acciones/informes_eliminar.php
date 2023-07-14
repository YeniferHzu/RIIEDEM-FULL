<?php
include '../config/bd_informes.php';

$id_informes=$_GET['id_informes'];

$conexion=conexion();
$query=eliminar($conexion,$id_informes);

if ($query) {
	header('location:../informes.php?eliminar=success');
}else{
	header('location:../informes.php?eliminar=error');
}

?>