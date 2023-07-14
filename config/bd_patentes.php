<?php

$conn = mysqli_connect("localhost", "root", "", "riiedem");
if(!$conn){
	die("Error: Error al conectar a la Base de Datos!");
}

#PARA LAS PATENTES
function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}

function listar($conexion){
	$sql="SELECT * FROM patentes";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function insertar($conexion,$nombre, $categoria, $fecha, $tipo, $archivoBLOB,$id_usuarios ){
	$sql="INSERT INTO patentes(nombre, categoria, fecha, tipo, archivo,id_usuarios) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB','$id_usuarios')";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function eliminar($conexion, $id_patentes){
	$sql="DELETE from patentes WHERE id_patentes=$id_patentes ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function datos($conexion,$id_patentes){
	$sql="SELECT * FROM `patentes` WHERE `id_patentes` = '$id_patentes'";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

function editarNombre($conexion,$id_patentes,$nombre){
	$sql="UPDATE patentes SET nombre='$nombre' WHERE id_patentes = $id_patentes";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editarArchivo($conexion,$id_patentes,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE patentes SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_patentes=$id_patentes ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editar($conexion,$id_patentes,$nombre,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE patentes SET nombre='$nombre',categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_patentes=$id_patentes ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

?>