<?php
$id = $_GET['id'];
$compdomicilio = 'comprobante de domicilio.pdf';
$ar = '../documentos/'.$id.'/'.$compdomicilio;
    
        
            unlink($ar);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
    
    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>