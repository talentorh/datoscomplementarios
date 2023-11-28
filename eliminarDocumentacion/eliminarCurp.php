<?php
$id = $_GET['id'];
$curp = 'comprobante curp.pdf';
$ar = '../documentos/'.$id.'/'.$curp;
    
        
            unlink($ar);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 

    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>