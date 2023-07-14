<?php
$id_usuarios=$_GET['id_usuarios'];
	require 'config/conexion.php';
	
$datos=ListarDocente($id);
$nombre=$datos['nombre'];
$apellidoP=$datos['apellidoP'];
$apellidoM=$datos['apellidoM'];
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
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>

			<form class="form-horizontal" method="POST" action="acciones/update.php" autocomplete="off" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value=<?=$nombre?>>
					</div>
				</div>

				<input type="hidden" name="id" value="<?=$id?>">

				<div class="form-group">
					<label for="apellidoP" class="col-sm-2 control-label">Apellido Paterno</label>
					<div class="col-sm-10">
						<input type="apellidoP" class="form-control" id="apellidoP" name="apellidoP" placeholder="Apellido Paterno" value=<?=$apellidoP?>>
					</div>
				</div>

				<div class="form-group">
					<label for="apellidoM" class="col-sm-2 control-label">Apellido Materno</label>
					<div class="col-sm-10">
						<input type="apellidoM" class="form-control" id="apellidoM" name="apellidoM" placeholder="Apellido Materno" value=<?=$apellidoM?>>
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
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Actualizar y Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>