<?php
$id = $_GET['id'];
$actividadeconomica = 'actividad economica.pdf';
$ar = '../documentos/'.$id.'/'.$actividadeconomica;

            unlink($ar);  
    
    //echo "<script>alert('Documento eliminado');
   // window.history.back();</script>";
?>