<?php
$curp = $_GET['curp'];
$claveinter = 'documentoclaveinterbancaria';
$ar = '../documentos/'.$claveinter.$curp;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);     
    }
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>