<?php
$curp = $_GET['curp'];
$firmaelectronica = 'documentofirmaelectonica';
$ar = '../documentos/'.$firmaelectronica.$curp;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);     
    }
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>