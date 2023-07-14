<?php
require_once '../config/bd_modelos.php';

# if(ISSET($_POST['update'])){

$id_modelos=$_POST['id_modelos'];
$nombre=$_POST['nombreArchivo'];
$archivo=$_FILES['archivo'];

$conexion=conexion();
$datos=datos($conexion,$id_modelos);
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
        header("location:../modelos.php?id=$id_modelos");
    }

    #solo el nombre
    if(($archivo['size']==0 && $nombre!='') || ($archivo['size']==0 && $nombre!=$nombreA)){
        $query=editarNombre($conexion,$id_modelos,$nombre);
        header("location:../modelos.php?id=$id_modelos&&editar=success");
    }

    #modificar solo archivo
    if(($archivo['size']>0 && $nombre=='') || ($archivo['size']>0 && $nombre==$nombreA)){
        $query=editarArchivo($conexion,$id_modelos,$categoria,$tipo,$fecha,$archivoBLOB);
        header("location:../modelos.php?id=$id_modelos&&editar=success");

    }
    #modificar todo
    if(($archivo['size']>0 && $nombre!='') || ($archivo['size']>0 && $nombre!=$nombreA)){
        $query=editar($conexion,$id_modelos,$nombre,$categoria,$tipo,$fecha,$archivoBLOB);
        header("location:../modelos.php?id=$id_modelos&&editar=success");
    }

    #}
?>

