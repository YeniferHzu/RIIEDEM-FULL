<?php
	require 'validator.php';
	require_once 'config/bd_perfil.php'						
?>


<!DOCTYPE html>
<html lang="ES">
<head>
	<title>Mi perfil</title>
	<meta charset="utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/header_and_footer.css">
	<link rel="shortcut icon" type="text/css" href="icono.png"><!--Icono de las pestañas-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"><!--añadir estilos de boostrap-->
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


<?php
			$query = mysqli_query($conn, "SELECT * FROM `usuarios` WHERE `id_usuarios` = '$_SESSION[usuarios]'") or die(mysqli_error());
			$fetch = mysqli_fetch_array($query);
		?>


<input type="hidden" name="id_usuarios" value="<?php echo $fetch['id_usuarios']?>?>"/>
<input type="hidden" name="correo" value="<?php echo $fetch['correo']?>"/>

<div class="container">
	
	<form class="m-auto w-50 mt-2 mb-2 " method="POST" enctype="multipart/form-data" action="acciones/perfil_insertar.php">
		<div class="mb-2">

		<h1>Mi perfil</h1>
		<h5 align="center">Aquí encontrarás tu información.</h5>
		<p align="center">Si existe un error con tu información, por favor envía un correo electrónico a:</p>
<br>
		</div>
	</form>
<br><br>
<h4> Bienvenid@ <?php echo $fetch['correo']?></label></h4>
<div class="table-responsive">
	<table class="table table-sm table-striped align-middle">
		<thead class="table-success" align="center">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Apellido paterno</th>
				<th>Apellido materno</th>
				<th>Correo</th>
				<th>Foto</th>
			</tr>
		</thead>
		<tbody align="center">

			<?php 
			$contador=0;
			$id_usuarios = $fetch['id_usuarios'];
				$conexion=conexion();
				$query=listar($conexion);

				$query = mysqli_query($conn, "SELECT * FROM `usuarios` WHERE `id_usuarios` = '$id_usuarios'") or die(mysqli_error());
					while ($datos=mysqli_fetch_assoc($query)) {
					$contador++;
					$id_usuarios = $datos['id_usuarios'];
					$nombre=$datos['nombre'];
					$apellido1=$datos['apellido1'];
					$apellido2=$datos['apellido2'];
					$correo=$datos['correo'];
					$foto=$datos['foto'];				
			?>
			<tr>
				<td><?php echo $contador ;?></td>
				<td><?php echo $datos['nombre'] ;?></td>
				<td><?php echo $datos ['apellido1'] ;?></td>
				<td><?php echo $datos ['apellido2'] ;?></td>
				<td><?php echo $datos ['correo'] ;?></td>
				<td><img style="max-height : 110px;" src="data:image/png;base64,<?=base64_encode($datos['foto'])?>"></td>
			<?php
			}
			?>
		</tbody>
	</table>
</div><!--Fin  del responsive de la tabla-->

</div><!--Fin del container-->


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

	<!--añadir script de bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>