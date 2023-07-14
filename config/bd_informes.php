<?php

$conn = mysqli_connect("localhost", "root", "", "riiedem");
if(!$conn){
	die("Error: Error al conectar a la Base de Datos!");
}

#PARA LAS INFORMES
function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}

function listar($conexion){
	$sql="SELECT * FROM informes";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function insertar($conexion,$nombre, $categoria, $fecha, $tipo, $archivoBLOB,$id_usuarios ){
	$sql="INSERT INTO informes(nombre, categoria, fecha, tipo, archivo,id_usuarios) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB','$id_usuarios')";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function eliminar($conexion, $id_informes){
	$sql="DELETE from informes WHERE id_informes=$id_informes ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function datos($conexion,$id_informes){
	$sql="SELECT * FROM `informes` WHERE `id_informes` = '$id_informes'";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

function editarNombre($conexion,$id_informes,$nombre){
	$sql="UPDATE informes SET nombre='$nombre' WHERE id_informes = $id_informes";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editarArchivo($conexion,$id_informes,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE informes SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_informes=$id_informes ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editar($conexion,$id_informes,$nombre,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE informes SET nombre='$nombre',categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_informes=$id_informes ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

?>