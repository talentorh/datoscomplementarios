<?php
$curp = $_GET['curp'];
$ine = 'documentoine';
$ar = '../documentos/'.$ine.$curp;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);     
    }
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>