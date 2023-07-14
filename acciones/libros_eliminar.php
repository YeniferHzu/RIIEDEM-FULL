<?php
include '../config/bd_libros.php';

$id_libros=$_GET['id_libros'];

$conexion=conexion();
$query=eliminar($conexion,$id_libros);

if ($query) {
	header('location:../libros.php?eliminar=success');
}else{
	header('location:../libros.php?eliminar=error');
}

?>