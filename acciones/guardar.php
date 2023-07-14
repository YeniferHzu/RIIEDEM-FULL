<?php
include "../config/conexion.php";
	
$conn = new mysqli('localhost', 'root', '', 'riiedem');


$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$foto= $_FILES['foto'];

 $foto=addslashes(file_get_contents($foto['tmp_name']));

$sql = "SELECT * FROM usuarios where correo='$correo'";
$verificado = mysqli_query($conn,$sql);


if(mysqli_num_rows($verificado)>0) {
  	echo "<script> alert('El correo $correo que utilizo ya esta registrado por otro docente');window.location= '../nuevo.php' </script>";
 
 }else{
   $query=insertar($nombre,$apellido1,$apellido2,$correo,$password,$foto);

}

	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap-theme.css" rel="stylesheet">
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>	
        <link rel="shortcut icon" type="text/css" href="../icono.png"><!--Icono de las pestañas-->
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($query) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="../index_admin.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
