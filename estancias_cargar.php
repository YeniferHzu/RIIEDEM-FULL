<?php

$id_estancias=$_GET['id_estancias'];
include "config/bd_estancias.php";

$conexion=conexion();
$datos=datos($conexion,$id_estancias);

$tipo=$datos['tipo'];
$categoria=$datos['categoria'];
$nombre=$datos['nombre'];
$archivo=$datos['archivo'];
$valor_tipo="Content-type:$tipo";

header("Content-type:$tipo");
header("Content-Disposition:inline;filename=$nombre.$categoria");
echo $archivo;
?>