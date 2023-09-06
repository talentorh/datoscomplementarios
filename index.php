<?php session_start();
    if(isset($_SESSION['candidato'])) {
        header('location: misDatos'); 
        
    }else{
    header('location: login');
    }

?>