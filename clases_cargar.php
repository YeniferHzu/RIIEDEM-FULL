<?php

$id_clases=$_GET['id_clases'];
include "config/bd_clases.php";

$conexion=conexion();
$datos=datos($conexion,$id_clases);

$tipo=$datos['tipo'];
$categoria=$datos['categoria'];
$nombre=$datos['nombre'];
$archivo=$datos['archivo'];
$valor_tipo="Content-type:$tipo";

header("Content-type:$tipo");
header("Content-Disposition:inline;filename=$nombre.$categoria");
echo $archivo;
?>