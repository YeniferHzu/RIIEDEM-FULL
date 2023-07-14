<?php

$conn = mysqli_connect("localhost", "root", "", "riiedem");
if(!$conn){
	die("Error: Error al conectar a la Base de Datos!");
}

#PARA LAS MODELOS
function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}

function listar($conexion){
	$sql="SELECT * FROM modelos";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function insertar($conexion,$nombre, $categoria, $fecha, $tipo, $archivoBLOB,$id_usuarios ){
	$sql="INSERT INTO modelos(nombre, categoria, fecha, tipo, archivo,id_usuarios) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB','$id_usuarios')";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function eliminar($conexion, $id_modelos){
	$sql="DELETE from modelos WHERE id_modelos=$id_modelos ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function datos($conexion,$id_modelos){
	$sql="SELECT * FROM `modelos` WHERE `id_modelos` = '$id_modelos'";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

function editarNombre($conexion,$id_modelos,$nombre){
	$sql="UPDATE modelos SET nombre='$nombre' WHERE id_modelos = $id_modelos";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editarArchivo($conexion,$id_modelos,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE modelos SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_modelos=$id_modelos ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editar($conexion,$id_modelos,$nombre,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE modelos SET nombre='$nombre',categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_modelos=$id_modelos ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

?>