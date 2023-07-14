<?php
include '../config/bd_horarios.php';

$id_horarios=$_GET['id_horarios'];

$conexion=conexion();
$query=eliminar($conexion,$id_horarios);

if ($query) {
	header('location:../horarios.php?eliminar=success');
}else{
	header('location:../horarios.php?eliminar=error');
}

?>