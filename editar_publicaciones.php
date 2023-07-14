<?php
	require 'validator.php';	
	require_once 'config/bd_publicaciones.php'	
?>

<!DOCTYPE html>
<html lang="ES">
<head>
	<title>Editar Publicaciones</title>
	<meta charset="utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/header_and_footer.css">
	<link rel="shortcut icon" type="text/css" href="icono.png"><!--Icono de las pestañas-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"><!--añadir estilos de boostrap-->
	<link rel="stylesheet" type="text/css" href="css/menu.css">

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


<!--	<div class="div_con_texto"> Inicio del contenido del cuerpo

		<div class="div_con_texto2">-->
			
<div class="container">
<input type="hidden" name="id_publicaciones" value="<?php $id_publicaciones = $_GET['id_publicaciones'];?>"/>
	<form class="m-auto w-50 mt-2 mb-2 " method="POST" enctype="multipart/form-data" action="acciones/publicaciones_editar.php">
		
	<?php 	
	$id_publicaciones = $_GET['id_publicaciones'];
	$query = mysqli_query($conn, "SELECT * FROM `publicaciones` WHERE `id_publicaciones` = '$id_publicaciones'") or die(mysqli_error());
	while($fetch = mysqli_fetch_array($query)) {
		?>

		<?php 
		$conexion=conexion();
		$fetch=datos($conexion,$id_publicaciones);
		$id_publicaciones=$fetch['id_publicaciones'];
		$nombre=$fetch['nombre'];
		$categoria=$fetch['categoria'];
		$titulo=$nombre.'.'.$categoria;
		$tipo=$fetch['tipo'];
		$archivo=$fetch['archivo'];

		?>

		<h1> <?php echo $titulo; ?></h1>
		<h5 align="center">Actualiza la información de tus archivos</h5>
		<br>
		<div class="mb-2">
			<label for="form-label">Nombre del archivo</label>
			<input class='form-control form-control-sm' type="text" name="nombreArchivo" value="<?php echo $nombre ;?>">
		</div>

		<div class="mb-2">
			<label for="form-label">Selecciona un archivo</label>
			<input class='form-control form-control-sm' type="file" name="archivo">
		</div>
		<div align="center">
			<button name= 'update' class="btn btn-success btn-sm">Actualizar</button>
			<input type="hidden" name="id_publicaciones" value="<?php echo $fetch['id_publicaciones']?>"/>
			<br>
			<a href="publicaciones.php" class="link-success">Atrás</a>
		</div>
	</form> 

	<div class="m-auto w-75 mt-2 text-center">
	<?php 
                    $valor="";
                    if($categoria=='pdf'){
                        $valor="<iframe class='w-100' height='500' src='data:".$tipo.";base64,".base64_encode($archivo)."' frameborder='0'></iframe>";
                    }
                    if($categoria=='png' || $categoria=='jpg'){
                        $valor="<img src='data:".$tipo.";base64,".base64_encode($archivo)."' >";
                    }
                    if($categoria=='mp4' || $categoria=='mp3'){
                        $valor="<video class='m-auto' controls='true' src='data:".$tipo.";base64,".base64_encode($archivo)."'></video>";
                    }
                    
                    echo $valor;
                
                ?>

			
	</div>
	<?php
			}
			
		?>	

</div><!--Fin del container-->

		

<br><br><br>
	<footer id="main-footer">
		<p>&copy; 2023</p>
	</footer>

	<!--añadir script de bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>