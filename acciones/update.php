<?php
	include "../config/conexion.php";

	$id_usuarios = $_POST['id_usuarios'];
	$nombre = $_POST['nombre'];
	$apellido1 = $_POST['apellido1'];
	$apellido2 = $_POST['apellido2'];
	$correo = $_POST['correo'];
	$foto = $_FILES['foto'];


	if($foto['size']==0){
        $query=actualizarsinfoto($id_usuarios,$nombre,$apellido1,$apellido2,$correo);
    }else{
        $foto=addslashes(file_get_contents($foto['tmp_name']));
        $query=actualizar($id_usuarios,$nombre,$apellido1,$apellido2,$correo,$foto);
    }

?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap-theme.css" rel="stylesheet">
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>	
        <link rel="shortcut icon" type="text/css" href="icono.png"><!--Icono de las pestañas-->
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($query) { ?>
				<h3>REGISTRO MODIFICADO</h3>
				<?php } else { ?>
				<h3>ERROR AL MODIFICAR</h3>
				<?php } ?>
				
				<a href="../index_admin.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
