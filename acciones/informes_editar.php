<?php
require_once '../config/bd_informes.php';

# if(ISSET($_POST['update'])){

$id_informes=$_POST['id_informes'];
$nombre=$_POST['nombreArchivo'];
$archivo=$_FILES['archivo'];

$conexion=conexion();
$datos=datos($conexion,$id_informes);
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
        header("location:../informes.php?id=$id_informes");
    }

    #solo el nombre
    if(($archivo['size']==0 && $nombre!='') || ($archivo['size']==0 && $nombre!=$nombreA)){
        $query=editarNombre($conexion,$id_informes,$nombre);
        header("location:../informes.php?id=$id_informes&&editar=success");
    }

    #modificar solo archivo
    if(($archivo['size']>0 && $nombre=='') || ($archivo['size']>0 && $nombre==$nombreA)){
        $query=editarArchivo($conexion,$id_informes,$categoria,$tipo,$fecha,$archivoBLOB);
        header("location:../informes.php?id=$id_informes&&editar=success");

    }
    #modificar todo
    if(($archivo['size']>0 && $nombre!='') || ($archivo['size']>0 && $nombre!=$nombreA)){
        $query=editar($conexion,$id_informes,$nombre,$categoria,$tipo,$fecha,$archivoBLOB);
        header("location:../informes.php?id=$id_informes&&editar=success");
    }

    #}
?>

