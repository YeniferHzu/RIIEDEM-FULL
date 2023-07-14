<?php
	require 'validator.php';
	require_once 'config/conexion.php'						
?>

<!DOCTYPE html>
<html lang="ES">
<head>
	<title>Página de inicio</title>
	<meta charset="utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/header_and_footer.css">
	<link rel="shortcut icon" type="text/css" href="icono.png"><!--Icono de las pestañas-->
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script src="https://kit.fontawesome.com/039479d257.js" crossorigin="anonymous"></script><!--Redes sociales-->
</head>

<body>

<?php
			$query = mysqli_query($conn, "SELECT * FROM `usuarios` WHERE `id_usuarios` = '$_SESSION[usuarios]'") or die(mysqli_error());
			$fetch = mysqli_fetch_array($query);
		?>

<input type="hidden" name="id_usuarios" value="<?php echo $fetch['id_usuarios']?>?>"/>

<input type="hidden" name="correo" value="<?php echo $fetch['correo']?>"/>
<header id="main-header">

		<a id="logo-header" href="index.html">
		<img class="icono" src="icono.png">	
		<span class="site-name">RIIEDEM</span>
		<span class="site-desc">Repositorio Institucional para Instituciones Educativas Del Estado De México</span>
	</a> <!-- / #logo-header -->

<div align="right"><!--Alineación del menú-->
	<!--INICIO DEL MENÚ-->

	<a href="perfil.php"><img src="img/usuario.png" width="45" height="45"></a><!--Perfil de usuario-->

	<div class="dropdown" align="center">
	  	<button class="menu"><img src="img/lista.png" width="24" height="24"></button>
	  		<div class="dropdown-content">
	  			<a href="bienvenida_docentes.php">Inicio</a>
				<a href="clases.php">Clases</a>
				<a href="congresos.php">Congresos</a>
				<a href="estancias.php">Estancias académicas</a>
				<a href="horarios.php">Horarios</a>
				<a href="informes.php">Informes técnicos</a>
				<a href="libros.php">Libros</a>
				<a href="modelos.php">Modelos</a>
				<a href="patentes.php">Patentes</a>
				<a href="publicaciones.php">Publicaciones</a>
				<a href="otros.php">Mis formatos</a>
				<a href="salir.php"> Cerrar Sesión</a>

	  		</div><!--contenido del menu-->
	</div><!--Div class="dropdown"-->
</div><!--Div de la alineación del menú-->

</header><!-- / #main-header -->


	<div class="div_con_texto"> <!--Inicio del contenido del cuerpo-->

		<div class="div_con_texto2">

		<h4 align="center">Repositorio Institucional Para Instituciones Educativas Del Estado De México</h4>
		<br><br>
		<h4> Bienvenid@ <?php echo $fetch['correo']?></label></h4>
			 <br><br>
	</div>

</div>

<br><br><br>
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

