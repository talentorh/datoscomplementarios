<?php
$titulo = $_GET['titulo'];
$id = $_GET['id'];
$archivo = $_GET['archivo'];

$ar = '../documentos/'.$titulo.$id;
    foreach(glob($ar."/$archivo") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);     
    }
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>