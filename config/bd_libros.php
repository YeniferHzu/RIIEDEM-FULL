<?php

$conn = mysqli_connect("localhost", "root", "", "riiedem");
if(!$conn){
	die("Error: Error al conectar a la Base de Datos!");
}

#PARA LAS LIBROS
function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}

function listar($conexion){
	$sql="SELECT * FROM libros";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function insertar($conexion,$nombre, $categoria, $fecha, $tipo, $archivoBLOB,$id_usuarios ){
	$sql="INSERT INTO libros(nombre, categoria, fecha, tipo, archivo,id_usuarios) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB','$id_usuarios')";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function eliminar($conexion, $id_libros){
	$sql="DELETE from libros WHERE id_libros=$id_libros ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function datos($conexion,$id_libros){
	$sql="SELECT * FROM `libros` WHERE `id_libros` = '$id_libros'";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

function editarNombre($conexion,$id_libros,$nombre){
	$sql="UPDATE libros SET nombre='$nombre' WHERE id_libros = $id_libros";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editarArchivo($conexion,$id_libros,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE libros SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_libros=$id_libros ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editar($conexion,$id_libros,$nombre,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE libros SET nombre='$nombre',categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_libros=$id_libros ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

?>