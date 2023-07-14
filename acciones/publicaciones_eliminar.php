<?php
include '../config/bd_publicaciones.php';

$id_publicaciones=$_GET['id_publicaciones'];

$conexion=conexion();
$query=eliminar($conexion,$id_publicaciones);

if ($query) {
	header('location:../publicaciones.php?eliminar=success');
}else{
	header('location:../publicaciones.php?eliminar=error');
}

?>