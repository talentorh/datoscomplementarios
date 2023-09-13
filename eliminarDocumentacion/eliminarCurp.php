<?php
$curp = $_GET['curp'];
$compdomicilio = 'documentocurp';
$ar = '../documentos/'.$compdomicilio.$curp;
    foreach(glob($ar."/*.*") as $archivos_carpeta) 
        { 
            unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    }
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>