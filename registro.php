<?php

$conn = new mysqli("localhost", "root", "", "riiedem");

if($conn->connect_errno)
{
	echo "No hay conexión: (".$conn->connect_errno.")".$conn_>connect_error ;
}

$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$foto = $_FILES['foto'];
	$foto=addslashes(file_get_contents($foto['tmp_name']));

if (isset($_POST['registro'])) {

//$pass_fuerte = password_hash($password, PASSWORD_DEFAULT);
	$queryregistro = "INSERT INTO  	usuarios(nombre, apellido1, apellido2, correo, password, foto) VALUES ('$nombre', '$apellido1', '$apellido2', '$correo', '$password', '$foto')";

		if (mysqli_query($conn,$queryregistro)) {
			
			include('registro.html');

				echo '<script type="text/javascript">alert("Registrad@ Correctamente");
				window.location.href="registro.html";
				</script>';
				
			}
		else{
			echo "Error: ".$queryregistro."<br>".mysqli_error($conn);

			
		}
}

?>