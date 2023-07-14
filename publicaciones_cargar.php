<?php

$id_publicaciones=$_GET['id_publicaciones'];
include "config/bd_publicaciones.php";

$conexion=conexion();
$datos=datos($conexion,$id_publicaciones);

$tipo=$datos['tipo'];
$categoria=$datos['categoria'];
$nombre=$datos['nombre'];
$archivo=$datos['archivo'];
$valor_tipo="Content-type:$tipo";

header("Content-type:$tipo");
header("Content-Disposition:inline;filename=$nombre.$categoria");
echo $archivo;
?>