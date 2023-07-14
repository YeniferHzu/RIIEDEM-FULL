<?php

$conn = mysqli_connect("localhost", "root", "", "riiedem");
if(!$conn){
	die("Error: Error al conectar a la Base de Datos!");
}

#PARA LAS CLASES
function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}

function listar($conexion){
	$sql="SELECT * FROM clases";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function insertar($conexion,$nombre, $categoria, $fecha, $tipo, $archivoBLOB,$id_usuarios ){
	$sql="INSERT INTO clases(nombre, categoria, fecha, tipo, archivo,id_usuarios) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB','$id_usuarios')";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function eliminar($conexion, $id_clases){
	$sql="DELETE from clases WHERE id_clases=$id_clases ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function datos($conexion,$id_clases){
	$sql="SELECT * FROM `clases` WHERE `id_clases` = '$id_clases'";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

function editarNombre($conexion,$id_clases,$nombre){
	$sql="UPDATE clases SET nombre='$nombre' WHERE id_clases = $id_clases";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editarArchivo($conexion,$id_clases,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE clases SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_clases=$id_clases ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editar($conexion,$id_clases,$nombre,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE clases SET nombre='$nombre',categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_clases=$id_clases ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

?>