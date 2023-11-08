<?php
$curp = $_GET['curp'];
$actividadeconomica = 'documentoactvidadeconomica';
$ar = '../documentos/'.$actividadeconomica.$curp;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);     
    }
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>