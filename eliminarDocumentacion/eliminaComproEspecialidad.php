<?php
$curp = $_GET['curp'];
$compdomicilio = 'comprobante alta epecialidad';
$ar = '../documentos/'.$compdomicilio.$curp;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);    
    }
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>