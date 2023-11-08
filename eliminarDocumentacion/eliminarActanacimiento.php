<?php
$curp = $_GET['curp'];
$actanacimiento = 'documentoactanacimiento';
$ar = '../documentos/'.$actanacimiento.$curp;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);     
    }
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>