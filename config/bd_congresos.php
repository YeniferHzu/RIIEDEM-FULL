<?php

$conn = mysqli_connect("localhost", "root", "", "riiedem");
if(!$conn){
	die("Error: Error al conectar a la Base de Datos!");
}

#PARA LAS CONGRESOS
function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}

function listar($conexion){
	$sql="SELECT * FROM congresos";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function insertar($conexion,$nombre, $categoria, $fecha, $tipo, $archivoBLOB,$id_usuarios ){
	$sql="INSERT INTO congresos(nombre, categoria, fecha, tipo, archivo,id_usuarios) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB','$id_usuarios')";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function eliminar($conexion, $id_congresos){
	$sql="DELETE from congresos WHERE id_congresos=$id_congresos ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function datos($conexion,$id_congresos){
	$sql="SELECT * FROM `congresos` WHERE `id_congresos` = '$id_congresos'";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

function editarNombre($conexion,$id_congresos,$nombre){
	$sql="UPDATE congresos SET nombre='$nombre' WHERE id_congresos = $id_congresos";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editarArchivo($conexion,$id_congresos,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE congresos SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_congresos=$id_congresos ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editar($conexion,$id_congresos,$nombre,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE congresos SET nombre='$nombre',categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_congresos=$id_congresos ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

?>