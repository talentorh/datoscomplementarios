<?php
error_reporting(0);
require '../claseConexion/conexion.php';
date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('Y-m-d', time());
extract($_POST);
$sql = $conexion->prepare("UPDATE datospersonales set cargodocumento = 1 where curp = '$curp' and fechainicio between '2024-01-31' and '2024-12-31'");
        $sql->execute();

    try {
        $conexionSeleccion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexionSeleccion->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
        $conexionSeleccion->beginTransaction();
        
        $sql = $conexionSeleccion->prepare("DELETE from datospersonales where id_datopersonal = :id_datopersonal");
            $sql->execute(array(
                ':id_datopersonal'=>$id_user
            ));
            $sql = $conexionSeleccion->prepare("INSERT INTO datospersonales(id_datopersonal, profesion, curp, nombre, appaterno, apmaterno, estado, delegacion, localidad, colonia, calle, numexterior, numinterior, codigopostal,
            fechanacimiento, entidadnacimiento, rfc, sexo, cartanaturalizacion, telefonocasa, telefonocelular, otrotelefono, correoelectronico, fechaactualizo, plazaevaluar) VALUES(:id_datopersonal, :profesion, :curp,
            :nombre, :appaterno, :apmaterno, :estado, :delegacion, :localidad, :colonia, :calle, :numexterior, :numinterior, :codigopostal, :fechanacimiento, :entidadnacimiento, :rfc, :sexo, :cartanaturalizacion, :telefonocasa, :telefonocelular, :otrotelefono, :correoelectronico,:fechaactualizo,:plazaevaluar)");
                $sql->execute(array(
                    ':id_datopersonal'=>$id_user,
                    ':profesion' => $profesion,
                    ':curp' => $curp,
                    ':nombre' => $nombre,
                    ':appaterno' => $appaterno,
                    ':apmaterno' => $apmaterno,
                    ':estado' => $estado,
                    ':delegacion' => $municipio,
                    ':localidad' => $localidad,
                    ':colonia' => $colonia,
                    ':calle' => $calle,
                    ':numexterior' => $numexterior,
                    ':numinterior' => $numinterior,
                    ':codigopostal' => $codigopostal,
                    ':fechanacimiento' => $fechanacimiento,
                    ':entidadnacimiento' => $entidadnacimiento,
                    ':rfc' => $rfc,
                    ':sexo' => $sexo,
                    ':cartanaturalizacion' => $naturalizacion,
                    ':telefonocasa' => $telefonocasa,
                    ':telefonocelular' => $telefonocelular,
                    ':otrotelefono' => $otrotelefono,
                    ':correoelectronico' => $correo,
                    ':fechaactualizo' => $DateAndTime,
                    ':plazaevaluar'=>$plazaevaluar
                ));
                if ($_FILES["avisoconfidencialidad"]["error"] > 0) {
                    
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'avisoconfidencialidad';
                    if (in_array($_FILES["avisoconfidencialidad"]["type"], $permitidos) && $_FILES["avisoconfidencialidad"]["size"]) {
        
                        $ruta = '../documentos/'.$id_user . '/';
                        $archivo = $ruta . $_FILES["avisoconfidencialidad"]["name"] = "avisoconfidencialidad.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["avisoconfidencialidad"]["tmp_name"], $archivo);
                        } else {
                            $resultado = @move_uploaded_file($_FILES["avisoconfidencialidad"]["tmp_name"], $archivo);
                        }
                        
                    }
                    
                }
                if ($_FILES["integraciondeantiguedad"]["error"] > 0) {
                    
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'integraciondeantiguedad';
                    if (in_array($_FILES["integraciondeantiguedad"]["type"], $permitidos) && $_FILES["integraciondeantiguedad"]["size"]) {
        
                        $ruta = '../documentos/'.$id_user . '/';
                        $archivo = $ruta . $_FILES["integraciondeantiguedad"]["name"] = "integraciondeantiguedad.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["integraciondeantiguedad"]["tmp_name"], $archivo);
                        } else {
                            $resultado = @move_uploaded_file($_FILES["integraciondeantiguedad"]["tmp_name"], $archivo);
                        }
                        
                    }
                    
                }
                if ($_FILES["noconflictodeinteres"]["error"] > 0) {
                    
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'noconflictodeinteres';
                    if (in_array($_FILES["noconflictodeinteres"]["type"], $permitidos) && $_FILES["noconflictodeinteres"]["size"]) {
        
                        $ruta = '../documentos/'.$id_user . '/';
                        $archivo = $ruta . $_FILES["noconflictodeinteres"]["name"] = "noconflictodeinteres.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["noconflictodeinteres"]["tmp_name"], $archivo);
                        } else {
                            $resultado = @move_uploaded_file($_FILES["noconflictodeinteres"]["tmp_name"], $archivo);
                        }
                        
                    }
                    
                }
                if ($_FILES["paraocpuacion"]["error"] > 0) {
                    
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'paraocpuacion';
                    if (in_array($_FILES["paraocpuacion"]["type"], $permitidos) && $_FILES["paraocpuacion"]["size"]) {
        
                        $ruta = '../documentos/'.$id_user . '/';
                        $archivo = $ruta . $_FILES["paraocpuacion"]["name"] = "paraocpuacion.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["paraocpuacion"]["tmp_name"], $archivo);
                        } else {
                            $resultado = @move_uploaded_file($_FILES["paraocpuacion"]["tmp_name"], $archivo);
                        }
                        
                    }
                    
                }
                if ($_FILES["noempleo"]["error"] > 0) {
                    
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'noempleo';
                    if (in_array($_FILES["noempleo"]["type"], $permitidos) && $_FILES["noempleo"]["size"]) {
        
                        $ruta = '../documentos/'.$id_user . '/';
                        $archivo = $ruta . $_FILES["noempleo"]["name"] = "noempleo.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["noempleo"]["tmp_name"], $archivo);
                        } else {
                            $resultado = @move_uploaded_file($_FILES["noempleo"]["tmp_name"], $archivo);
                        }
                        
                    }
                    
                }
                if ($_FILES["consentimiento"]["error"] > 0) {
                    
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'consentimiento';
                    if (in_array($_FILES["consentimiento"]["type"], $permitidos) && $_FILES["consentimiento"]["size"]) {
        
                        $ruta = '../documentos/'.$id_user . '/';
                        $archivo = $ruta . $_FILES["consentimiento"]["name"] = "consentimiento.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["consentimiento"]["tmp_name"], $archivo);
                        } else {
                            $resultado = @move_uploaded_file($_FILES["consentimiento"]["tmp_name"], $archivo);
                        }
                        
                    }
                    
                }
                if ($_FILES["otroempleo"]["error"] > 0) {
                    
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'otroempleo';
                    if (in_array($_FILES["otroempleo"]["type"], $permitidos) && $_FILES["otroempleo"]["size"]) {
        
                        $ruta = '../documentos/'.$id_user . '/';
                        $archivo = $ruta . $_FILES["otroempleo"]["name"] = "otroempleo.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["otroempleo"]["tmp_name"], $archivo);
                        } else {
                            $resultado = @move_uploaded_file($_FILES["otroempleo"]["tmp_name"], $archivo);
                        }
                        
                    }
                    
                }
                if ($_FILES["protecciondatos"]["error"] > 0) {
                    
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'protecciondatos';
                    if (in_array($_FILES["protecciondatos"]["type"], $permitidos) && $_FILES["protecciondatos"]["size"]) {
        
                        $ruta = '../documentos/'.$id_user . '/';
                        $archivo = $ruta . $_FILES["protecciondatos"]["name"] = "protecciondatos.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["protecciondatos"]["tmp_name"], $archivo);
                        } else {
                            $resultado = @move_uploaded_file($_FILES["protecciondatos"]["tmp_name"], $archivo);
                        }
                        
                    }
                    
                }
                /*inicializa edicion de curp*/
                if ($_FILES["documentocurp"]["error"] > 0) {
                    
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'documentocurp';
                    if (in_array($_FILES["documentocurp"]["type"], $permitidos) && $_FILES["documentocurp"]["size"]) {
        
                        $ruta = '../documentos/'.$id_user . '/';
                        $archivo = $ruta . $_FILES["documentocurp"]["name"] = "comprobante curp.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["documentocurp"]["tmp_name"], $archivo);
                        } else {
                            $resultado = @move_uploaded_file($_FILES["documentocurp"]["tmp_name"], $archivo);
                        }
                        
                    }
                    
                }
            /*incializa edicion de comprobante de domicilio*/
            if ($_FILES["comprobantedomicilio"]["error"] > 0) {
                    
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'comprobantedomicilio';
                    if (in_array($_FILES["comprobantedomicilio"]["type"], $permitidos) && $_FILES["comprobantedomicilio"]["size"]) {
        
                        $ruta = '../documentos/'. $id_user . '/';
                        $archivo = $ruta . $_FILES["comprobantedomicilio"]["name"] = "comprobante de domicilio.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["comprobantedomicilio"]["tmp_name"], $archivo);
                        } else {
                            $resultado = @move_uploaded_file($_FILES["comprobantedomicilio"]["tmp_name"], $archivo);
                        }
                        
                    }
                
                }
                $sql = $conexionSeleccion->prepare("SELECT id_datopersonal from datospersonales where curp = :curp");
                $sql->execute(array(
                    ':curp' => $curp
                ));
                $rowid = $sql->fetch();
        
                $id_user = $rowid['id_datopersonal'];
        
        $sql = $conexionSeleccion->prepare("INSERT INTO estudiosmediosup(nombreformacionmedia, nombremediasuperior, fechainicio, fechatermino, tiempocursado, documentomediosuperior, id_postulado) 
                            VALUES(:nombreformacionmedia, :nombremediasuperior, :fechainicio, :fechatermino, :tiempocursado, :documentomediosuperior,:id_postulado)");
                        $sql->execute(array(
                            ':nombreformacionmedia' => $nombreformacionmedia,
                            ':nombremediasuperior' => $nombremediasuperior,
                            ':fechainicio' => $fechainicio,
                            ':fechatermino' => $fechatermino,
                            ':tiempocursado' => $tiempocursado,
                            ':documentomediosuperior' => $documentomediosuperior,
                            ':id_postulado' => $id_user
                        ));
                        if ($_FILES["archivomediasuperior"]["error"] > 0) {
                        } else {
                
                            $permitidos = array("application/pdf");
                            $nombreArchivo = $_POST['nombreformacionmedia'];
                            if (in_array($_FILES["archivomediasuperior"]["type"], $permitidos) && $_FILES["archivomediasuperior"]["size"]) {
                
                                $ruta = '../documentos/' .$id_user . '/';
                                $archivo = $ruta . $_FILES["archivomediasuperior"]["name"] = "Certificado media superior.pdf";
                
                
                                if (!file_exists($ruta)) {
                                    mkdir($ruta);
                                }
                
                                if (!file_exists($archivo)) {
                
                                    $resultado = @move_uploaded_file($_FILES["archivomediasuperior"]["tmp_name"], $archivo);
                                } else {
                                    $resultado = @move_uploaded_file($_FILES["archivomediasuperior"]["tmp_name"], $archivo);
                                }
                            }
                        }
                        $sql = $conexionSeleccion->prepare("INSERT into estudiostecnico (nombreinstituciontecnica,nombreformaciontecnica,fechainiciotecnico,fechaterminotecnico,tiempocursadotecnico,documentotecnico,id_empleado)
                        values(:nombreinstituciontecnica,:nombreformaciontecnica,:fechainiciotecnico,:fechaterminotecnico,:tiempocursadotecnico,:documentotecnico,:id_empleado)");
            $sql->execute(array(
                ':nombreinstituciontecnica' => $nombreinstituciontecnica,
                ':nombreformaciontecnica' => $nombreformaciontecnica,
                ':fechainiciotecnico' => $fechainiciotecnico,
                ':fechaterminotecnico' => $fechaterminotecnico,
                ':tiempocursadotecnico' => $tiempocursadotecnico,
                ':documentotecnico' => $documentotecnico,
                ':id_empleado' => $id_user
            ));
            if ($_FILES["archivotecnico"]["error"] > 0) {
                    
            } else {
    
                $permitidos = array("application/pdf");
                $compdomicilio = 'Titulo tecnico';
                if (in_array($_FILES["archivotecnico"]["type"], $permitidos) && $_FILES["archivotecnico"]["size"]) {
    
                    $ruta = '../documentos/'.$id_user . '/';
                    $archivo = $ruta . $_FILES["archivotecnico"]["name"] = "Titulo tecnico.pdf";
    
    
                    if (!file_exists($ruta)) {
                        mkdir($ruta);
                    }
    
                    if (!file_exists($archivo)) {
    
                        $resultado = @move_uploaded_file($_FILES["archivotecnico"]["tmp_name"], $archivo);
                    } else {
                        $resultado = @move_uploaded_file($_FILES["archivotecnico"]["tmp_name"], $archivo);
                    }
                    
                }
                
            }
            if($nombreformacionPostecnico != '' and $nombreinstitucionPostecnico != ''){
                $arraynombreformacionPostecnico = array_map("htmlspecialchars", $nombreformacionPostecnico);
                $arraynombreinstitucionPostecnico = array_map("htmlspecialchars", $nombreinstitucionPostecnico);
                $arrayfechainiciosupPostecnico = array_map("htmlspecialchars", $fechainiciosupPostecnico);
                $arrayfechaterminosupPostecnico = array_map("htmlspecialchars", $fechaterminosupPostecnico);
                $arraytiempocursadosupPostecnico = array_map("htmlspecialchars", $tiempocursadosupPostecnico);
                $arraydocumentorecibePostecnico = array_map("htmlspecialchars", $documentorecibePostecnico);
            
                foreach ($arraynombreformacionPostecnico as $clavep => $nombreformacionPostecnico) {
                    $nombreinstitucionPostecnico = $arraynombreinstitucionPostecnico[$clavep];
                    $fechainiciosupPostecnico = $arrayfechainiciosupPostecnico[$clavep];
                    $fechaterminosupPostecnico = $arrayfechaterminosupPostecnico[$clavep];
                    $tiempocursadosupPostecnico = $arraytiempocursadosupPostecnico[$clavep];
                    $documentorecibePostecnico = $arraydocumentorecibePostecnico[$clavep];
                    $datoUnicoP[] = '("' . $nombreformacionPostecnico . '", "' . $nombreinstitucionPostecnico . '", "' . $fechainiciosupPostecnico . '", "' . $fechaterminosupPostecnico . '", "' . $tiempocursadosupPostecnico . '", "' . $documentorecibePostecnico . '", "' . $id_user . '")';
                    $sql = $conexionSeleccion->prepare("INSERT into  estudiospostecnico(nombreformacionpostecnico,nombreinstitucionpostecnico,fechainiciosuppostecnico,fechaterminosuppostecnico,tiempocursadosuppostecnico,documentorecibepostecnico,id_empleado) VALUES " . implode(', ', $datoUnicoP));
                    
            }
            $sql->execute();
            foreach($_FILES["documentotitulopostecnico"]['tmp_name'] as $key => $tmp_name)
            {
                //condicional si el fuchero existe
                if($_FILES["documentotitulopostecnico"]["name"][$key]) {
                    // Nombres de archivos de temporales
                    $nombredelarchivo = "Titulo postecnico";
                    $archivonombre = $_POST['nombreformacionPostecnico'][$key];
                    $fuente = $_FILES["documentotitulopostecnico"]["tmp_name"][$key]; 
                    
                    $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                    
                    if(!file_exists($carpeta)){
                        mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                    }
                    
                    $dir=opendir($carpeta);
                    $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                    
            
                    if(file_exists($carpeta)) {	
                        move_uploaded_file($fuente, $target_path);
                        
                        } else {	
                        echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                    }
                    closedir($dir); //Cerramos la conexion con la carpeta destino
                }
            }
            foreach($_FILES["documentocedulapostecnico"]['tmp_name'] as $key => $tmp_name)
            {
                //condicional si el fuchero existe
                if($_FILES["documentocedulapostecnico"]["name"][$key]) {
                    // Nombres de archivos de temporales
                    $nombredelarchivo = "Cedula postecnico";
                    $archivonombre = $_POST['nombreformacionPostecnico'][$key];
                    $fuente = $_FILES["documentocedulapostecnico"]["tmp_name"][$key]; 
                    
                    $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                    
                    if(!file_exists($carpeta)){
                        mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                    }
                    
                    $dir=opendir($carpeta);
                    $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                    
            
                    if(file_exists($carpeta)) {	
                        move_uploaded_file($fuente, $target_path);
                        
                        } else {	
                        echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                    }
                    closedir($dir); //Cerramos la conexion con la carpeta destino
                }
            }
        }
        
            if($nombreformacion != '' and $nombreinstitucion != ''){
                $arraynombreformacion = array_map("htmlspecialchars", $nombreformacion);
                $arraynombreinstitucion = array_map("htmlspecialchars", $nombreinstitucion);
                $arrayfechainicio = array_map("htmlspecialchars", $fechainiciosup);
                $arrayfechaterminosup = array_map("htmlspecialchars", $fechaterminosup);
                $arraytiempocursadosup = array_map("htmlspecialchars", $tiempocursadosup);
                $arraydocumentorecibe = array_map("htmlspecialchars", $documentorecibe);
                $arraynumerocedula = array_map("htmlspecialchars", $numerocedula);
            
                foreach ($arraynombreformacion as $clave => $nombreformacion) {
                    $nombreinstitucion = $arraynombreinstitucion[$clave];
                    $fechainicio = $arrayfechainicio[$clave];
                    $fechatermino = $arrayfechaterminosup[$clave];
                    $tiempocursado = $arraytiempocursadosup[$clave];
                    $documentorecibe = $arraydocumentorecibe[$clave];
                    $numerocedula = $arraynumerocedula[$clave];
                    $datoUnico[] = '("' . $nombreformacion . '", "' . $nombreinstitucion . '", "' . $fechainicio . '", "' . $fechatermino . '", "' . $tiempocursado . '", "' . $documentorecibe . '", "' . $numerocedula . '", "' . $id_user . '")';
                    $sql = $conexionSeleccion->prepare("INSERT into  estudiossuperior(nombreformacionsuperior,nombresuperior,fechasuperiorinicio,fechasuperiortermino,tiempocursadosuperior,documentosuperior,numerocedulasuperior,id_empleado) VALUES " . implode(', ', $datoUnico));
                    
            }
            $sql->execute();
            foreach($_FILES["documentolicenciatura"]['tmp_name'] as $key => $tmp_name)
            {
                //condicional si el fuchero existe
                if($_FILES["documentolicenciatura"]["name"][$key]) {
                    // Nombres de archivos de temporales
                    $nombredelarchivo = "Titulo licenciatura";
                    $archivonombre = $_POST['nombreformacion'][$key];
                    $fuente = $_FILES["documentolicenciatura"]["tmp_name"][$key]; 
                    
                    $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                    
                    if(!file_exists($carpeta)){
                        mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                    }
                    
                    $dir=opendir($carpeta);
                    $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                    
            
                    if(file_exists($carpeta)) {	
                        move_uploaded_file($fuente, $target_path);
                        
                        } else {	
                        echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                    }
                    closedir($dir); //Cerramos la conexion con la carpeta destino
                }
            }
            foreach($_FILES["documentocedula"]['tmp_name'] as $key => $tmp_name)
            {
                //condicional si el fuchero existe
                if($_FILES["documentocedula"]["name"][$key]) {
                    // Nombres de archivos de temporales
                    $nombredelarchivo = "Cedula licenciatura";
                    $archivonombre = $_POST['nombreformacion'][$key];
                    $fuente = $_FILES["documentocedula"]["tmp_name"][$key]; 
                    
                    $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                    
                    if(!file_exists($carpeta)){
                        mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                    }
                    
                    $dir=opendir($carpeta);
                    $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                    
            
                    if(file_exists($carpeta)) {	
                        move_uploaded_file($fuente, $target_path);
                        
                        } else {	
                        echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                    }
                    closedir($dir); //Cerramos la conexion con la carpeta destino
                }
            }
        }
        if($nombreformacionmaestria != '' and $nombremaestria != ''){
                $arraynombreformacionmaestria = array_map("htmlspecialchars", $nombreformacionmaestria);
                $arraynombreinstitucionmaestria = array_map("htmlspecialchars", $nombremaestria);
                $arrayfechainiciomaestria = array_map("htmlspecialchars", $fechainiciomaestria);
                $arrayfechaterminomaestria = array_map("htmlspecialchars", $fechaterminomaestria);
                $arraytiempocursadomaestria = array_map("htmlspecialchars", $tiempocursadomaestria);
                $arraydocumentorecibemaestria = array_map("htmlspecialchars", $documentomaestria);
                $arraynumerocedulamaestria = array_map("htmlspecialchars", $cedulamaestria);
            
                foreach ($arraynombreformacionmaestria as $clavemaestria => $nombreformacionmaestria) {
                    $nombremaestria = $arraynombreinstitucionmaestria[$clavemaestria];
                    $fechainiciomaestria = $arrayfechainiciomaestria[$clavemaestria];
                    $fechaterminomaestria = $arrayfechaterminomaestria[$clavemaestria];
                    $tiempocursadomaestria = $arraytiempocursadomaestria[$clavemaestria];
                    $documentomaestria = $arraydocumentorecibemaestria[$clavemaestria];
                    $cedulamaestria = $arraynumerocedulamaestria[$clavemaestria];
                    $datoUnicomaestria[] = '("' . $nombreformacionmaestria . '", "' . $nombremaestria . '", "' . $fechainiciomaestria . '", "' . $fechaterminomaestria . '", "' . $tiempocursadomaestria . '", "' . $documentomaestria . '", "' . $cedulamaestria . '", "' . $id_user . '")';
                    $sql = $conexionSeleccion->prepare("INSERT into  estudiosmaestria(nombreformacionmaestria,nombremaestria,fechamaestriainicio,fechamaestriatermino,tiempocursadomaestria,documentomaestria,numerocedulamaestria,id_empleado) VALUES " . implode(', ', $datoUnicomaestria));
                    
                } 
                $sql->execute();
                foreach($_FILES["documentotitulomaestria"]['tmp_name'] as $key => $tmp_name)
            {
                //condicional si el fuchero existe
                if($_FILES["documentotitulomaestria"]["name"][$key]) {
                    // Nombres de archivos de temporales
                    $nombredelarchivo = "Titulo maestria";
                    $archivonombre = $_POST['nombreformacionmaestria'][$key];
                    $fuente = $_FILES["documentotitulomaestria"]["tmp_name"][$key]; 
                    
                    $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                    
                    if(!file_exists($carpeta)){
                        mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                    }
                    
                    $dir=opendir($carpeta);
                    $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                    
            
                    if(file_exists($carpeta)) {	
                        move_uploaded_file($fuente, $target_path);
                        
                        } else {	
                        echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                    }
                    closedir($dir); //Cerramos la conexion con la carpeta destino
                }
            }
            foreach($_FILES["documentocedulamaestria"]['tmp_name'] as $key => $tmp_name)
            {
                //condicional si el fuchero existe
                if($_FILES["documentocedulamaestria"]["name"][$key]) {
                    // Nombres de archivos de temporales
                    $nombredelarchivo = "Cedula maestria";
                    $archivonombre = $_POST['nombreformacionmaestria'][$key];
                    $fuente = $_FILES["documentocedulamaestria"]["tmp_name"][$key]; 
                    
                    $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                    
                    if(!file_exists($carpeta)){
                        mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                    }
                    
                    $dir=opendir($carpeta);
                    $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                    
            
                    if(file_exists($carpeta)) {	
                        move_uploaded_file($fuente, $target_path);
                        
                        } else {	
                        echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                    }
                    closedir($dir); //Cerramos la conexion con la carpeta destino
                }
            }
        }
            if($nombreformacionposgradoespecialidad != '' and $nombreinstitucionposgradoespecialidad != ''){
                $arraynombreformacionposgradoespecialidad = array_map("htmlspecialchars", $nombreformacionposgradoespecialidad);
                $arraynombreinstitucionposgradoespecialidad = array_map("htmlspecialchars", $nombreinstitucionposgradoespecialidad);
                $arrayfechainicioposgradoespecialidad = array_map("htmlspecialchars", $fechainiciosupposgradoespecialidad);
                $arrayfechaterminoposgradoespecialidad = array_map("htmlspecialchars", $fechaterminosupposgradoespecialidad);
                $arraytiempocursadoposgradoespecialidad = array_map("htmlspecialchars", $tiempocursadosupposgradoespecialidad);
                $arrayunidadhospitalariaposgradoespecialidad = array_map("htmlspecialchars", $unidadhospitalariaposgradoespecialidad);
                $arraydocumentorecibeposgradoespecialidad = array_map("htmlspecialchars", $documentorecibeposgradoespecialidad);
                $arraynumerocedulaposgradoespecialidad = array_map("htmlspecialchars", $numerocedulaposgradoespecialidad);
        
            
                foreach ($arraynombreformacionposgradoespecialidad as $claveposgradoespecialidad => $nombreformacionposgradoespecialidad) {
                    $nombreinstitucionposgradoespecialidad = $arraynombreinstitucionposgradoespecialidad[$claveposgradoespecialidad];
                    $fechainicioposgradoespecialidad = $arrayfechainicioposgradoespecialidad[$claveposgradoespecialidad];
                    $fechaterminoposgradoespecialidad = $arrayfechaterminoposgradoespecialidad[$claveposgradoespecialidad];
                    $tiempocursadoposgradoespecialidad = $arraytiempocursadoposgradoespecialidad[$claveposgradoespecialidad];
                    $unidadhospitalariaposgradoespecialidad = $arrayunidadhospitalariaposgradoespecialidad[$claveposgradoespecialidad];
                    $documentorecibeposgradoespecialidad = $arraydocumentorecibeposgradoespecialidad[$claveposgradoespecialidad];
                    $numerocedulaposgradoespecialidad = $arraynumerocedulaposgradoespecialidad[$claveposgradoespecialidad];
                    
                    $datoUnicoposgradoespecialidad[] = '("' . $nombreformacionposgradoespecialidad . '", "' . $nombreinstitucionposgradoespecialidad . '","' . $unidadhospitalariaposgradoespecialidad . '", "' . $fechainicioposgradoespecialidad . '", "' . $fechaterminoposgradoespecialidad . '", "' . $tiempocursadoposgradoespecialidad . '", "' . $documentorecibeposgradoespecialidad . '", "' . $numerocedulaposgradoespecialidad . '", "' . $id_user . '")';
                    $sql = $conexionSeleccion->prepare("INSERT into  especialidad(nombreformacionacademica,nombreinstitucion,unidadhospitalaria,fechainicioespecialidad,fechaterminoespecialidad,anioscursados,documentorecibeespecialidad,numerocedulaespecialidad,id_empleado) VALUES " . implode(', ', $datoUnicoposgradoespecialidad));
                    
                }
            
                $sql->execute();
                foreach($_FILES["archivotituloposgrado"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["archivotituloposgrado"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = "Titulo posgrado";
                        $archivonombre = $_POST['nombreformacionposgradoespecialidad'][$key];
                        $fuente = $_FILES["archivotituloposgrado"]["tmp_name"][$key]; 
                        
                        $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
                foreach($_FILES["archivocedulaposgrado"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["archivocedulaposgrado"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = "Cedula posgrado";
                        $archivonombre = $_POST['nombreformacionposgradoespecialidad'][$key];
                        $fuente = $_FILES["archivocedulaposgrado"]["tmp_name"][$key]; 
                        
                        $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
                foreach($_FILES["certificadoconsejo"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["certificadoconsejo"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = "Certificado consejo";
                        $archivonombre = $_POST['nombreformacionposgradoespecialidad'][$key];
                        $fuente = $_FILES["certificadoconsejo"]["tmp_name"][$key]; 
                        
                        $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
            }
            if($nombreformaciondoctorado != '' and $nombreinstituciondoctorado != ''){
                $arraynombreformaciondoctorado = array_map("htmlspecialchars", $nombreformaciondoctorado);
                $arraynombreinstituciondoctorado = array_map("htmlspecialchars", $nombreinstituciondoctorado);
                $arrayfechainiciodoctorado = array_map("htmlspecialchars", $fechainiciosupdoctorado);
                $arrayfechaterminodoctorado = array_map("htmlspecialchars", $fechaterminosupdoctorado);
                $arraytiempocursadodoctorado = array_map("htmlspecialchars", $tiempocursadosupdoctorado);
                $arrayunidadhospitalariadoctorado = array_map("htmlspecialchars", $unidadhospitalariadoctorado);
                $arraydocumentorecibedoctorado = array_map("htmlspecialchars", $documentorecibedoctorado);
                $arraynumeroceduladoctorado = array_map("htmlspecialchars", $numeroceduladoctorado);
            
                foreach ($arraynombreformaciondoctorado as $clavedoctorado => $nombreformaciondoctorado) {
                    $nombreinstituciondoctorado = $arraynombreinstituciondoctorado[$clavedoctorado];
                    $fechainiciodoctorado = $arrayfechainiciodoctorado[$clavedoctorado];
                    $fechaterminodoctorado = $arrayfechaterminodoctorado[$clavedoctorado];
                    $tiempocursadodoctorado = $arraytiempocursadodoctorado[$clavedoctorado];
                    $unidadhospitalariadoctorado = $arrayunidadhospitalariadoctorado[$clavedoctorado];
                    $documentorecibedoctorado = $arraydocumentorecibedoctorado[$clavedoctorado];
                    $numeroceduladoctorado = $arraynumeroceduladoctorado[$clavedoctorado];
                    $datoUnicodoctorado[] = '("' . $nombreformaciondoctorado . '", "' . $nombreinstituciondoctorado . '","' . $unidadhospitalariadoctorado . '", "' . $fechainiciodoctorado . '", "' . $fechaterminodoctorado . '", "' . $tiempocursadodoctorado . '", "' . $documentorecibedoctorado . '", "' . $numeroceduladoctorado . '", "' . $id_user . '")';
                    $sql = $conexionSeleccion->prepare("INSERT into  doctorado(nombreformaciondoctorado,nombreinstituciondoctorado,unidadhospitalariadoctorado,fechainiciodoctorado,fechaterminodoctorado,anioscursadosdoctorado,documentorecibedoctorado,numeroceduladoctorado,id_empleado) VALUES " . implode(', ', $datoUnicodoctorado));
                    
                }
                $sql->execute();
                foreach($_FILES["archivotitulodoctorado"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["archivotitulodoctorado"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = "Titulo doctorado";
                        $archivonombre = $_POST['nombreformaciondoctorado'][$key];
                        $fuente = $_FILES["archivotitulodoctorado"]["tmp_name"][$key]; 
                        
                        $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
                foreach($_FILES["archivoceduladoctorado"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["archivoceduladoctorado"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = "Cedula doctorado";
                        $archivonombre = $_POST['nombreformaciondoctorado'][$key];
                        $fuente = $_FILES["archivoceduladoctorado"]["tmp_name"][$key]; 
                        
                        $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
            }
            if($nombreformaciondiplomado != '' and $nombreinstituciondiplomado != ''){
                $arraynombreformaciondiplomado = array_map("htmlspecialchars", $nombreformaciondiplomado);
        $arraynombreinstituciondiplomado = array_map("htmlspecialchars", $nombreinstituciondiplomado);
        $arrayfechainiciosupdiplomado = array_map("htmlspecialchars", $fechainiciosupdiplomado);
        $arrayfechaterminosupdiplomado = array_map("htmlspecialchars", $fechaterminosupdiplomado);
        $arraytiempocursadosupdiplomado = array_map("htmlspecialchars", $tiempocursadosupdiplomado);
        $arraymodaldaddiplomado = array_map("htmlspecialchars", $modaldaddiplomado);
        $arraydocumentorecibediplomado = array_map("htmlspecialchars", $documentorecibediplomado);
        $arrayasistecomodiplomado = array_map("htmlspecialchars", $asistecomodiplomado);
    
    
        foreach($arraynombreformaciondiplomado as $clavediplomado => $nombreformaciondiplomado){
            $nombreinstituciondiplomado = $arraynombreinstituciondiplomado[$clavediplomado];
            $fechainiciosupdiplomado = $arrayfechainiciosupdiplomado[$clavediplomado];
            $fechaterminosupdiplomado = $arrayfechaterminosupdiplomado[$clavediplomado];
            $tiempocursadosupdiplomado = $arraytiempocursadosupdiplomado[$clavediplomado];
            $modaldaddiplomado = $arraymodaldaddiplomado[$clavediplomado];
            $documentorecibediplomado = $arraydocumentorecibediplomado[$clavediplomado];
            $asistecomodiplomado = $arrayasistecomodiplomado[$clavediplomado];
        $datoDiplomado[] = '("' . $nombreformaciondiplomado . '", "' . $nombreinstituciondiplomado . '","' . $fechainiciosupdiplomado . '", "' . $fechaterminosupdiplomado . '", "' . $tiempocursadosupdiplomado . '", "' . $modaldaddiplomado . '", "' . $documentorecibediplomado . '", "' . $asistecomodiplomado . '","' . $id_user . '")';
            $sql = $conexionSeleccion->prepare("INSERT into diplomado(nombreDiplomado,nombreInstitucion,fechaInicio,fechaTermino,totalHoras,modalidad,documentoRecibe,asisteComo,id_empleado) values  " . implode(', ', $datoDiplomado));
        }
        $sql->execute();
    }
        if($nombreformacionaltaesp != '' and $nombrealtaespecialidad != ''){
        $arraynombreformacionaltaesp = array_map("htmlspecialchars", $nombreformacionaltaesp);
        $arraynombrealtaespecialidad = array_map("htmlspecialchars", $nombrealtaespecialidad);
        $arrayunidadhospaltaesp = array_map("htmlspecialchars", $unidadhospaltaesp);
        $arrayfechainicioaltaesp = array_map("htmlspecialchars", $fechainicioaltaesp);
        $arrayfechaterminoaltaesp = array_map("htmlspecialchars", $fechaterminoaltaesp);
        $arraytiempocursadoaltaesp = array_map("htmlspecialchars", $tiempocursadoaltaesp);
        $arraydocumentorecibealtaesp = array_map("htmlspecialchars", $documentorecibealtaesp);
        
        
        foreach($arraynombreformacionaltaesp as $clavedaltaesp => $nombreformacionaltaesp){
        
        $nombrealtaespecialidad = $arraynombrealtaespecialidad[$clavedaltaesp];
        $unidadhospaltaesp = $arrayunidadhospaltaesp[$clavedaltaesp];
        $fechainicioaltaesp = $arrayfechainicioaltaesp[$clavedaltaesp];
        $fechaterminoaltaesp = $arrayfechaterminoaltaesp[$clavedaltaesp];
        $tiempocursadoaltaesp = $arraytiempocursadoaltaesp[$clavedaltaesp];
        $documentorecibealtaesp = $arraydocumentorecibealtaesp[$clavedaltaesp];
        $datoOtrosAltaEsp[] = '("'.$nombreformacionaltaesp.'","' .$nombrealtaespecialidad. '","' .$unidadhospaltaesp . '","' .$fechainicioaltaesp . '","' .$fechaterminoaltaesp . '","' .$tiempocursadoaltaesp . '","' .$documentorecibealtaesp . '","' .$id_user . '")';
                
                $sql = $conexionSeleccion->prepare("INSERT INTO otrosestudiosaltaesp(nombreformacionaltaesp, nombrealtaespecialidad, unidadhospaltaesp, fechainicioaltaesp, fechaterminoaltaesp, tiempocursadoaltaesp, documentorecibealtaesp, id_postulado) VALUES " . implode(', ', $datoOtrosAltaEsp));
        }
                $sql->execute();
                foreach($_FILES["archivotituloaltaesp"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["archivotituloaltaesp"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = "Titulo alta especialidad";
                        $archivonombre = $_POST['nombreformacionaltaesp'][$key];
                        $fuente = $_FILES["archivotituloaltaesp"]["tmp_name"][$key]; 
                        
                        $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
                foreach($_FILES["cedulaAltaEsp"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["cedulaAltaEsp"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = "Cedula alta especialidad";
                        $archivonombre = $_POST['nombreformacionaltaesp'][$key];
                        $fuente = $_FILES["cedulaAltaEsp"]["tmp_name"][$key]; 
                        
                        $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
            }
        
        if($nombreformacionotros != '' and $nombreotrosestudiosuno != ''){
        $arraynombreformacionotros = array_map("htmlspecialchars", $nombreformacionotros);
        $arraynombreotrosestudiosuno = array_map("htmlspecialchars", $nombreotrosestudiosuno);
        $arrayfechainiciootrosestudiosuno = array_map("htmlspecialchars", $fechainiciootrosestudiosuno);
        $arrayfechaterminootrosestudiosuno = array_map("htmlspecialchars", $fechaterminootrosestudiosuno);
        $arraydocumentorecibeestudiosuno = array_map("htmlspecialchars", $documentorecibeestudiosuno);
        
        
        foreach($arraynombreformacionotros as $claveotros => $nombreformacionotros){
        $nombreotrosestudiosuno = $arraynombreotrosestudiosuno[$claveotros];
        $fechainiciootrosestudiosuno = $arrayfechainiciootrosestudiosuno[$claveotros];
        $fechaterminootrosestudiosuno = $arrayfechaterminootrosestudiosuno[$claveotros];
        $documentorecibeestudiosuno = $arraydocumentorecibeestudiosuno[$claveotros];
        $datoOtrosEstudios[] = '("'.$nombreformacionotros.'","' .$nombreotrosestudiosuno. '","' .$fechainiciootrosestudiosuno . '","' .$fechaterminootrosestudiosuno . '","' .$documentorecibeestudiosuno . '","' .$id_user . '")';
                
                $sql = $conexionSeleccion->prepare("INSERT INTO otrosestudios(nombreformacionotros, nombreotrosestudiosuno, fechainiciootrosestudiosuno, fechaterminootrosestudiosuno, documentorecibeestudiosuno, id_postulado) VALUES " . implode(', ', $datoOtrosEstudios));
        }
                $sql->execute();
                foreach($_FILES["archivootrosuno"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["archivootrosuno"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = "Documento otros estudios";
                        $archivonombre = $_POST['nombreformacionotros'][$key];
                        $fuente = $_FILES["archivootrosuno"]["tmp_name"][$key]; 
                        
                        $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
        }
                
        
                $sql = $conexionSeleccion->prepare("INSERT INTO socialpracticas(nombreserviciosocial, fechainicioservicio, fechaterminoservicio, laboresservicio, documentorecibeservicio,
                        nombrepracticas, fechainiciopracticas, fechaterminopracticas, laborespracticas, documentorecibepracticas, id_postulado) 
                        VALUES(:nombreserviciosocial,:fechainicioservicio,:fechaterminoservicio,:laboresservicio,:documentorecibeservicio,
                        :nombrepracticas,:fechainiciopracticas, :fechaterminopracticas,:laborespracticas, :documentorecibepracticas, :id_postulado)");
                $sql->execute(array(
                    ':nombreserviciosocial' => $nombreserviciosocial,
                    ':fechainicioservicio' => $fechainicioservicio,
                    ':fechaterminoservicio' => $fechaterminoservicio,
                    ':laboresservicio' => $laboresservicio,
                    ':documentorecibeservicio' => $documentorecibeservicio,
                    ':nombrepracticas' => $nombrepracticas,
                    ':fechainiciopracticas' => $fechainiciopracticas,
                    ':fechaterminopracticas' => $fechaterminopracticas,
                    ':laborespracticas' => $laborespracticas,
                    ':documentorecibepracticas' => $documentorecibepracticas,
                    ':id_postulado' => $id_user
                ));
                if ($_FILES["archivoservsocial"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    if (in_array($_FILES["archivoservsocial"]["type"], $permitidos) && $_FILES["archivoservsocial"]["size"]) {
        
                        $ruta = '../documentos/'.$id_user. '/';
                        $archivo = $ruta . $_FILES["archivoservsocial"]["name"] = "Documento servicio social.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivoservsocial"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
                if ($_FILES["archivopracticas"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    if (in_array($_FILES["archivopracticas"]["type"], $permitidos) && $_FILES["archivopracticas"]["size"]) {
        
                        $ruta = '../documentos/' .$id_user . '/';
                        $archivo = $ruta . $_FILES["archivopracticas"]["name"] = "Documento practicas profesionales.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivopracticas"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
        if($nombrecertificacionuno != '' and $nombreinstitucioncertificacion != ''){
        
        $arraynombreformacioncertificacion = array_map("htmlspecialchars", $nombrecertificacionuno);
        $arraynombreinstitucioncertificacion = array_map("htmlspecialchars", $nombreinstitucioncertificacion);
        $arrayfechainiciosupcertificacion = array_map("htmlspecialchars", $fechainiciocertificacionuno);
        $arrayfechaterminosupcertificacion = array_map("htmlspecialchars", $fechaterminocertificacionuno);
        $arraytiempocursadosupcertificacion = array_map("htmlspecialchars", $tiempocursadocertificacion);
        $arraymodalidadcertificacion = array_map("htmlspecialchars", $modalidadceertificacion);
        $arraydocumentorecibecertificacion = array_map("htmlspecialchars", $documentocertificacionuno);
        
        foreach($arraynombreformacioncertificacion as $clavecertificacion => $nombrecertificacionuno){
        $nombreinstitucioncertificacion = $arraynombreinstitucioncertificacion[$clavecertificacion];
        $fechainiciocertificacionuno = $arrayfechainiciosupcertificacion[$clavecertificacion];
        $fechaterminocertificacionuno = $arrayfechaterminosupcertificacion[$clavecertificacion];
        $tiempocursadocertificacion = $arraytiempocursadosupcertificacion[$clavecertificacion];
        $modalidadceertificacion = $arraymodalidadcertificacion[$clavecertificacion];
        $documentocertificacionuno = $arraydocumentorecibecertificacion[$clavecertificacion];
        $DatoCertificacion[] = '("'.$nombreinstitucioncertificacion.'","' .$nombrecertificacionuno. '","' .$fechainiciocertificacionuno . '","' .$fechaterminocertificacionuno . '","' .$tiempocursadocertificacion . '","' .$modalidadceertificacion . '","' .$documentocertificacionuno . '","' .$id_user . '")';
                    
        $sql = $conexionSeleccion->prepare("INSERT INTO cerficacion(nombreformacioncertificauno, nombrecertificacionuno, fechainiciocertificacionuno, fechaterminocertificacionuno,tiempocursadosupcertificacion,modalidadcertificacion,documentorecibecertificacion,id_postulado)
                    VALUES " . implode(', ', $DatoCertificacion));
        }
        $sql->execute();
        foreach($_FILES["archivocertificacion"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["archivocertificacion"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = "Documento certificacion";
                        $archivonombre = $_POST['nombrecertificacionuno'][$key];
                        $fuente = $_FILES["archivocertificacion"]["tmp_name"][$key]; 
                        
                        $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
        }
        
                $sql = $conexionSeleccion->prepare("INSERT INTO explaboralpublico(empresauno, cbx_dependenciauno, puestoempresauno, tipopuestouno, empresadirecionuno, telcontactouno, extencionuno, jefedirectouno, motivoseparacionuno, funcionespricipalesuno, fechainiciouno, fechaterminouno, 
                    empresados,cbx_dependenciados,puestoempresados,tipopuestodos,empresadirecdos, telcontactodos,extenciondos,jefedirectodos,motivoseparaciondos,funcionespricipalesdos,fechainicidos,fechaterminodos,
                    empresatres, cbx_dependenciatres,puestoempresatres, tipopuestotres, empresadirectres,telcontactotres,extenciontres,jefedirectotres, motivoseparaciontres,funcionespricipalestres, fechainiciotres,fechaterminotres,id_postulado)
                    VALUES(:empresauno,:cbx_dependenciauno,:puestoempresauno,:tipopuestouno,:empresadirecionuno,:telcontactouno,:extencionuno,:jefedirectouno,:motivoseparacionuno,:funcionespricipalesuno,:fechainiciouno,:fechaterminouno,
                    :empresados,:cbx_dependenciados,:puestoempresados,:tipopuestodos, :empresadirecdos,:telcontactodos, :extenciondos,:jefedirectodos,:motivoseparaciondos, :funcionespricipalesdos,:fechainicidos,:fechaterminodos,
                    :empresatres, :cbx_dependenciatres, :puestoempresatres, :tipopuestotres, :empresadirectres,:telcontactotres, :extenciontres, :jefedirectotres, :motivoseparaciontres, :funcionespricipalestres, :fechainiciotres,:fechaterminotres,:id_postulado)");
                $sql->execute(array(
                    ':empresauno' => $cbx_empresaone,
                    ':cbx_dependenciauno' => $cbx_dependenciaone,
                    ':puestoempresauno' => $puestoempresauno,
                    ':tipopuestouno' => $empresa,
                    ':empresadirecionuno' => $empresadirecionuno,
                    ':telcontactouno' => $telcontactouno,
                    ':extencionuno' => $extencionuno,
                    ':jefedirectouno' => $jefedirectouno,
                    ':motivoseparacionuno' => $motivoseparacionuno,
                    ':funcionespricipalesuno' => $funcionespricipalesuno,
                    ':fechainiciouno' => $fechainiciouno,
                    ':fechaterminouno' => $fechaterminouno,
                    ':empresados' => $cbx_empresados,
                    ':cbx_dependenciados' => $cbx_dependenciados,
                    ':puestoempresados' => $puestoempresados,
                    ':tipopuestodos' => $tipopuestodos,
                    ':empresadirecdos' => $empresadirecdos,
                    ':telcontactodos' => $telcontactodos,
                    ':extenciondos' => $extenciondos,
                    ':jefedirectodos' => $jefedirectodos,
                    ':motivoseparaciondos' => $motivoseparaciondos,
                    ':funcionespricipalesdos' => $funcionespricipalesdos,
                    ':fechainicidos' => $fechainicidos,
                    ':fechaterminodos' => $fechaterminodos,
                    ':empresatres' => $cbx_empresatres,
                    ':cbx_dependenciatres' => $cbx_dependenciatres,
                    ':puestoempresatres' => $puestoempresatres,
                    ':tipopuestotres' => $tipopuestotres,
                    ':empresadirectres' => $empresadirectres,
                    ':telcontactotres' => $telcontactotres,
                    ':extenciontres' => $extenciontres,
                    ':jefedirectotres' => $jefedirectotres,
                    ':motivoseparaciontres' => $motivoseparaciontres,
                    ':funcionespricipalestres' => $funcionespricipalestres,
                    ':fechainiciotres' => $fechainiciotres,
                    ':fechaterminotres' => $fechaterminotres,
                    ':id_postulado' => $id_user
                ));
                if ($_FILES["archivoexplaboralpublicoone1"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    if (in_array($_FILES["archivoexplaboralpublicoone1"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicoone1"]["size"]) {
        
                        $ruta = '../documentos/' .$id_user. '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicoone1"]["name"] = "exp laboral publico primero 1.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicoone1"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
        
                if ($_FILES["archivoexplaboralpublicotwo1"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    if (in_array($_FILES["archivoexplaboralpublicotwo1"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicotwo1"]["size"]) {
        
                        $ruta = '../documentos/' .$id_user. '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicotwo1"]["name"] = "exp laboral publico primero 2.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicotwo1"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
        
                if ($_FILES["archivoexplaboralpublicoone2"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    if (in_array($_FILES["archivoexplaboralpublicoone2"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicoone2"]["size"]) {
        
                        $ruta = '../documentos/' .$id_user. '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicoone2"]["name"] = "exp laboral publico segundo 1.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicoone2"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
                if ($_FILES["archivoexplaboralpublicotwo2"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    if (in_array($_FILES["archivoexplaboralpublicotwo2"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicotwo2"]["size"]) {
        
                        $ruta = '../documentos/' .$id_user. '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicotwo2"]["name"] = "exp laboral publico segundo 2.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicotwo2"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
                if ($_FILES["archivoexplaboralpublicoone3"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    if (in_array($_FILES["archivoexplaboralpublicoone3"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicoone3"]["size"]) {
        
                        $ruta = '../documentos/' .$id_user. '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicoone3"]["name"] = "exp laboral publico tercero 1.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicoone3"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
                if ($_FILES["archivoexplaboralpublicotwo3"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    if (in_array($_FILES["archivoexplaboralpublicotwo3"]["type"], $permitidos) && $_FILES["archivoexplaboralpublicotwo3"]["size"]) {
        
                        $ruta = '../documentos/' .$id_user. '/';
                        $archivo = $ruta . $_FILES["archivoexplaboralpublicotwo3"]["name"] = "exp laboral publico tercero 2.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivoexplaboralpublicotwo3"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
            if($nombrelaboralprivada != '' and $tipopuestoprivada != ''){
                $arraynombrelaboralprivada  = array_map("htmlspecialchars", $nombrelaboralprivada);
                $arraytipopuestoprivada  = array_map("htmlspecialchars", $tipopuestoprivada);
                $arraydireccionempresaprivada  = array_map("htmlspecialchars", $direccionempresaprivada);
                $arraytelefonoempresaprivada  = array_map("htmlspecialchars", $telefonoempresaprivada);
                $arrayextencionempresaprivada  = array_map("htmlspecialchars", $extencionempresaprivada);
                $arraynombrejefeprivada  = array_map("htmlspecialchars", $nombrejefeprivada);
                $arraymotivoseparacionprivada  = array_map("htmlspecialchars", $motivoseparacionprivada);
                $arrayfuncionesprivada  = array_map("htmlspecialchars", $funcionesprivada);
                $arrayfechainicioprivada  = array_map("htmlspecialchars", $fechainicioprivada);
                $arrayfechaterminoprivada  = array_map("htmlspecialchars", $fechaterminoprivada);
        
                foreach($arraynombrelaboralprivada as $claveprivada => $nombrelaboralprivada){
                    $tipopuestoprivada = $arraytipopuestoprivada[$claveprivada];
                    $direccionempresaprivada = $arraydireccionempresaprivada[$claveprivada];
                    $telefonoempresaprivada = $arraytelefonoempresaprivada[$claveprivada];
                    $extencionempresaprivada = $arrayextencionempresaprivada[$claveprivada];
                    $nombrejefeprivada = $arraynombrejefeprivada[$claveprivada];
                    $motivoseparacionprivada = $arraymotivoseparacionprivada[$claveprivada];
                    $funcionesprivada = $arrayfuncionesprivada[$claveprivada];
                    $fechainicioprivada = $arrayfechainicioprivada[$claveprivada];
                    $fechaterminoprivada = $arrayfechaterminoprivada[$claveprivada];
        
                $datoPrivada[] = '("' . $nombrelaboralprivada . '", "' . $tipopuestoprivada . '","' . $direccionempresaprivada . '", "' . $telefonoempresaprivada . '", "' . $extencionempresaprivada . '", "' . $nombrejefeprivada . '", "' . $motivoseparacionprivada . '", "' . $funcionesprivada . '","' . $fechainicioprivada . '","' . $fechaterminoprivada . '","' . $id_user . '")';
        
                $sql = $conexionSeleccion->prepare("INSERT INTO explaboralprivado(nombrelaboralprivada, tipopuestoprivada, direccionempresaprivada, telefonoempresaprivada, extencionempresaprivada, nombrejefeprivada, motivoseparacionprivada, funcionesprivada, fechainicioprivada, fechaterminoprivada, id_postulado) values  " . implode(', ', $datoPrivada));
                }
                $sql->execute();
                foreach($_FILES["archivoexplaboralprivadoone1"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["archivoexplaboralprivadoone1"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = "Documento exp laboral privada 1";
                        $archivonombre = $_POST['nombrelaboralprivada'][$key];
                        $fuente = $_FILES["archivoexplaboralprivadoone1"]["tmp_name"][$key]; 
                        
                        $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
                foreach($_FILES["archivoexplaboralprivadotwo1"]['tmp_name'] as $key => $tmp_name)
                {
                    //condicional si el fuchero existe
                    if($_FILES["archivoexplaboralprivadotwo1"]["name"][$key]) {
                        // Nombres de archivos de temporales
                        $nombredelarchivo = "Documento exp laboral privada 2";
                        $archivonombre = $_POST['nombrelaboralprivada'][$key];
                        $fuente = $_FILES["archivoexplaboralprivadotwo1"]["tmp_name"][$key];
                        
                        $carpeta = '../documentos/' .$id_user. '/'; //Declaramos el nombre de la carpeta que guardara los archivos
                        
                        if(!file_exists($carpeta)){
                            mkdir($carpeta) or die("Hubo un error al crear el directorio de almacenamiento");	
                        }
                        
                        $dir=opendir($carpeta);
                        $target_path = $carpeta.'/'.$nombredelarchivo.' '.$archivonombre.'.pdf'; //indicamos la ruta de destino de los archivos
                        
                
                        if(file_exists($carpeta)) {	
                            move_uploaded_file($fuente, $target_path);
                            
                            } else {	
                            echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                        }
                        closedir($dir); //Cerramos la conexion con la carpeta destino
                    }
                }
            }
        
        
                $sql = $conexionSeleccion->prepare("INSERT INTO cientificaidioma(nombrepublicacion, tiempopublicacion, publicadoen, paisdepublicacion,
                        nombreidioma, nivel, niveldedominio, documentoacredita, otrashabilidades, id_postulado)
                        VALUES(:nombrepublicacion,:tiempopublicacion,:publicadoen,:paisdepublicacion,
                        :nombreidioma, :nivel,:niveldedominio, :documentoacredita,:otrashabilidades, :id_postulado)");
                $sql->execute(array(
                    ':nombrepublicacion' => $nombrepublicacion,
                    ':tiempopublicacion' => $tiempopublicacion,
                    ':publicadoen' => $publicadoen,
                    ':paisdepublicacion' => $paisdepublicacion,
                    ':nombreidioma' => $nombreidioma,
                    ':nivel' => $nivel,
                    ':niveldedominio' => $niveldedominio,
                    ':documentoacredita' => $documentoacredita,
                    ':otrashabilidades' => $otrashabilidades,
                    ':id_postulado' => $id_user
                ));
                $sql = $conexionSeleccion->prepare("INSERT INTO manifiesto(familiaresenhraei, autorizodatoscorreo, autorizodatostelefono, autorizodatosgenerales,id_postulado)
                    VALUES(:familiaresenhraei,:autorizodatoscorreo,:autorizodatostelefono,:autorizodatosgenerales,:id_postulado)");
                $sql->execute(array(
                    ':familiaresenhraei' => $selCombo,
                    ':autorizodatoscorreo' => $correo_elect,
                    ':autorizodatostelefono' => $telefono_enlace,
                    ':autorizodatosgenerales' => $selCombo5,
                    ':id_postulado' => $id_user
                ));
                
                if ($_FILES["archivootrosuno"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'comprobante otro estudio';
                    if (in_array($_FILES["archivootrosuno"]["type"], $permitidos) && $_FILES["archivootrosuno"]["size"]) {
        
                        $ruta = '../documentos/' .$id_user. '/';
                        $archivo = $ruta . $_FILES["archivootrosuno"]["name"] = "comprobante otro estudio.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivootrosuno"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
                
        
               
                if ($_FILES["archivoactualizacionacademicauno"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'documento actualizacion academica uno';
                    if (in_array($_FILES["archivoactualizacionacademicauno"]["type"], $permitidos) && $_FILES["archivoactualizacionacademicauno"]["size"]) {
        
                        $ruta = '../documentos/' .$id_user. '/';
                        $archivo = $ruta . $_FILES["archivoactualizacionacademicauno"]["name"] = "comprobante actualizacion academica uno.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivoactualizacionacademicauno"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
                if ($_FILES["archivoactualizacionacademicados"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'documento actualizacion academica dos';
                    if (in_array($_FILES["archivoactualizacionacademicados"]["type"], $permitidos) && $_FILES["archivoactualizacionacademicados"]["size"]) {
        
                        $ruta = '../documentos/' .$id_user. '/';
                        $archivo = $ruta . $_FILES["archivoactualizacionacademicados"]["name"] = "comprobante actualizacion academica dos.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivoactualizacionacademicados"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
                if ($_FILES["archivoactualizacionacademicatres"]["error"] > 0) {
                } else {
        
                    $permitidos = array("application/pdf");
                    $compdomicilio = 'documento actualizacion academica tres';
                    if (in_array($_FILES["archivoactualizacionacademicatres"]["type"], $permitidos) && $_FILES["archivoactualizacionacademicatres"]["size"]) {
        
                        $ruta = '../documentos/' .$id_user. '/';
                        $archivo = $ruta . $_FILES["archivoactualizacionacademicatres"]["name"] = "comprobante actualizacion academica tres.pdf";
        
        
                        if (!file_exists($ruta)) {
                            mkdir($ruta);
                        }
        
                        if (!file_exists($archivo)) {
        
                            $resultado = @move_uploaded_file($_FILES["archivoactualizacionacademicatres"]["tmp_name"], $archivo);
                        } else {
                        }
                    }
                }
        
        $sql = $conexionSeleccion->prepare("UPDATE datospersonales set datosActualizados = :datosActualizados where id_datopersonal = :id_datopersonal");
        $sql->execute(array(
            ':datosActualizados'=>1,
            ':id_datopersonal' =>$id_user
        ));
        $sql = $conexionSeleccion->prepare("INSERT INTO datoscomplementos(id_postulado) values(:id_postulado)");
            $sql->execute(array(
                ':id_postulado' => $id_user
            ));
            
$validatransac = $conexionSeleccion->commit();
        if($validatransaccion != false){
            echo "<script>Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Tus datos han sido enviados exitosamente',
                showConfirmButton: false,
                timer: 1500
            })</script>";
        }
        } catch (Exception $e) {
            $conexionSeleccion->rollBack();
            echo "<script>Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Error al enviar tus datos',
                showConfirmButton: false,
                timer: 1500
            })</script>";
        }
        
