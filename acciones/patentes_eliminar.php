<?php
include '../config/bd_patentes.php';

$id_patentes=$_GET['id_patentes'];

$conexion=conexion();
$query=eliminar($conexion,$id_patentes);

if ($query) {
	header('location:../patentes.php?eliminar=success');
}else{
	header('location:../patentes.php?eliminar=error');
}

?>