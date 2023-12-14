<?php
$id = $_GET['id'];
$claveinter = 'clave interbancaria';
$ar = '../documentos/'.$claveinter;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);     
    }
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>