<?php

$id_modelos=$_GET['id_modelos'];
include "config/bd_modelos.php";

$conexion=conexion();
$datos=datos($conexion,$id_modelos);

$tipo=$datos['tipo'];
$categoria=$datos['categoria'];
$nombre=$datos['nombre'];
$archivo=$datos['archivo'];
$valor_tipo="Content-type:$tipo";

header("Content-type:$tipo");
header("Content-Disposition:inline;filename=$nombre.$categoria");
echo $archivo;
?>