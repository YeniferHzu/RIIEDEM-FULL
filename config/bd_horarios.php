<?php

$conn = mysqli_connect("localhost", "root", "", "riiedem");
if(!$conn){
	die("Error: Error al conectar a la Base de Datos!");
}

#PARA LAS HORARIOS
function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}

function listar($conexion){
	$sql="SELECT * FROM horarios";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function insertar($conexion,$nombre, $categoria, $fecha, $tipo, $archivoBLOB,$id_usuarios ){
	$sql="INSERT INTO horarios(nombre, categoria, fecha, tipo, archivo,id_usuarios) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB','$id_usuarios')";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function eliminar($conexion, $id_horarios){
	$sql="DELETE from horarios WHERE id_horarios=$id_horarios ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function datos($conexion,$id_horarios){
	$sql="SELECT * FROM `horarios` WHERE `id_horarios` = '$id_horarios'";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

function editarNombre($conexion,$id_horarios,$nombre){
	$sql="UPDATE horarios SET nombre='$nombre' WHERE id_horarios = $id_horarios";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editarArchivo($conexion,$id_horarios,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE horarios SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_horarios=$id_horarios ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editar($conexion,$id_horarios,$nombre,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE horarios SET nombre='$nombre',categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_horarios=$id_horarios ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

?>