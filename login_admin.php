<?php

$conn = new mysqli("localhost", "root", "", "riiedem");


if($conn->connect_errno)
{
	echo "No hay conexión con la base de datos: (".$conn->connect_errno.")".$conn_>connect_error ;
}

session_start();

$correo = $_POST['correo'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if (isset($_POST['login'])) {

$sql=$conn->query("SELECT * FROM admin WHERE correo='$correo' and password='$password' and password2='$password2' ");

	$row = $sql->fetch_assoc();
		if ($row['correo'] == $correo && $row['password']==$password && $row['password2']==$password2) {
			$_SESSION['correo']=$correo;
			header("location:index_admin.php");
		}
		else{
		echo '<script type="text/javascript">alert("Datos incorrectos");
		window.location.href="login.html";
			</script>';
		}
}

?>