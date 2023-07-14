<?php

$conn = mysqli_connect("localhost", "root", "", "riiedem");
if(!$conn){
	die("Error: Error al conectar a la Base de Datos!");
}

#PARA LAS PUBLICACIONES
function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}

function listar($conexion){
	$sql="SELECT * FROM publicaciones";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function insertar($conexion,$nombre, $categoria, $fecha, $tipo, $archivoBLOB,$id_usuarios ){
	$sql="INSERT INTO publicaciones(nombre, categoria, fecha, tipo, archivo,id_usuarios) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB','$id_usuarios')";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function eliminar($conexion, $id_publicaciones){
	$sql="DELETE from publicaciones WHERE id_publicaciones=$id_publicaciones ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function datos($conexion,$id_publicaciones){
	$sql="SELECT * FROM `publicaciones` WHERE `id_publicaciones` = '$id_publicaciones'";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

function editarNombre($conexion,$id_publicaciones,$nombre){
	$sql="UPDATE publicaciones SET nombre='$nombre' WHERE id_publicaciones = $id_publicaciones";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editarArchivo($conexion,$id_publicaciones,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE publicaciones SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_publicaciones=$id_publicaciones ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editar($conexion,$id_publicaciones,$nombre,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE publicaciones SET nombre='$nombre',categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_publicaciones=$id_publicaciones ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

?>