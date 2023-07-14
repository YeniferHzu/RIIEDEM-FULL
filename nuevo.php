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
		<link rel="stylesheet" type="text/css" href="css/menu.css">
		<script src="https://kit.fontawesome.com/039479d257.js" crossorigin="anonymous"></script><!--Redes sociales-->
	</head>
	
	<body>

<header id="main-header">

		<a id="logo-header" href="index.html">
		<img class="icono" src="icono.png">	
		<span class="site-name">RIIEDEM</span>
		<span class="site-desc">Repositorio Institucional para Instituciones Educativas Del Estado De México</span>
	</a> <!-- / #logo-header -->

<div align="right"><!--Alineación del menú-->
	<!--INICIO DEL MENÚ-->

	<!--<a href="perfil.php"><img src="img/usuario.png" width="45" height="45"></a>Perfil de usuario-->

	<div class="dropdown" align="center">
	  	<button class="menu"><img src="img/lista.png" width="24" height="24"></button>
	  		<div class="dropdown-content">
	  			<a href="index_admin.php">Inicio</a>
				<a href="salir.php"> Cerrar Sesión</a>

	  		</div><!--contenido del menu-->
	</div><!--Div class="dropdown"-->
</div><!--Div de la alineación del menú-->

</header><!-- / #main-header -->

		<div class="container">
			<div class="row">
				<h3 style="text-align:center">REGISTRAR NUEVO DOCENTE</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="acciones/guardar.php" autocomplete="off" enctype="multipart/form-data">
<input type="hidden" name="id_usuarios" value="<?php $id_usuarios = $_GET['id_usuarios'];?>"/>
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
				</div>

				<div class="form-group">
					<label for="apellidoP" class="col-sm-2 control-label">Apellido Paterno</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Apellido Paterno" required>
					</div>
				</div>

				<div class="form-group">
					<label for="apellidoM" class="col-sm-2 control-label">Apellido Materno</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Apellido Materno" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="correo" class="col-sm-2 control-label">Correo Electronico</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electronico" required>
					</div>
				</div>

				<div class="form-group">
					<label for="apellidoP" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="foto" class="col-sm-2 control-label">Fotografia</label>
					<div class="col-sm-10">
					<input class="form-control" type="file" name="foto" required>
        			</div>
				</div>							
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index_admin.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Registrar</button>
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