<?php
include '../config/bd_clases.php';

$id_clases=$_GET['id_clases'];

$conexion=conexion();
$query=eliminar($conexion,$id_clases);

if ($query) {
	header('location:../clases.php?eliminar=success');
}else{
	header('location:../clases.php?eliminar=error');
}

?>