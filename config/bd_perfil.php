<?php

$conn = mysqli_connect("localhost", "root", "", "riiedem");
if(!$conn){
	die("Error: Error al conectar a la Base de Datos!");
}

function conexion(){
	$conn = mysqli_connect("localhost", "root", "", "riiedem");
	return $conn;
}
function listar($conexion){
	$sql="SELECT * FROM `usuarios`";
	$query=mysqli_query($conexion,$sql);
	$datos=mysqli_fetch_assoc($query);
	return $datos;
}

?>