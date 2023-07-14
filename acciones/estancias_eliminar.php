<?php
include '../config/bd_estancias.php';

$id_estancias=$_GET['id_estancias'];

$conexion=conexion();
$query=eliminar($conexion,$id_estancias);

if ($query) {
	header('location:../estancias.php?eliminar=success');
}else{
	header('location:../estancias.php?eliminar=error');
}

?>