<?php
require_once '../config/bd_publicaciones.php';

if(ISSET($_POST['save'])){

$id_usuarios=$_POST['id_usuarios'];
$nombre=$_POST['nombreArchivo'];
$archivo=$_FILES['archivo'];
var_dump($archivo);

#categoria y tipo
$tipo=$archivo['type'];
$categoria=explode('.', $archivo['name'])[1];

#
$tmp_name=$archivo['tmp_name'];
$contenido_archivo=file_get_contents($tmp_name);
$archivoBLOB=addslashes($contenido_archivo);

$location = "../files/"."Publicaciones_".$id_usuarios."/".$nombre;

#fecha
$fecha=date('Y-m-d H:i:s');
	if(!file_exists("../files/"."Publicaciones_".$id_usuarios)){
		mkdir("../files/"."Publicaciones_".$id_usuarios);
	}
	
	if(move_uploaded_file($tmp_name, $location)){
		mysqli_query($conn, "INSERT INTO `publicaciones` VALUES('', '$nombre', '$categoria', '$fecha', '$tipo', '$archivoBLOB', '$id_usuarios')") or die(mysqli_error());
		header('location:../publicaciones.php?insertar=success');
	}
	else{
		header('location:../publicaciones.php?insertar=error');
		}
}



//include '../config/bd_clases.php';
//$conexion=conexion();
//$query=insertar($conexion,$nombre,$categoria,$fecha,$tipo,$archivoBLOB);
//if ($query) {
//	header('location:../clases.php?insertar=success');
//}else{
//	header('location:../clases.php?insertar=error');
//}

?>