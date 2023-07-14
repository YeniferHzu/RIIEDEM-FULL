<?php
require_once '../config/bd_estancias.php';

# if(ISSET($_POST['update'])){

$id_estancias=$_POST['id_estancias'];
$nombre=$_POST['nombreArchivo'];
$archivo=$_FILES['archivo'];

$conexion=conexion();
$datos=datos($conexion,$id_estancias);
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
        header("location:../estancias.php?id=$id_estancias");
    }

    #solo el nombre
    if(($archivo['size']==0 && $nombre!='') || ($archivo['size']==0 && $nombre!=$nombreA)){
        $query=editarNombre($conexion,$id_estancias,$nombre);
        header("location:../estancias.php?id=$id_estancias&&editar=success");
    }

    #modificar solo archivo
    if(($archivo['size']>0 && $nombre=='') || ($archivo['size']>0 && $nombre==$nombreA)){
        $query=editarArchivo($conexion,$id_estancias,$categoria,$tipo,$fecha,$archivoBLOB);
        header("location:../estancias.php?id=$id_estancias&&editar=success");

    }
    #modificar todo
    if(($archivo['size']>0 && $nombre!='') || ($archivo['size']>0 && $nombre!=$nombreA)){
        $query=editar($conexion,$id_estancias,$nombre,$categoria,$tipo,$fecha,$archivoBLOB);
        header("location:../estancias.php?id=$id_estancias&&editar=success");
    }

    #}
?>

