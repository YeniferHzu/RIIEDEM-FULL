<?php

$conn = mysqli_connect("localhost", "root", "", "riiedem");
if(!$conn){
	die("Error: Error al conectar a la Base de Datos!");
}

#PARA LAS ESTANCIAS
function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}

function listar($conexion){
	$sql="SELECT * FROM estancias";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function insertar($conexion,$nombre, $categoria, $fecha, $tipo, $archivoBLOB,$id_usuarios ){
	$sql="INSERT INTO estancias(nombre, categoria, fecha, tipo, archivo,id_usuarios) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB','$id_usuarios')";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function eliminar($conexion, $id_estancias){
	$sql="DELETE from estancias WHERE id_estancias=$id_estancias ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function datos($conexion,$id_estancias){
	$sql="SELECT * FROM `estancias` WHERE `id_estancias` = '$id_estancias'";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

function editarNombre($conexion,$id_estancias,$nombre){
	$sql="UPDATE estancias SET nombre='$nombre' WHERE id_estancias = $id_estancias";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editarArchivo($conexion,$id_estancias,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE estancias SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_estancias=$id_estancias ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editar($conexion,$id_estancias,$nombre,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE estancias SET nombre='$nombre',categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_estancias=$id_estancias ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

?>