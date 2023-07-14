<?php
include '../config/bd_congresos.php';

$id_congresos=$_GET['id_congresos'];

$conexion=conexion();
$query=eliminar($conexion,$id_congresos);

if ($query) {
	header('location:../congresos.php?eliminar=success');
}else{
	header('location:../congresos.php?eliminar=error');
}

?>