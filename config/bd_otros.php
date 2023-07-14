<?php

$conn = mysqli_connect("localhost", "root", "", "riiedem");
if(!$conn){
	die("Error: Error al conectar a la Base de Datos!");
}

#PARA LAS OTROS
function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}

function listar($conexion){
	$sql="SELECT * FROM otros";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function insertar($conexion,$nombre, $categoria, $fecha, $tipo, $archivoBLOB,$id_usuarios ){
	$sql="INSERT INTO otros(nombre, categoria, fecha, tipo, archivo,id_usuarios) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB','$id_usuarios')";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function eliminar($conexion, $id_otros){
	$sql="DELETE from otros WHERE id_otros=$id_otros ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function datos($conexion,$id_otros){
	$sql="SELECT * FROM `otros` WHERE `id_otros` = '$id_otros'";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

function editarNombre($conexion,$id_otros,$nombre){
	$sql="UPDATE otros SET nombre='$nombre' WHERE id_otros = $id_otros";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editarArchivo($conexion,$id_otros,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE otros SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_otros=$id_otros ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editar($conexion,$id_otros,$nombre,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE otros SET nombre='$nombre',categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_otros=$id_otros ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

?>