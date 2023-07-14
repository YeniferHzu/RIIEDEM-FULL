<?php
require_once '../config/bd_publicaciones.php';

# if(ISSET($_POST['update'])){

$id_publicaciones=$_POST['id_publicaciones'];
$nombre=$_POST['nombreArchivo'];
$archivo=$_FILES['archivo'];

$conexion=conexion();
$datos=datos($conexion,$id_publicaciones);
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
        header("location:../publicaciones.php?id=$id_publicaciones");
    }

    #solo el nombre
    if(($archivo['size']==0 && $nombre!='') || ($archivo['size']==0 && $nombre!=$nombreA)){
        $query=editarNombre($conexion,$id_publicaciones,$nombre);
        header("location:../publicaciones.php?id=$id_publicaciones&&editar=success");
    }

    #modificar solo archivo
    if(($archivo['size']>0 && $nombre=='') || ($archivo['size']>0 && $nombre==$nombreA)){
        $query=editarArchivo($conexion,$id_publicaciones,$categoria,$tipo,$fecha,$archivoBLOB);
        header("location:../publicaciones.php?id=$id_publicaciones&&editar=success");

    }
    #modificar todo
    if(($archivo['size']>0 && $nombre!='') || ($archivo['size']>0 && $nombre!=$nombreA)){
        $query=editar($conexion,$id_publicaciones,$nombre,$categoria,$tipo,$fecha,$archivoBLOB);
        header("location:../publicaciones.php?id=$id_publicaciones&&editar=success");
    }

    #}
?>

