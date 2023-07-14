<?php
require_once '../config/bd_horarios.php';

# if(ISSET($_POST['update'])){

$id_horarios=$_POST['id_horarios'];
$nombre=$_POST['nombreArchivo'];
$archivo=$_FILES['archivo'];

$conexion=conexion();
$datos=datos($conexion,$id_horarios);
$nombreA=$datos['nombre'];

#categoria y tipo
$tipo=$archivo['type'];
$categoria=explode('.',$archivo['name'])[1];

#fecha
$fecha=date('Y-m-d H:i:s');

$tmp_name=$archivo['tmp_name'];
$contenido_archivo=file_get_contents($tmp_name);
$archivoBLOB=addslashes($contenido_archivo);

    #no modifica el archivo
    if(($archivo['size']==0 && $nombre=='') || ($archivo['size']==0 && $nombre==$nombreA) ){ 
        header("location:../horarios.php?id=$id_horarios");
    }

    #solo el nombre
    if(($archivo['size']==0 && $nombre!='') || ($archivo['size']==0 && $nombre!=$nombreA)){
        $query=editarNombre($conexion,$id_horarios,$nombre);
        header("location:../horarios.php?id=$id_horarios&&editar=success");
    }

    #modificar solo archivo
    if(($archivo['size']>0 && $nombre=='') || ($archivo['size']>0 && $nombre==$nombreA)){
        $query=editarArchivo($conexion,$id_horarios,$categoria,$tipo,$fecha,$archivoBLOB);
        header("location:../horarios.php?id=$id_horarios&&editar=success");

    }
    #modificar todo
    if(($archivo['size']>0 && $nombre!='') || ($archivo['size']>0 && $nombre!=$nombreA)){
        $query=editar($conexion,$id_horarios,$nombre,$categoria,$tipo,$fecha,$archivoBLOB);
        header("location:../horarios.php?id=$id_horarios&&editar=success");
    }

    #}
?>

