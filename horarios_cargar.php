<?php

$id_horarios=$_GET['id_horarios'];
include "config/bd_horarios.php";

$conexion=conexion();
$datos=datos($conexion,$id_horarios);

$tipo=$datos['tipo'];
$categoria=$datos['categoria'];
$nombre=$datos['nombre'];
$archivo=$datos['archivo'];
$valor_tipo="Content-type:$tipo";

header("Content-type:$tipo");
header("Content-Disposition:inline;filename=$nombre.$categoria");
echo $archivo;
?>