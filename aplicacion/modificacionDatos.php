<?php

    date_default_timezone_set('America/Mexico_City');    
    $DateAndTime = date('Y-m-d', time());
    extract($_POST);
    $validarid = $conexionSeleccion->prepare("SELECT id_datopersonal from datospersonales where curp = :curp");
    $validarid->execute(array(
        ':curp'=>$curp
    ));
    $row = $validarid->fetch();

    $validaid = $row['id_datopersonal'];

    try{
        $conexionSeleccion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexionSeleccion->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
        $conexionSeleccion->beginTransaction();
    $sql = $conexionSeleccion->prepare("UPDATE datospersonales SET profesion = :profesion, curp =:curp, nombre=:nombre, appaterno=:appaterno, apmaterno=:apmaterno, estado=:estado, delegacion=:delegacion, localidad=:localidad, colonia=:colonia, calle=:calle, numexterior=:numexterior, numinterior=:numinterior, codigopostal=:codigopostal,
    fechanacimiento=:fechanacimiento, entidadnacimiento=:entidadnacimiento, rfc=:rfc, sexo=:sexo, cartanaturalizacion=:cartanaturalizacion, telefonocasa=:telefonocasa, telefonocelular=:telefonocelular, otrotelefono=:otrotelefono, correoelectronico=:correoelectronico, fechaactualizo=:fechaactualizo where id_datopersonal = :id_datopersonal");
        $sql->execute(array(
                ':profesion'=>$profesion,
                ':curp'=>$curp,
                ':nombre'=>$nombre,
                ':appaterno'=>$appaterno, 
                ':apmaterno'=>$apmaterno,
                ':estado'=>$estado,
                ':delegacion'=>$municipio,
                ':localidad'=>$localidad,
                ':colonia'=>$colonia,
                ':calle'=>$calle,
                ':numexterior'=>$numexterior,
                ':numinterior'=>$numinterior,
                ':codigopostal'=>$codigopostal,
                ':fechanacimiento'=>$fechanacimiento,
                ':entidadnacimiento'=>$entidadnacimiento,
                ':rfc'=>$rfc,
                ':sexo'=>$sexo,
                ':cartanaturalizacion'=>$naturalizacion,
                ':telefonocasa'=>$telefonocasa,
                ':telefonocelular'=>$telefonocelular,
                ':otrotelefono'=>$otrotelefono,
                ':correoelectronico'=>$correo,
                ':fechaactualizo'=>$DateAndTime,
                ':id_datopersonal'=>$validaid
        ));
        if ($_FILES["comprobantedomicilio"]["error"] > 0) {
        } else {
        
            $permitidos = array("application/pdf");
                $compdomicilio = 'comprobantedomicilio';
            if (in_array($_FILES["comprobantedomicilio"]["type"], $permitidos) && $_FILES["comprobantedomicilio"]["size"]) {
        
                $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                $archivo = $ruta . $_FILES["comprobantedomicilio"]["name"] = "comprobante de domicilio.pdf";
        
        
                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }
        
                if (file_exists($archivo)) {
        
                    $resultado = @move_uploaded_file($_FILES["comprobantedomicilio"]["tmp_name"], $archivo);
        
                    
                }else{
                    $resultado = @move_uploaded_file($_FILES["comprobantedomicilio"]["tmp_name"], $archivo);
                }
            }
        }
        $sql = $conexionSeleccion->prepare("UPDATE estudiosmediosup SET nombreformacionmedia=:nombreformacionmedia, nombremediasuperior=:nombremediasuperior, fechainicio=:fechainicio, fechatermino=:fechatermino, tiempocursado=:tiempocursado, documentomediosuperior=:documentomediosuperior, 
            nombreformacionsuperior=:nombreformacionsuperior,nombresuperior=:nombresuperior,fechasuperiorinicio=:fechasuperiorinicio,fechasuperiortermino=:fechasuperiortermino,tiempocursadosuperior=:tiempocursadosuperior,documentosuperior=:documentosuperior,numerocedulasuperior=:numerocedulasuperior,
            nombreformacionmaestria=:nombreformacionmaestria,nombremaestria=:nombremaestria,fechainiciomaestria=:fechainiciomaestria,fechaterminomaestria=:fechaterminomaestria,tiempocursadomaestria=:tiempocursadomaestria,documentomaestria=:documentomaestria,cedulamaestria=:cedulamaestria,
            nombreformacionmaestriados=:nombreformacionmaestriados,nombremaestriados=:nombremaestriados,fechainiciomaestriados=:fechainiciomaestriados,fechaterminomaestriados=:fechaterminomaestriados,tiempocursadomaestriados=:tiempocursadomaestriados,documentomaestriados=:documentomaestriados,cedulamaestriados=:cedulamaestriados where id_postulado = :id_postulado");
            $sql->execute(array(
                ':nombreformacionmedia'=>$nombreformacionmedia,
                ':nombremediasuperior'=>$nombremediasuperior,
                ':fechainicio'=>$fechainicio,
                ':fechatermino'=>$fechatermino,
                ':tiempocursado'=>$tiempocursado,
                ':documentomediosuperior'=>$documentomediosuperior,
                ':nombreformacionsuperior'=>$nombreformacionsuperior,
                ':nombresuperior'=>$nombresuperior,
                ':fechasuperiorinicio'=>$fechasuperiorinicio,
                ':fechasuperiortermino'=>$fechasuperiortermino,
                ':tiempocursadosuperior'=>$tiempocursadosuperior,
                ':documentosuperior'=>$documentosuperior,
                ':numerocedulasuperior'=>$numerocedulasuperior,
                ':nombreformacionmaestria'=>$nombreformacionmaestria,
                ':nombremaestria'=>$nombremaestria,
                ':fechainiciomaestria'=>$fechainiciomaestria,
                ':fechaterminomaestria'=>$fechaterminomaestria,
                ':tiempocursadomaestria'=>$tiempocursadomaestria,
                ':documentomaestria'=>$documentomaestria,
                ':cedulamaestria'=>$cedulamaestria,
                ':nombreformacionmaestriados'=>$nombreformacionmaestriados,
                ':nombremaestriados'=>$nombremaestriados,
                ':fechainiciomaestriados'=>$fechainiciomaestriados,
                ':fechaterminomaestriados'=>$fechaterminomaestriados,
                ':tiempocursadomaestriados'=>$tiempocursadomaestriados,
                ':documentomaestriados'=>$documentomaestriados,
                ':cedulamaestriados'=>$cedulamaestriados,
                ':id_postulado'=>$validaid
            ));
            if ($_FILES["archivomediasuperior"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'comprobante media superior';
                if (in_array($_FILES["archivomediasuperior"]["type"], $permitidos) && $_FILES["archivomediasuperior"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivomediasuperior"]["name"] = "comprobante medio superior.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivomediasuperior"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivomediasuperior"]["tmp_name"], $archivo);
                    }
                }
            } 
            if ($_FILES["archivosuperior"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'comprobante superior';
                if (in_array($_FILES["archivosuperior"]["type"], $permitidos) && $_FILES["archivosuperior"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivosuperior"]["name"] = "comprobante superior.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivosuperior"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivosuperior"]["tmp_name"], $archivo);
                    }
                }
            }
            if ($_FILES["archivocedulasuperior"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'cedula superior';
                if (in_array($_FILES["archivocedulasuperior"]["type"], $permitidos) && $_FILES["archivocedulasuperior"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivocedulasuperior"]["name"] = "cedula superior.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivocedulasuperior"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivocedulasuperior"]["tmp_name"], $archivo);
                    }
                }
            } 
            if ($_FILES["archivomaestria"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'comprobante maestria';
                if (in_array($_FILES["archivomaestria"]["type"], $permitidos) && $_FILES["archivomaestria"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivomaestria"]["name"] = "comprobante maestria.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivomaestria"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivomaestria"]["tmp_name"], $archivo);
                    }
                }
            }
            if ($_FILES["archivomaestriacedula"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'cedula maestria';
                if (in_array($_FILES["archivomaestriacedula"]["type"], $permitidos) && $_FILES["archivomaestriacedula"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivomaestriacedula"]["name"] = "cedula maestria.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivomaestriacedula"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivomaestriacedula"]["tmp_name"], $archivo);
                    }
                }
            } 
            if ($_FILES["archivomaestriados"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'comprobante maestria dos';
                if (in_array($_FILES["archivomaestriados"]["type"], $permitidos) && $_FILES["archivomaestriados"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivomaestriados"]["name"] = "comprobante maestria dos.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivomaestriados"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivomaestriados"]["tmp_name"], $archivo);
                    }
                }
            }
            if ($_FILES["archivomaestriadoscedula"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'cedula maestria dos';
                if (in_array($_FILES["archivomaestriadoscedula"]["type"], $permitidos) && $_FILES["archivomaestriadoscedula"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivomaestriadoscedula"]["name"] = "cedula maestria dos.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivomaestriadoscedula"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivomaestriadoscedula"]["tmp_name"], $archivo);
                    }
                }
            } 
            $sql = $conexionSeleccion->prepare("UPDATE posgespecilidad SET nombreformacionposgrado=:nombreformacionposgrado, nombreposgrado=:nombreposgrado, unidadhospitalaria=:unidadhospitalaria, fechaposgradoinicio=:fechaposgradoinicio, fechaposgradotermino=:fechaposgradotermino, tiempocursadoposgrado=:tiempocursadoposgrado, documentorecibeposgrado=:documentorecibeposgrado, numerocedulaposgrado=:numerocedulaposgrado, 
        nombreformaciondoctorado=:nombreformaciondoctorado,nombredoctorado=:nombredoctorado,unidadhospitalariadoctorado=:unidadhospitalariadoctorado,fechainiciodoctorado=:fechainiciodoctorado,fechaterminodoctorado=:fechaterminodoctorado,tiempocursadodoctorado=:tiempocursadodoctorado,documentorecibedoctorado=:documentorecibedoctorado,numeroceduladoctorado=:numeroceduladoctorado where id_postulado = :id_postulado");
        $sql->execute(array(
            ':nombreformacionposgrado'=>$nombreformacionposgrado,
            ':nombreposgrado'=>$nombreposgrado,
            ':unidadhospitalaria'=>$unidadhospitalaria,
            ':fechaposgradoinicio'=>$fechaposgradoinicio,
            ':fechaposgradotermino'=>$fechaposgradotermino,
            ':tiempocursadoposgrado'=>$tiempocursadoposgrado,
            ':documentorecibeposgrado'=>$documentorecibeposgrado,
            ':numerocedulaposgrado'=>$numerocedulaposgrado,  
            ':nombreformaciondoctorado'=>$nombreformaciondoctorado,
            ':nombredoctorado'=>$nombredoctorado,
            ':unidadhospitalariadoctorado'=>$unidadhospitalariadoctorado,
            ':fechainiciodoctorado'=>$fechainiciodoctorado,
            ':fechaterminodoctorado'=>$fechaterminodoctorado,
            ':tiempocursadodoctorado'=>$tiempocursadodoctorado,
            ':documentorecibedoctorado'=>$documentorecibedoctorado,
            ':numeroceduladoctorado'=>$numeroceduladoctorado,
            ':id_postulado'=>$validaid                              
        ));
        if ($_FILES["archivoposgrado"]["error"] > 0) {
        } else {
        
            $permitidos = array("application/pdf");
                $compdomicilio = 'comprobante posgrado';
            if (in_array($_FILES["archivoposgrado"]["type"], $permitidos) && $_FILES["archivoposgrado"]["size"]) {
        
                $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                $archivo = $ruta . $_FILES["archivoposgrado"]["name"] = "comprobante posgrado.pdf";
        
        
                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }
        
                if (file_exists($archivo)) {
        
                    $resultado = @move_uploaded_file($_FILES["archivoposgrado"]["tmp_name"], $archivo);
        
                    
                }else{
                    $resultado = @move_uploaded_file($_FILES["archivoposgrado"]["tmp_name"], $archivo);
                }
            }
        }
        if ($_FILES["archivoposgradocedula"]["error"] > 0) {
        } else {
        
            $permitidos = array("application/pdf");
                $compdomicilio = 'cedula posgrado';
            if (in_array($_FILES["archivoposgradocedula"]["type"], $permitidos) && $_FILES["archivoposgradocedula"]["size"]) {
        
                $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                $archivo = $ruta . $_FILES["archivoposgradocedula"]["name"] = "cedula posgrado.pdf";
        
        
                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }
        
                if (file_exists($archivo)) {
        
                    $resultado = @move_uploaded_file($_FILES["archivoposgradocedula"]["tmp_name"], $archivo);
        
                    
                }else{
                    $resultado = @move_uploaded_file($_FILES["archivoposgradocedula"]["tmp_name"], $archivo);
                }
            }
        } 
        if ($_FILES["archivodoctorado"]["error"] > 0) {
        } else {
        
            $permitidos = array("application/pdf");
                $compdomicilio = 'comprobante doctorado';
            if (in_array($_FILES["archivodoctorado"]["type"], $permitidos) && $_FILES["archivodoctorado"]["size"]) {
        
                $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                $archivo = $ruta . $_FILES["archivodoctorado"]["name"] = "comprobante doctorado.pdf";
        
        
                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }
        
                if (file_exists($archivo)) {
        
                    $resultado = @move_uploaded_file($_FILES["archivodoctorado"]["tmp_name"], $archivo);
        
                    
                }else{
                    $resultado = @move_uploaded_file($_FILES["archivodoctorado"]["tmp_name"], $archivo);
                }
            }
        }
        if ($_FILES["archivodoctoradocedula"]["error"] > 0) {
        } else {
        
            $permitidos = array("application/pdf");
                $compdomicilio = 'cedula doctorado';
            if (in_array($_FILES["archivodoctoradocedula"]["type"], $permitidos) && $_FILES["archivodoctoradocedula"]["size"]) {
        
                $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                $archivo = $ruta . $_FILES["archivodoctoradocedula"]["name"] = "cedula posgrado.pdf";
        
        
                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }
        
                if (file_exists($archivo)) {
        
                    $resultado = @move_uploaded_file($_FILES["archivodoctoradocedula"]["tmp_name"], $archivo);
        
                    
                }else{
                    $resultado = @move_uploaded_file($_FILES["archivodoctoradocedula"]["tmp_name"], $archivo);
                }
            }
        }

        $sql = $conexionSeleccion->prepare("UPDATE otrosestudiosaltaesp SET nombreformacionaltaesp=:nombreformacionaltaesp, nombrealtaespecialidad=:nombrealtaespecialidad, unidadhospaltaesp=:unidadhospaltaesp, fechainicioaltaesp=:fechainicioaltaesp, fechaterminoaltaesp=:fechaterminoaltaesp, tiempocursadoaltaesp=:tiempocursadoaltaesp, documentorecibealtaesp=:documentorecibealtaesp, 
        nombreformacionotros=:nombreformacionotros, nombreotrosestudiosuno=:nombreotrosestudiosuno, fechainiciootrosestudiosuno=:fechainiciootrosestudiosuno,fechaterminootrosestudiosuno=:fechaterminootrosestudiosuno,documentorecibeestudiosuno=:documentorecibeestudiosuno, 
        nombreformacionotrosdos=:nombreformacionotrosdos, nombreotrosestudiosdos=:nombreotrosestudiosdos, fechainiciootrosestudiosdos=:fechainiciootrosestudiosdos, fechaterminootrosestudiosdos=:fechaterminootrosestudiosdos,documentorecibeestudiosdos=:documentorecibeestudiosdos where id_postulado = :id_postulado");
            $sql->execute(array(
                ':nombreformacionaltaesp'=>$nombreformacionaltaesp,
                ':nombrealtaespecialidad'=>$nombrealtaespecialidad,
                ':unidadhospaltaesp'=>$unidadhospaltaesp,
                ':fechainicioaltaesp'=>$fechainicioaltaesp,
                ':fechaterminoaltaesp'=>$fechaterminoaltaesp, 
                ':tiempocursadoaltaesp'=>$tiempocursadoaltaesp, 
                ':documentorecibealtaesp'=>$documentorecibealtaesp,
                ':nombreformacionotros'=>$nombreformacionotros,
                ':nombreotrosestudiosuno'=>$nombreotrosestudiosuno,
                ':fechainiciootrosestudiosuno'=>$fechainiciootrosestudiosuno,
                ':fechaterminootrosestudiosuno'=>$fechaterminootrosestudiosuno,
                ':documentorecibeestudiosuno'=>$documentorecibeestudiosuno,
                ':nombreformacionotrosdos'=>$nombreformacionotrosdos,
                ':nombreotrosestudiosdos'=>$nombreotrosestudiosdos,
                ':fechainiciootrosestudiosdos'=>$fechainiciootrosestudiosdos,
                ':fechaterminootrosestudiosdos'=>$fechaterminootrosestudiosdos,
                ':documentorecibeestudiosdos'=>$documentorecibeestudiosdos,
                ':id_postulado'=>$validaid
            ));

        if ($_FILES["archivoaltaesp"]["error"] > 0) {
        } else {
        
            $permitidos = array("application/pdf");
                $compdomicilio = 'comprobante alta epecialidad';
            if (in_array($_FILES["archivoaltaesp"]["type"], $permitidos) && $_FILES["archivoaltaesp"]["size"]) {
        
                $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                $archivo = $ruta . $_FILES["archivoaltaesp"]["name"] = "comprobante alta especialidad.pdf";
        
        
                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }
        
                if (file_exists($archivo)) {
        
                    $resultado = @move_uploaded_file($_FILES["archivoaltaesp"]["tmp_name"], $archivo);
        
                    
                }else{
                    $resultado = @move_uploaded_file($_FILES["archivoaltaesp"]["tmp_name"], $archivo);
                }
            }
        }
        if ($_FILES["archivootrosuno"]["error"] > 0) {
        } else {
        
            $permitidos = array("application/pdf");
                $compdomicilio = 'comprobante otro estudio';
            if (in_array($_FILES["archivootrosuno"]["type"], $permitidos) && $_FILES["archivootrosuno"]["size"]) {
        
                $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                $archivo = $ruta . $_FILES["archivootrosuno"]["name"] = "comprobante otro estudio.pdf";
        
        
                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }
        
                if (file_exists($archivo)) {
        
                    $resultado = @move_uploaded_file($_FILES["archivootrosuno"]["tmp_name"], $archivo);
        
                    
                }else{
                    $resultado = @move_uploaded_file($_FILES["archivootrosuno"]["tmp_name"], $archivo);
                }
            }
        }
        if ($_FILES["archivootrosdos"]["error"] > 0) {
        } else {
        
            $permitidos = array("application/pdf");
                $compdomicilio = 'comprobante otro estudio segundo';
            if (in_array($_FILES["archivootrosdos"]["type"], $permitidos) && $_FILES["archivootrosdos"]["size"]) {
        
                $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                $archivo = $ruta . $_FILES["archivootrosdos"]["name"] = "comprobante otro estudio segundo.pdf";
        
        
                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }
        
                if (file_exists($archivo)) {
        
                    $resultado = @move_uploaded_file($_FILES["archivootrosdos"]["tmp_name"], $archivo);
        
                    
                }else{
                    $resultado = @move_uploaded_file($_FILES["archivootrosdos"]["tmp_name"], $archivo);
                }
            }
        }
        $sql= $conexionSeleccion->prepare("UPDATE socialpracticas SET nombreserviciosocial=:nombreserviciosocial, fechainicioservicio=:fechainicioservicio, fechaterminoservicio=:fechaterminoservicio, laboresservicio=:laboresservicio, documentorecibeservicio=:documentorecibeservicio,
        nombrepracticas=:nombrepracticas, fechainiciopracticas=:fechainiciopracticas, fechaterminopracticas=:fechaterminopracticas, laborespracticas=:laborespracticas, documentorecibepracticas=:documentorecibepracticas where id_postulado = :id_postulado"); 
            $sql->execute(array(
                ':nombreserviciosocial'=>$nombreserviciosocial,
                ':fechainicioservicio'=>$fechainicioservicio,
                ':fechaterminoservicio'=>$fechaterminoservicio,
                ':laboresservicio'=>$laboresservicio,
                ':documentorecibeservicio'=>$documentorecibeservicio,
                ':nombrepracticas'=>$nombrepracticas,
                ':fechainiciopracticas'=>$fechainiciopracticas,
                ':fechaterminopracticas'=>$fechaterminopracticas,
                ':laborespracticas'=>$laborespracticas,
                ':documentorecibepracticas'=>$documentorecibepracticas,
                ':id_postulado'=>$validaid
            ));
            if ($_FILES["archivoservsocial"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'documento servicio social';
                if (in_array($_FILES["archivoservsocial"]["type"], $permitidos) && $_FILES["archivoservsocial"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivoservsocial"]["name"] = "comprobante servicio social.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivoservsocial"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivoservsocial"]["tmp_name"], $archivo);
                    }
                }
            }
            if ($_FILES["archivopracticas"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'documento practicas profesionales';
                if (in_array($_FILES["archivopracticas"]["type"], $permitidos) && $_FILES["archivopracticas"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivopracticas"]["name"] = "comprobante practicas profesionales.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivopracticas"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivopracticas"]["tmp_name"], $archivo);
                    }
                }
            }
            $sql = $conexionSeleccion->prepare("UPDATE cerficacion SET nombreformacioncertificauno=:nombreformacioncertificauno, nombrecertificacionuno=:nombrecertificacionuno, fechainiciocertificacionuno=:fechainiciocertificacionuno, fechaterminocertificacionuno=:fechaterminocertificacionuno, documentocertificacionuno=:documentocertificacionuno,
        nombreformacioncertificaciondos=:nombreformacioncertificaciondos, nombrecertificaciondos=:nombrecertificaciondos, fechainiciocertificaciondos=:fechainiciocertificaciondos, fechaterminocertificaciondos=:fechaterminocertificaciondos, documentocertificaciondos=:documentocertificaciondos where id_postulado =:id_postulado");
            $sql->execute(array(
                ':nombreformacioncertificauno'=>$nombreformacioncertificauno,
                ':nombrecertificacionuno'=>$nombrecertificacionuno,
                ':fechainiciocertificacionuno'=>$fechainiciocertificacionuno,
                ':fechaterminocertificacionuno'=>$fechaterminocertificacionuno,
                ':documentocertificacionuno'=>$documentocertificacionuno,
                ':nombreformacioncertificaciondos'=>$nombreformacioncertificaciondos, 
                ':nombrecertificaciondos'=>$nombrecertificaciondos,
                ':fechainiciocertificaciondos'=>$fechainiciocertificaciondos, 
                ':fechaterminocertificaciondos'=>$fechaterminocertificaciondos, 
                ':documentocertificaciondos'=>$documentocertificaciondos,
                ':id_postulado'=>$validaid
            ));
            if ($_FILES["archivocertificacion"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'documento certificacion uno';
                if (in_array($_FILES["archivocertificacion"]["type"], $permitidos) && $_FILES["archivocertificacion"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivocertificacion"]["name"] = "comprobante certificacion uno.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivocertificacion"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivocertificacion"]["tmp_name"], $archivo);
                    }
                }
            }
            if ($_FILES["archivocertificaciondos"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'documento certificacion dos';
                if (in_array($_FILES["archivocertificaciondos"]["type"], $permitidos) && $_FILES["archivocertificaciondos"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivocertificaciondos"]["name"] = "comprobante certificacion dos.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivocertificaciondos"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivocertificaciondos"]["tmp_name"], $archivo);
                    }
                }
            }
            $sql = $conexionSeleccion->prepare("UPDATE actualizacionacademica SET nombrecursouno=:nombrecursouno, institucioncursouno=:institucioncursouno, fechainiciocursouno=:fechainiciocursouno, fechaterminocursouno=:fechaterminocursouno, documentorecibecursouno=:documentorecibecursouno, nacionalprimero=:nacionalprimero,
        nombrecursodos=:nombrecursodos,institucioncursodos=:institucioncursodos,fechainiciocursodos=:fechainiciocursodos,fechaterminocursodos=:fechaterminocursodos,documentorecibecursodos=:documentorecibecursodos,nacionalsegundo=:nacionalsegundo,
        nombrecursotres=:nombrecursotres,institucioncursotres=:institucioncursotres,fechainiciocursotres=:fechainiciocursotres,fechaterminocursotres=:fechaterminocursotres,documentorecibecursotres=:documentorecibecursotres,nacionaltercero=:nacionaltercero where id_postulado=:id_postulado");
                $sql->execute(array(
                    ':nombrecursouno'=>$nombrecursouno, 
                    ':institucioncursouno'=>$institucioncursouno, 
                    ':fechainiciocursouno'=>$fechainiciocursouno, 
                    ':fechaterminocursouno'=>$fechaterminocursouno, 
                    ':documentorecibecursouno'=>$documentorecibecursouno, 
                    ':nacionalprimero'=>$nacionalprimero,
                    ':nombrecursodos'=>$nombrecursodos,
                    ':institucioncursodos'=>$institucioncursodos,
                    ':fechainiciocursodos'=>$fechainiciocursodos,
                    ':fechaterminocursodos'=>$fechaterminocursodos,
                    ':documentorecibecursodos'=>$documentorecibecursodos,
                    ':nacionalsegundo'=>$nacionalsegundo,
                    ':nombrecursotres'=>$nombrecursotres,
                    ':institucioncursotres'=>$institucioncursotres,
                    ':fechainiciocursotres'=>$fechainiciocursotres,
                    ':fechaterminocursotres'=>$fechaterminocursotres,
                    ':documentorecibecursotres'=>$documentorecibecursotres,
                    ':nacionaltercero'=>$nacionaltercero,
                    ':id_postulado'=>$validaid
                ));
                if ($_FILES["archivoactualizacionacademicauno"]["error"] > 0) {
                } else {
                
                    $permitidos = array("application/pdf");
                        $compdomicilio = 'documento actualizacion academica uno';
                    if (in_array($_FILES["archivoactualizacionacademicauno"]["type"], $permitidos) && $_FILES["archivoactualizacionacademicauno"]["size"]) {
                
                        $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                        $archivo = $ruta . $_FILES["archivoactualizacionacademicauno"]["name"] = "comprobante actualizacion academica uno.pdf";
                
                
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
                
                        if (file_exists($archivo)) {
                
                            $resultado = @move_uploaded_file($_FILES["archivoactualizacionacademicauno"]["tmp_name"], $archivo);
                
                            
                        }else{
                            $resultado = @move_uploaded_file($_FILES["archivoactualizacionacademicauno"]["tmp_name"], $archivo);
                        }
                    }
                }
                if ($_FILES["archivoactualizacionacademicados"]["error"] > 0) {
                } else {
                
                    $permitidos = array("application/pdf");
                        $compdomicilio = 'documento actualizacion academica dos';
                    if (in_array($_FILES["archivoactualizacionacademicados"]["type"], $permitidos) && $_FILES["archivoactualizacionacademicados"]["size"]) {
                
                        $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                        $archivo = $ruta . $_FILES["archivoactualizacionacademicados"]["name"] = "comprobante actualizacion academica dos.pdf";
                
                
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
                
                        if (file_exists($archivo)) {
                
                            $resultado = @move_uploaded_file($_FILES["archivoactualizacionacademicados"]["tmp_name"], $archivo);
                
                            
                        }else{
                            $resultado = @move_uploaded_file($_FILES["archivoactualizacionacademicados"]["tmp_name"], $archivo);
                        }
                    }
                }
                if ($_FILES["archivoactualizacionacademicatres"]["error"] > 0) {
                } else {
                
                    $permitidos = array("application/pdf");
                        $compdomicilio = 'documento actualizacion academica tres';
                    if (in_array($_FILES["archivoactualizacionacademicatres"]["type"], $permitidos) && $_FILES["archivoactualizacionacademicatres"]["size"]) {
                
                        $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                        $archivo = $ruta . $_FILES["archivoactualizacionacademicatres"]["name"] = "comprobante actualizacion academica tres.pdf";
                
                
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
                
                        if (file_exists($archivo)) {
                
                            $resultado = @move_uploaded_file($_FILES["archivoactualizacionacademicatres"]["tmp_name"], $archivo);
                
                            
                        }else{
                            $resultado = @move_uploaded_file($_FILES["archivoactualizacionacademicatres"]["tmp_name"], $archivo);
                        }
                    }
                }
                $sql = $conexionSeleccion->prepare("UPDATE explaboralprivado SET nombrelaboralprivada = :nombrelaboralprivada, tipopuestoprivada = :tipopuestoprivada, direccionempresaprivada = :direccionempresaprivada, telefonoempresaprivada = :telefonoempresaprivada, extencionempresaprivada = :extencionempresaprivada, nombrejefeprivada = :nombrejefeprivada, motivoseparacionprivada = :motivoseparacionprivada, funcionesprivada = :funcionesprivada, fechainicioprivada = :fechainicioprivada, fechaterminoprivada = :fechaterminoprivada, 
        nombrelaboralprivadados = :nombrelaboralprivadados,tipopuestoprivadados = :tipopuestoprivadados,direccionempresaprivadados = :direccionempresaprivadados,telefonoempresaprivadados = :telefonoempresaprivadados,extencionempresaprivadados = :extencionempresaprivadados,nombrejefeprivadados = :nombrejefeprivadados,motivoseparacionprivadados = :motivoseparacionprivadados,funcionesprivadados = :funcionesprivadados,fechainicioprivadados = :fechainicioprivadados,fechaterminoprivadados = :fechaterminoprivadados,
        nombrelaboralprivadatres = :nombrelaboralprivadatres,tipopuestoprivadatres = :tipopuestoprivadatres,direccionempresaprivadatres = :direccionempresaprivadatres,telefonoempresaprivadatres = :telefonoempresaprivadatres,extencionempresaprivadatres = :extencionempresaprivadatres,nombrejefeprivadatres = :nombrejefeprivadatres,motivoseparacionprivadatres = :motivoseparacionprivadatres,funcionesprivadatres = :funcionesprivadatres,fechainicioprivadatres = :fechainicioprivadatres,fechaterminoprivadatres = :fechaterminoprivadatres where id_postulado = :id_postulado");
            $sql->execute(array(
                ':nombrelaboralprivada'=>$nombrelaboralprivada, 
                ':tipopuestoprivada'=>$tipopuestoprivada, 
                ':direccionempresaprivada'=>$direccionempresaprivada, 
                ':telefonoempresaprivada'=>$telefonoempresaprivada, 
                ':extencionempresaprivada'=>$extencionempresaprivada, 
                ':nombrejefeprivada'=>$nombrejefeprivada, 
                ':motivoseparacionprivada'=>$motivoseparacionprivada, 
                ':funcionesprivada'=>$funcionesprivada, 
                ':fechainicioprivada'=>$fechainicioprivada, 
                ':fechaterminoprivada'=>$fechaterminoprivada, 
                ':nombrelaboralprivadados'=>$nombrelaboralprivadados,
                ':tipopuestoprivadados'=>$tipopuestoprivadados,
                ':direccionempresaprivadados'=>$direccionempresaprivadados,
                ':telefonoempresaprivadados'=>$telefonoempresaprivadados,
                ':extencionempresaprivadados'=>$extencionempresaprivadados,
                ':nombrejefeprivadados'=>$nombrejefeprivadados,
                ':motivoseparacionprivadados'=>$motivoseparacionprivadados,
                ':funcionesprivadados'=>$funcionesprivadados,
                ':fechainicioprivadados'=>$fechainicioprivadados,
                ':fechaterminoprivadados'=>$fechaterminoprivadados,
                ':nombrelaboralprivadatres'=>$nombrelaboralprivadatres,
                ':tipopuestoprivadatres'=>$tipopuestoprivadatres,
                ':direccionempresaprivadatres'=>$direccionempresaprivadatres,
                ':telefonoempresaprivadatres'=>$telefonoempresaprivadatres,
                ':extencionempresaprivadatres'=>$extencionempresaprivadatres,
                ':nombrejefeprivadatres'=>$nombrejefeprivadatres,
                ':motivoseparacionprivadatres'=>$motivoseparacionprivadatres,
                ':funcionesprivadatres'=>$funcionesprivadatres,
                ':fechainicioprivadatres'=>$fechainicioprivadatres,
                ':fechaterminoprivadatres'=>$fechaterminoprivadatres,
                ':id_postulado'=>$validaid
            ));
            if ($_FILES["archivoexplaboralprivadoone1"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'documento exp laboral primero 1';
                if (in_array($_FILES["archivoexplaboralprivadoone1"]["type"], $permitidos) && $_FILES["archivoexplaboralprivadoone1"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivoexplaboralprivadoone1"]["name"] = "comprobante exp laboral primero 1.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadoone1"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadoone1"]["tmp_name"], $archivo);
                    }
                }
            }

            if ($_FILES["archivoexplaboralprivadotwo1"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'documento exp laboral primero 2';
                if (in_array($_FILES["archivoexplaboralprivadotwo1"]["type"], $permitidos) && $_FILES["archivoexplaboralprivadotwo1"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivoexplaboralprivadotwo1"]["name"] = "comprobante exp laboral primero 2.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadotwo1"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadotwo1"]["tmp_name"], $archivo);
                    }
                }
            }

            if ($_FILES["archivoexplaboralprivadoone2"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'documento exp laboral segundo 1';
                if (in_array($_FILES["archivoexplaboralprivadoone2"]["type"], $permitidos) && $_FILES["archivoexplaboralprivadoone2"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivoexplaboralprivadoone2"]["name"] = "comprobante exp laboral segundo 1.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadoone2"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadoone2"]["tmp_name"], $archivo);
                    }
                }
            }
            if ($_FILES["archivoexplaboralprivadotwo2"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'documento exp laboral segundo 2';
                if (in_array($_FILES["archivoexplaboralprivadotwo2"]["type"], $permitidos) && $_FILES["archivoexplaboralprivadotwo2"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivoexplaboralprivadotwo2"]["name"] = "comprobante exp laboral segundo 2.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadotwo2"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadotwo2"]["tmp_name"], $archivo);
                    }
                }
            }
            if ($_FILES["archivoexplaboralprivadoone3"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'documento exp laboral tercero 1';
                if (in_array($_FILES["archivoexplaboralprivadoone3"]["type"], $permitidos) && $_FILES["archivoexplaboralprivadoone3"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivoexplaboralprivadoone3"]["name"] = "comprobante exp laboral tercero 1.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadoone3"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadoone3"]["tmp_name"], $archivo);
                    }
                }
            }
            if ($_FILES["archivoexplaboralprivadotwo3"]["error"] > 0) {
            } else {
            
                $permitidos = array("application/pdf");
                    $compdomicilio = 'documento exp laboral tercero 2';
                if (in_array($_FILES["archivoexplaboralprivadotwo3"]["type"], $permitidos) && $_FILES["archivoexplaboralprivadotwo3"]["size"]) {
            
                    $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                    $archivo = $ruta . $_FILES["archivoexplaboralprivadotwo3"]["name"] = "comprobante exp laboral tercero 2.pdf";
            
            
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
            
                    if (file_exists($archivo)) {
            
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadotwo3"]["tmp_name"], $archivo);
            
                        
                    }else{
                        $resultado = @move_uploaded_file($_FILES["archivoexplaboralprivadotwo3"]["tmp_name"], $archivo);
                    }
                }
            }
            $sql = $conexionSeleccion->prepare("UPDATE explaboralpublico SET empresauno=:empresauno, cbx_dependenciauno=:cbx_dependenciauno, puestoempresauno=:puestoempresauno, tipopuestouno=:tipopuestouno, empresadirecionuno=:empresadirecionuno, telcontactouno=:telcontactouno, extencionuno=:extencionuno, jefedirectouno=:jefedirectouno, motivoseparacionuno=:motivoseparacionuno, funcionespricipalesuno=:funcionespricipalesuno, fechainiciouno=:fechainiciouno, fechaterminouno=:fechaterminouno, 
        empresados=:empresados,cbx_dependenciados=:cbx_dependenciados,puestoempresados=:puestoempresados,tipopuestodos=:tipopuestodos,empresadirecdos=:empresadirecdos,telcontactodos=:telcontactodos,extenciondos=:extenciondos,jefedirectodos=:jefedirectodos,motivoseparaciondos=:motivoseparaciondos,funcionespricipalesdos=:funcionespricipalesdos,fechainicidos=:fechainicidos,fechaterminodos=:fechaterminodos,
        empresatres=:empresatres,cbx_dependenciatres=:cbx_dependenciatres,puestoempresatres=:puestoempresatres,tipopuestotres=:tipopuestotres,empresadirectres=:empresadirectres,telcontactotres=:telcontactotres,extenciontres=:extenciontres,jefedirectotres=:jefedirectotres,motivoseparaciontres=:motivoseparaciontres,funcionespricipalestres=:funcionespricipalestres,fechainiciotres=:fechainiciotres,fechaterminotres=:fechaterminotres where id_postulado = :id_postulado");
                $sql->execute(array(
                    ':empresauno'=>$empresaone, 
                    ':cbx_dependenciauno'=>$cbx_dependenciaone, 
                    ':puestoempresauno'=>$puestoempresauno, 
                    ':tipopuestouno'=>$empresa, 
                    ':empresadirecionuno'=>$empresadirecionuno, 
                    ':telcontactouno'=>$telcontactouno, 
                    ':extencionuno'=>$extencionuno, 
                    ':jefedirectouno'=>$jefedirectouno, 
                    ':motivoseparacionuno'=>$motivoseparacionuno, 
                    ':funcionespricipalesuno'=>$funcionespricipalesuno, 
                    ':fechainiciouno'=>$fechainiciouno, 
                    ':fechaterminouno'=>$fechaterminouno, 
                    ':empresados'=>$cbx_empresados,
                    ':cbx_dependenciados'=>$cbx_dependenciados,
                    ':puestoempresados'=>$puestoempresados,
                    ':tipopuestodos'=>$tipopuestodos,
                    ':empresadirecdos'=>$empresadirecdos,
                    ':telcontactodos'=>$telcontactodos,
                    ':extenciondos'=>$extenciondos,
                    ':jefedirectodos'=>$jefedirectodos,
                    ':motivoseparaciondos'=>$motivoseparaciondos,
                    ':funcionespricipalesdos'=>$funcionespricipalesdos,
                    ':fechainicidos'=>$fechainicidos,
                    ':fechaterminodos'=>$fechaterminodos,
                    ':empresatres'=>$cbx_empresatres,
                    ':cbx_dependenciatres'=>$cbx_dependenciatres,
                    ':puestoempresatres'=>$puestoempresatres,
                    ':tipopuestotres'=>$tipopuestotres,
                    ':empresadirectres'=>$empresadirectres,
                    ':telcontactotres'=>$telcontactotres,
                    ':extenciontres'=>$extenciontres,
                    ':jefedirectotres'=>$jefedirectotres,
                    ':motivoseparaciontres'=>$motivoseparaciontres,
                    ':funcionespricipalestres'=>$funcionespricipalestres,
                    ':fechainiciotres'=>$fechainiciotres,
                    ':fechaterminotres'=>$fechaterminotres,
                    ':id_postulado'=>$validaid
                ));
                if ($_FILES["archivoexplaboralpublicoone1"]["error"] > 0) {
                } else {
                
                    $permitidos = array("application/pdf");
                        $compdomicilio = 'documento exp laboral publico primero 1';
                    if (in_array($_FILES["archivoexplaboralpublicoone1"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicoone1"]["size"]) {
                
                        $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicoone1"]["name"] = "comprobante exp laboral publico  primero 1.pdf";
                
                
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
                
                        if (file_exists($archivo)) {
                
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicoone1"]["tmp_name"], $archivo);
                
                            
                        }else{
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicoone1"]["tmp_name"], $archivo);
                        }
                    }
                }
    
                if ($_FILES["archivoexplaboralpublicotwo1"]["error"] > 0) {
                } else {
                
                    $permitidos = array("application/pdf");
                        $compdomicilio = 'documento exp laboral publico primero 2';
                    if (in_array($_FILES["archivoexplaboralpublicotwo1"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicotwo1"]["size"]) {
                
                        $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicotwo1"]["name"] = "comprobante exp laboral publico primero 2.pdf";
                
                
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
                
                        if (file_exists($archivo)) {
                
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicotwo1"]["tmp_name"], $archivo);
                
                            
                        }else{
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicotwo1"]["tmp_name"], $archivo);
                        }
                    }
                }
    
                if ($_FILES["archivoexplaboralpublicoone2"]["error"] > 0) {
                } else {
                
                    $permitidos = array("application/pdf");
                        $compdomicilio = 'documento exp laboral publico segundo 1';
                    if (in_array($_FILES["archivoexplaboralpublicoone2"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicoone2"]["size"]) {
                
                        $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicoone2"]["name"] = "comprobante exp laboral publico segundo 1.pdf";
                
                
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
                
                        if (file_exists($archivo)) {
                
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicoone2"]["tmp_name"], $archivo);
                
                            
                        }else{
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicoone2"]["tmp_name"], $archivo);
                        }
                    }
                }
                if ($_FILES["archivoexplaboralpublicotwo2"]["error"] > 0) {
                } else {
                
                    $permitidos = array("application/pdf");
                        $compdomicilio = 'documento exp laboral publico segundo 2';
                    if (in_array($_FILES["archivoexplaboralpublicotwo2"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicotwo2"]["size"]) {
                
                        $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicotwo2"]["name"] = "comprobante exp laboral publico segundo 2.pdf";
                
                
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
                
                        if (file_exists($archivo)) {
                
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicotwo2"]["tmp_name"], $archivo);
                
                            
                        }else{
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicotwo2"]["tmp_name"], $archivo);
                        }
                    }
                }
                if ($_FILES["archivoexplaboralpublicoone3"]["error"] > 0) {
                } else {
                
                    $permitidos = array("application/pdf");
                        $compdomicilio = 'documento exp laboral publico tercero 1';
                    if (in_array($_FILES["archivoexplaboralpublicoone3"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicoone3"]["size"]) {
                
                        $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicoone3"]["name"] = "comprobante exp laboral publico tercero 1.pdf";
                
                
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
                
                        if (file_exists($archivo)) {
                
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicoone3"]["tmp_name"], $archivo);
                
                            
                        }else{
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicoone3"]["tmp_name"], $archivo);
                        }
                    }
                }
                if ($_FILES["archivoexplaboralpublicotwo3"]["error"] > 0) {
                } else {
                
                    $permitidos = array("application/pdf");
                        $compdomicilio = 'documento exp laboral publico tercero 2';
                    if (in_array($_FILES["archivoexplaboralpublicotwo3"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicotwo3"]["size"]) {
                
                        $ruta = '../documentos/' . $compdomicilio . $curp . '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicotwo3"]["name"] = "comprobante exp laboral tercero 2.pdf";
                
                
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
                
                        if (file_exists($archivo)) {
                
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicotwo3"]["tmp_name"], $archivo);
                
                            
                        }else{
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicotwo3"]["tmp_name"], $archivo);
                        }
                    }
                }
                $sql = $conexionSeleccion->prepare("UPDATE cientificaidioma SET nombrepublicacion=:nombrepublicacion, tiempopublicacion=:tiempopublicacion, publicadoen=:publicadoen, paisdepublicacion=:paisdepublicacion,
        nombreidioma=:nombreidioma,nivel=:nivel,niveldedominio=:niveldedominio,documentoacredita=:documentoacredita,otrashabilidades=:otrashabilidades where id_postulado = :id_postulado");
            $sql->execute(array(
                ':nombrepublicacion'=>$nombrepublicacion, 
                ':tiempopublicacion'=>$tiempopublicacion, 
                ':publicadoen'=>$publicadoen, 
                ':paisdepublicacion'=>$paisdepublicacion,
                ':nombreidioma'=>$nombreidioma,
                ':nivel'=>$nivel,
                ':niveldedominio'=>$niveldedominio,
                ':documentoacredita'=>$documentoacredita,
                ':otrashabilidades'=>$otrashabilidades,
                ':id_postulado'=>$validaid
            ));
        $sql = $conexionSeleccion->prepare("UPDATE datospersonales set datosActualizados = :datosActualizados where curp = :curp");
            $sql->execute(array(
                ':datosActualizados'=>1,
                ':curp'=>$curp
            ));
            
        $validatransac = $conexionSeleccion->commit();

        if($validatransac != false) {
            echo "<script>alert('Modificacion de datos exitosa');
    </script>";
    header('location: ../misDatos');
    }
    }catch(Exception $e) {
    $conexionSeleccion->rollBack();
    echo "<script>alert('Error al modificar tus datos');
    </script>";
    header('location: ../misDatos');
    }
        
    
    ?> 