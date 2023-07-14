<?php
include '../config/bd_modelos.php';

$id_modelos=$_GET['id_modelos'];

$conexion=conexion();
$query=eliminar($conexion,$id_modelos);

if ($query) {
	header('location:../modelos.php?eliminar=success');
}else{
	header('location:../modelos.php?eliminar=error');
}

?>