<?php
	require 'validator.php';		
	require_once 'config/bd_congresos.php'		
?>


<!DOCTYPE html>
<html lang="ES">
<head>
	<title>Congresos</title>
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

	<a href="perfil.php"><img src="img/usuario.png" width="45" height="45"></a> <!--Perfil de usuario-->

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


<!--	<div class="div_con_texto"> Inicio del contenido del cuerpo

		<div class="div_con_texto2">-->

	<?php 
		$query = mysqli_query($conn, "SELECT * FROM `usuarios` WHERE `id_usuarios` = '$_SESSION[usuarios]'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
	?>
			
<div class="container">
	<form class="m-auto w-50 mt-2 mb-2 " method="POST" enctype="multipart/form-data" action="acciones/congresos_insertar.php">
		<div class="mb-2">

		<h1>Congresos</h1>
		<h5 align="center">Sube la información sobre tus congresos</h5>
			<label for="form-label">Nombre del archivo</label>
			<input class='form-control form-control-sm' type="text" name="nombreArchivo">
		</div>

		<div class="mb-2">
			<label for="form-label">Selecciona un archivo</label>
			<input class='form-control form-control-sm' type="file" name="archivo">
		</div>
		<div align="center">
			<input type="hidden" name="id_usuarios" value="<?php echo $fetch['id_usuarios']?>"/>
			<button name="save" class="btn btn-success btn-sm"> Subir Archivo </button>
		</div>
	</form>
<br><br>


<div class="table-responsive">
	<table class="table table-sm table-striped align-middle">
		<thead class="table-success" align="center">
			<tr>
				<th>#</th>
				<th>Nombre del archivo</th>
				<th>Categoría</th>
				<th>Fecha</th>
				<th>Archivo</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody align="center">
		<h4>Correo del Docente: <label class="pull-right"><?php echo $fetch['correo']?></label></h4>

		<?php
			$contador=0;
			$id_usuarios = $fetch['id_usuarios'];
			$conexion=conexion();
			$query=listar($conexion);

			$query = mysqli_query($conn, "SELECT * FROM `congresos` WHERE `id_usuarios` = '$id_usuarios'") or die(mysqli_error());
			while($datos=mysqli_fetch_assoc($query)){
				$contador++;
					$id_congresos=$datos['id_congresos'];
					$nombre=$datos['nombre'];
					$categoria=$datos['categoria'];
					$fecha=$datos['fecha'];
					$tipo=$datos['tipo'];
					$archivo=$datos['archivo'];

					$valor="";
					if ($categoria=='jpg' || $categoria=='png') {
					$valor="<img width='50' src='data:image/jpg;base64,".base64_encode($archivo)."' >";
				}

				if ($categoria=='pdf') {
					$valor="<img width='50' src='img/pdf.png' >";
				}

				if ($valor=='') {
					$valor="<img width='50' src='img/desconocido.png' >";
				}
				?>
				<tr hidden class="del_file<?php echo $datos['id_congresos']?>">  </tr>
				<td><?php echo $contador ;?></td>
				<td><?php echo substr($datos['nombre'], 0 ,30)?></td>
				<td><?php echo $datos['categoria']?></td>
				<td><?php echo $datos['fecha']?></td>
				
				
				<td><a href="congresos_cargar.php?id_congresos=<?php echo $id_congresos; ?>" class="link-success">
				<?php echo $valor ;?><br>Ver</a></td>
				<td><a class='btn btn-primary' href="editar_congresos.php?id_congresos=<?php echo $id_congresos?>">Editar</a><a class='btn btn-danger' href="acciones/congresos_eliminar.php?id_congresos=<?php echo $id_congresos?>">Eliminar</a></td>
			

						<?php
							}
						?>
									
		</tbody>
	</table>
</div><!--Fin  del responsive de la tabla-->
</div><!--Fin del container-->

		 <!--</div>Div con texto 2-->
	<!--</div>Div con texto-->


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

