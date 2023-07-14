<?php

function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}

function listar($conexion){
	$sql="SELECT * FROM horarios";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function insertar($conexion,$nombre, $categoria, $fecha, $tipo, $archivoBLOB ){
	$sql="INSERT INTO horarios(nombre, categoria, fecha, tipo, archivo) VALUES('$nombre','$categoria','$fecha','$tipo','$archivoBLOB')";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function eliminar($conexion, $id_usuarios){
	$sql="DELETE from horarios WHERE id_usuarios=$id_usuarios ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function datos($conexion,$id_usuarios){
	$sql="SELECT * FROM horarios WHERE id_usuarios= $id_usuarios";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

function editarNombre($conexion,$id_usuarios,$nombre){
	$sql="UPDATE horarios SET nombre='$nombre' WHERE id_usuarios=$id_usuarios";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editarArchivo($conexion,$id_usuarios,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE horarios SET categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_usuarios=$id_usuarios ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

function editar($conexion,$id_usuarios,$nombre,$categoria,$tipo,$fecha,$archivoBLOB){
	$sql="UPDATE horarios SET nombre='$nombre',categoria='$categoria',tipo='$tipo',fecha='$fecha',archivo='$archivoBLOB' WHERE id_usuarios=$id_usuarios ";
	$query=mysqli_query($conexion,$sql);
	return $query;
}

?>