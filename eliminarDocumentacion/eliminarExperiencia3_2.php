<?php
$curp = $_GET['curp'];
$compdomicilio = 'documento exp laboral tercero 2';
$ar = '../documentos/'.$compdomicilio.$curp;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);     
    }
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>