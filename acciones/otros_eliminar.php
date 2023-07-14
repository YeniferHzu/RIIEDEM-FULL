<?php
include '../config/bd_otros.php';

$id_otros=$_GET['id_otros'];

$conexion=conexion();
$query=eliminar($conexion,$id_otros);

if ($query) {
	header('location:../otros.php?eliminar=success');
}else{
	header('location:../otros.php?eliminar=error');
}

?>