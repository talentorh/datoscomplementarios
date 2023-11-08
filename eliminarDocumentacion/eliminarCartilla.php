<?php
$curp = $_GET['curp'];
$cartilla = 'documentocartilla';
$ar = '../documentos/'.$cartilla.$curp;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);     
    }
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>