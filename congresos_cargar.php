<?php

$id_congresos=$_GET['id_congresos'];
include "config/bd_congresos.php";

$conexion=conexion();
$datos=datos($conexion,$id_congresos);

$tipo=$datos['tipo'];
$categoria=$datos['categoria'];
$nombre=$datos['nombre'];
$archivo=$datos['archivo'];
$valor_tipo="Content-type:$tipo";

header("Content-type:$tipo");
header("Content-Disposition:inline;filename=$nombre.$categoria");
echo $archivo;
?>