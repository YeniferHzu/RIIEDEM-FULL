<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "riiedem");
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	
if (isset($_POST['login'])) {

	$correo = $_POST['correo'];
	$password = $_POST['password'];

	$query = mysqli_query($conn, "SELECT * FROM `usuarios` WHERE `correo` = '$correo' && `password` = '$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;

		if ($row > 0) {
			$_SESSION['usuarios'] = $fetch['id_usuarios'];
			header("location:bienvenida_docentes.php");
		}
		else{
		echo '<script type="text/javascript">alert("Datos incorrectos");
		window.location.href="login_docentes.html";
			</script>';
		}
}

?>
