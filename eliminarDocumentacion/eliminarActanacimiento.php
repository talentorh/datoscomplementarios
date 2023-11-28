<?php
$id = $_GET['id'];
$actanacimiento = 'acta de nacimiento.pdf';
$ar = '../documentos/'.$id.'/'.$actanacimiento;
        
    unlink($ar);     

    echo "<script>alert('Documento eliminado');
    window.history.back();</script>";
?>