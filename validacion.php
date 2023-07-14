<?php

$conn = new mysqli("localhost", "root", "", "riiedem");


if($conn->connect_errno)
{
	echo "No hay conexión con la base de datos: (".$conn->connect_errno.")".$conn_>connect_error ;
}

session_start();

$correo = $_POST['correo'];
$password = $_POST['password'];

if (isset($_POST['login'])) {

$sql=$conn->query("SELECT * FROM usuarios WHERE correo='$correo' and password='$password' ");
	if ($datos=$sql->fetch_object()) {
		header("location:bienvenida.html");
	} else {
		
		include("login.html");
		echo "<script> alert ('El usuario no existe') </script>"; //falta mandar alerta
	}

}
 
//valida sin problema los datos

?>