<?php

$id_libros=$_GET['id_libros'];
include "config/bd_libros.php";

$conexion=conexion();
$datos=datos($conexion,$id_libros);

$tipo=$datos['tipo'];
$categoria=$datos['categoria'];
$nombre=$datos['nombre'];
$archivo=$datos['archivo'];
$valor_tipo="Content-type:$tipo";

header("Content-type:$tipo");
header("Content-Disposition:inline;filename=$nombre.$categoria");
echo $archivo;
?>