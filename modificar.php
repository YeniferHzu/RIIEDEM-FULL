<?php
$id_usuarios=$_GET['id_usuarios'];
	require 'config/conexion.php';
	
$datos=ListarDocente($id_usuarios);
$nombre=$datos['nombre'];
$apellido1=$datos['apellido1'];
$apellido2=$datos['apellido2'];
$correo=$datos['correo'];
$foto=$datos['foto'];
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
        <link rel="shortcut icon" type="text/css" href="icono.png"><!--Icono de las pestañas-->
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<link rel="stylesheet" type="text/css" href="css/header_and_footer.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="https://kit.fontawesome.com/039479d257.js" crossorigin="anonymous"></script>
	</head>
	
	<body>

		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>

			<form class="form-horizontal" method="POST" action="acciones/update.php" autocomplete="on" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value=<?=$nombre?>>
					</div>
				</div>

				<input type="hidden" name="id_usuarios" value="<?=$id_usuarios?>">

				<div class="form-group">
					<label for="apellido1" class="col-sm-2 control-label">Apellido Paterno</label>
					<div class="col-sm-10">
						<input type="apellido1" class="form-control" id="apellido1" name="apellido1" placeholder="Apellido Paterno" value=<?=$apellido1?>>
					</div>
				</div>

				<div class="form-group">
					<label for="apellido2" class="col-sm-2 control-label">Apellido Materno</label>
					<div class="col-sm-10">
						<input type="apellido2" class="form-control" id="apellido2" name="apellido2" placeholder="Apellido Materno" value=<?=$apellido2?>>
					</div>
				</div>
				
				
				<div class="form-group">
					<label for="correo" class="col-sm-2 control-label">Correo Electronico</label>
					<div class="col-sm-10">
						<input type="correo" class="form-control" id="correo" name="correo" placeholder="Correo" value=<?=$correo?>>
					</div>
				</div>
				
				<div class="form-group">
					<label for="foto" class="col-sm-2 control-label">Fotografia:</label>
					<div class="col-sm-10">
				<center>
					<img style="max-height : 250px" class="mt-2"src="data:image/jpg;base64,<?=base64_encode($foto) ?>"> 
				</center>
				<input class="form-control" type="file" name="foto">
        			</div>
				</div>
							
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index_admin.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>

<br><br><br><br><br><br><br><br>
	<footer id="main-footer">
		<a href="">
			<i class="fa-brands fa-facebook"></i>
		</a>
		<a href="">
			<i class="fa-brands fa-twitter"></i>
		</a>
		<a href="">
			<i class="fa-solid fa-envelope"></i>
		</a>
		<p>&copy; 2023</p>
	</footer>

	</body>
</html>