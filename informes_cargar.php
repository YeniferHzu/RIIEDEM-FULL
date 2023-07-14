<?php

$id_informes=$_GET['id_informes'];
include "config/bd_informes.php";

$conexion=conexion();
$datos=datos($conexion,$id_informes);

$tipo=$datos['tipo'];
$categoria=$datos['categoria'];
$nombre=$datos['nombre'];
$archivo=$datos['archivo'];
$valor_tipo="Content-type:$tipo";

header("Content-type:$tipo");
header("Content-Disposition:inline;filename=$nombre.$categoria");
echo $archivo;
?>