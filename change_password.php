<?php

$conn = new mysqli("localhost", "root", "", "riiedem");


if($conn->connect_errno)
{
	echo "No hay conexión con la base de datos: (".$conn->connect_errno.")".$conn_>connect_error ;
}

$pass = $_POST['new_password'];
$id_usuarios = $_POST['id_usuarios'];

$query= "UPDATE usuarios SET password = '$pass' WHERE id_usuarios=$id_usuarios";
$conn->query($query);


header("Location: index.html?message=success_password");


?>