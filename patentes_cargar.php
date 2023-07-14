<?php

$id_patentes=$_GET['id_patentes'];
include "config/bd_patentes.php";

$conexion=conexion();
$datos=datos($conexion,$id_patentes);

$tipo=$datos['tipo'];
$categoria=$datos['categoria'];
$nombre=$datos['nombre'];
$archivo=$datos['archivo'];
$valor_tipo="Content-type:$tipo";

header("Content-type:$tipo");
header("Content-Disposition:inline;filename=$nombre.$categoria");
echo $archivo;
?>