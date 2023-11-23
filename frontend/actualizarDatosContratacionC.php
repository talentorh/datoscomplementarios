<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="apple-mobile-web-app-title" content="CodePen">
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
    <link rel="canonical" href="https://codepen.io/atakan/pen/nPOZZR">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="iconos/css/all.min.css?n=1">
    <link rel="stylesheet" href="iconos/css/all.css?n=1">

</head>

<body onload="deshabilitaRetroceso()">
  <!-- multistep form -->
  <form id="msform" method="POST" action="aplicacion/actualizarDatosContratacion" enctype="multipart/form-data">
  <div class="container" style="border: 1px solid black; padding: 0px; border-radius: 10px;">
<header style="width: 100%; height: auto;  padding: 10px; text-align: center; color: white; font-size: 17px; background: #1072b3; border-radius: 10px 10px 0px 0px;">
        <p>Hospital Regional de Alta Especialidad de Ixtapaluca.</p>
    </header>
<div class="form-row" style="padding: 15px;">

<input type="hidden" value="<?php echo $dataRegistro['id_principal'] ?>" class="form-control" name="id_user"> 
        <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
            <label>Constancia de Situación Fiscal (SAT)</label>
        </div>
        <div class="col-md-6">
        <strong>Actividad economica</strong>
    <input type="text" value="Asalariado" class="form-control" name="actividadeconomica" readonly>
    </div>
    <div class="col-md-6">
        <strong>Regimen</strong>
    <input type="text" value="Regimen de Sueldos y Salarios e Ingresos Asimilados a Salarios" class="form-control" name="regimen" readonly>
    </div>
   
    <div class=" col-md-6">
        <label>Sube tu Constancia de situación fiscal</label>
    <input type="file"  class="form-control" name="documentoactvidadeconomica" accept=".pdf" >
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>Constancia</strong>
    <?php
    $curp = $dataRegistro['id_principal'];
    $acteconomica = 'documentoactvidadeconomica';
    $path = "documentos/" . $acteconomica . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$acteconomica$curp/$archivo' class='form-control' style='height: 150px;'></iframe>";
                echo "<a href='documentos/$acteconomica$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                echo "<a href='eliminarDocumentacion/constanciaFiscal?curp=$curp'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-6">
        <strong>Sube tu Acta de nacimiento</strong>
        <input type="file"  class="form-control" name="documentoactanacimiento" accept=".pdf" >
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>Acta de nacimiento</strong>
    <?php
    $curp = $dataRegistro['id_principal'];
    $actanacimiento = 'documentoactanacimiento';
    $path = "documentos/" . $actanacimiento . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$actanacimiento$curp/$archivo' class='form-control' style='height: 150px;'></iframe>";
                echo "<a href='documentos/$actanacimiento$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarActanacimiento?curp=$curp'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-6">
        <strong>Sube tu INE</strong>
        <input type="file"  class="form-control" name="documentoine" accept=".pdf" >
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>INE</strong>
    <?php
    $curp = $dataRegistro['id_principal'];
    $ine = 'documentoine';
    $path = "documentos/" . $ine . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$ine$curp/$archivo' class='form-control' style='height: 150px;'></iframe>";
                echo "<a href='documentos/$ine$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarIne?curp=$curp'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-6">
        <strong>Sube tu cartilla</strong>
        <input type="file"  class="form-control" name="documentocartilla" accept=".pdf" >
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>Cartilla</strong>
    <?php
    $curp = $dataRegistro['id_principal'];
    $cartilla = 'documentocartilla';
    $path = "documentos/" . $cartilla . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$cartilla$curp/$archivo' class='form-control' style='height: 150px;'></iframe>";
                echo "<a href='documentos/$cartilla$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarCartilla?curp=$curp'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-6">
        <strong>Firma electronica</strong>
        <input type="file"  class="form-control" name="documentofirmaelectonica" accept=".zip" >
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>Firma electronica</strong>
    <?php
    $curp = $dataRegistro['id_principal'];
    $firmaelectronica = 'documentofirmaelectonica';
    $path = "documentos/" . $firmaelectronica . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                //echo "<iframe src='documentos/$firmaelectronica$curp/$archivo' class='form-control' style='height: 150px;'></iframe>";
                echo "<a href='documentos/$firmaelectronica$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar' class='fas fa-file-archive' style='font-size: 25px;'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarFirmaElectronica?curp=$curp'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-6">
        <strong>Clave interbancaria</strong>
        <input type="file"  class="form-control" name="documentoclaveinterbancaria" accept=".pdf" >
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>Clave interbancaria</strong>
    <?php
    $curp = $dataRegistro['id_principal'];
    $claveinter = 'documentoclaveinterbancaria';
    $path = "documentos/" . $claveinter . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$claveinter$curp/$archivo' class='form-control' style='height: 150px;'></iframe>";
                echo "<a href='documentos/$claveinter$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf' style='font-size: 25px;'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarClaveInterbancaria?curp=$curp'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
        
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Datos personales</label>
    </div>
    <div class="col-md-3">
        <strong>Profesion</strong>
    <input type="text" value="<?php echo $dataRegistro['profesion'] ?>" class="form-control" name="profesion">
    </div>
    <div class="col-md-3">
        <strong>Nombre</strong>
<input type="text" value="<?php echo $dataRegistro['nombre'] ?>" class="form-control" name="nombre">
    </div>
    <div class="col-md-3">
        <strong>Apellido paterno</strong>
<input type="text" value="<?php echo $dataRegistro['appaterno'] ?>" class="form-control" name="appaterno">
    </div>
    <div class="col-md-3">
        <strong>Apellido materno</strong>
<input type="text" value="<?php echo $dataRegistro['apmaterno'] ?>" class="form-control" name="apmaterno">
    </div>
    <script>
        function deleteSp() {
    var inputs = $("input[type=text]");
    for (var i = 0; i < inputs.length; i++) {
        var aux = $(inputs[i]).val().trim();
        $(inputs[i]).val(aux);
    }
}
function deleteSpmail() {
    var inputs = $("input[type=email]");
    for (var i = 0; i < inputs.length; i++) {
        var aux = $(inputs[i]).val().trim();
        $(inputs[i]).val(aux);
    }
}
    </script>
    <div class="col-md-3">
        <strong>CURP</strong>
    <input type="text" value="<?php echo $dataRegistro['curp'] ?>" onkeyup="deleteSp();" class="form-control" name="curp" minlength="18" maxlength="18">
    </div>
    <div class="form-group col-md-3">
        <label>Sube tu CURP</label>
    <input type="file"  class="form-control" name="documentocurp" accept=".pdf" >
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento CURP</strong>
    <?php
    $curp = $dataRegistro['id_principal'];
    $compdomicilio = 'documentocurp';
    $path = "documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$curp/$archivo' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarCurp?curp=$curp'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-3">
        <strong>R.F.C</strong>
    <input type="text" value="<?php echo $dataRegistro['rfcprincipal'] ?>" onkeyup="deleteSp();" class="form-control" name="rfc" minlength="13" maxlength="13">
    </div>
    <div class="col-md-3">
        <strong>Correo electronico</strong>
    <input type="email" value="<?php echo $dataRegistro['correoelectronico'] ?>" onkeyup="deleteSpmail();" class="form-control" name="correo">
    </div>
    <div class="col-md-3">
        <strong>Estado</strong>
    <input type="text" value="<?php echo $dataRegistro['estado'] ?>" class="form-control" name="estado">
    </div>


    <div class="col-md-3">
        <strong>Doc. comprobante de domicilio</strong>
    <input type="file"  class="form-control" name="comprobantedomicilio" accept=".pdf">
    </div>

    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Comprobante de domicilio</strong>
    <?php
    $curp = $dataRegistro['id_principal'];
    $compdomicilio = 'comprobantedomicilio';
    $path = "documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$curp/$archivo' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarCompDomicilio?curp=$curp'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-3">
        <strong>Delegacón</strong>
    <input type="text" value="<?php echo $dataRegistro['delegacion'] ?>" class="form-control" name="municipio">
    </div>
    <div class="col-md-3">
        <strong>Localidad</strong>
    <input type="text" value="<?php echo $dataRegistro['localidad'] ?>" class="form-control" name="localidad">
    </div>
    <div class="col-md-3">
        <strong>Colonia</strong>
    <input type="text" value="<?php echo $dataRegistro['colonia'] ?>" class="form-control" name="colonia">
    </div>
    <div class="col-md-3">
        <strong>Calle</strong>
    <input type="text" value="<?php echo $dataRegistro['calle'] ?>" class="form-control" name="calle">
    </div>
    <div class="col-md-3">
        <strong>Num exterior</strong>
    <input type="text" value="<?php echo $dataRegistro['numexterior'] ?>" class="form-control" name="numexterior">
    </div>
    <div class="col-md-3">
        <strong>Num interior</strong>
    <input type="text" value="<?php echo $dataRegistro['numinterior'] ?>" class="form-control" name="numinterior">
    </div>
    <div class="col-md-3">
        <strong>C.P</strong>
    <input type="text" value="<?php echo $dataRegistro['codigopostal'] ?>" class="form-control" name="codigopostal">
    </div>
    <div class="col-md-3">
        <strong>Fecha de nacimiento</strong>
    <input type="date" value="<?php echo $dataRegistro['fechanacimiento'] ?>" class="form-control" name="fechanacimiento">
    </div>
    <div class="col-md-3">
        <strong>Entidad de nacimiento</strong>
    <input type="text" value="<?php echo $dataRegistro['entidadnacimiento'] ?>" class="form-control" name="entidadnacimiento">
    </div>
    <div class="col-md-3">
        <strong>Sexo</strong>
    <input type="text" value="<?php echo $dataRegistro['sexo'] ?>" class="form-control" name="sexo">
    </div>
    <div class="col-md-3">
        <strong>Carta naturalizacion</strong>
    <input type="text" value="<?php echo $dataRegistro['cartanaturalizacion'] ?>" class="form-control" name="naturalizacion">
    </div>
    <div class="col-md-3">
        <strong>Telefono de casa</strong>
    <input type="text" value="<?php echo $dataRegistro['telefonocasa'] ?>" class="form-control" name="telefonocasa">
    </div>
    <div class="col-md-3">
        <strong>Telefono celular</strong>
    <input type="text" value="<?php echo $dataRegistro['telefonocelular'] ?>" class="form-control" name="telefonocelular">
    </div>
    <div class="col-md-3">
        <strong>Otro telefono</strong>
    <input type="text" value="<?php echo $dataRegistro['otrotelefono'] ?>" class="form-control" name="otrotelefono">
    </div>

    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Educación Media Superior</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreformacionmedia'] ?>" class="form-control" name="nombreformacionmedia">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombremediasuperior'] ?>" class="form-control" name="nombremediasuperior">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainicio'] ?>" class="form-control" name="fechainicio">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechatermino'] ?>" class="form-control" name="fechatermino">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistro['tiempocursado'] ?>" class="form-control" name="tiempocursado">
    </div>

    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistro['documentomediosuperior'] ?>" class="form-control" name="documentomediosuperior">
    </div>

    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivomediasuperior" accept=".pdf">
    </div>
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento certificado</strong>
    <?php
    $id = $dataRegistro['id_principal'];
    $archivoNombre = $dataRegistro['nombreformacionmedia'];
    $path = "documentos/" . $archivoNombre . $id;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$archivoNombre$id/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$archivoNombre$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarCertificado?curp=$id'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
    <label>Nivel tecnico</label>
            </div>

                <div class="col-md-6">
                    <label>Nombre de la formación académica</label>
                    <input type="text" id="nombreinstituciontecnica" name="nombreinstituciontecnica" value="<?php echo $dataRegistro['nombreinstituciontecnica'] ?>" autocomplete="off" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Nombre de la institución educativa</label>
                    <input type="text" id="nombreformaciontecnica" name="nombreformaciontecnica" value="<?php echo $dataRegistro['nombreformaciontecnica'] ?>" autocomplete="off" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Fecha de inicio</label>
                    <input type="date" id="fechainiciotecnico" name="fechainiciotecnico" value="<?php echo $dataRegistro['fechainiciotecnico'] ?>" autocomplete="off" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Fecha término</label>
                    <input type="date" id="fechaterminotecnico" name="fechaterminotecnico" value="<?php echo $dataRegistro['fechaterminotecnico'] ?>" autocomplete="off" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Años cursados</label>
                    <input type="text" id="tiempocursadotecnico" name="tiempocursadotecnico" value="<?php echo $dataRegistro['tiempocursadotecnico'] ?>" autocomplete="off" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Documento que recibe</label>
                    <input type="text" id="documentotecnico" name="documentotecnico" value="<?php echo $dataRegistro['documentotecnico'] ?>" autocomplete="off" class="form-control">
        </div>
        <?php
$id = $dataRegistro['id_principal'];
    require_once 'claseConexion/conexion.php';

    $sql = $conexionSeleccion->prepare("SELECT * from estudiospostecnico where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistropostecnico):

    ?>

        <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Postecnico</label>
            </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Nombre de la formación académica</label>
                                    <input type="text" id="nombreformacionPostecnico" name="nombreformacionPostecnico[]" value="<?php echo $dataRegistropostecnico['nombreformacionpostecnico'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label>Nombre de la institución educativa</label>
                                    <input type="text" id="nombreinstitucionPostecnico" name="nombreinstitucionPostecnico[]" value="<?php echo $dataRegistropostecnico['nombreinstitucionpostecnico'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label>Fecha de inicio</label>
                                    <input type="date" id="fechainiciosupPostecnico" name="fechainiciosupPostecnico[]" value="<?php echo $dataRegistropostecnico['fechainiciosuppostecnico'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label>Fecha termino</label>
                                    <input type="date" id="fechaterminosupPostecnico" name="fechaterminosupPostecnico[]" value="<?php echo $dataRegistropostecnico['fechaterminosuppostecnico'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label>Años cursados</label>
                                    <input type="text" id="tiempocursadosupPostecnico" name="tiempocursadosupPostecnico[]" value="<?php echo $dataRegistropostecnico['tiempocursadosuppostecnico'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label>Documento que recibe</label>
                                    <input type="text" id="documentorecibePostecnico" name="documentorecibePostecnico[]" value="<?php echo $dataRegistropostecnico['documentorecibepostecnico'] ?>" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                    <strong>Sube tu documento</strong>
                                    <input type="file"  class="form-control" name="documentotitulopostecnico[]" accept=".pdf">
                                    </div>
                                    <div class="col-md-3">
                                    <strong>Sube tu cedula</strong>
                                    <input type="file"  class="form-control" name="documentocedulapostecnico[]" accept=".pdf">
                                    </div>
                                    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento titulo</strong>
    <?php
    $archivonombre = $dataRegistropostecnico['nombreformacionpostecnico'];
    $id_user = $dataRegistro['id_principal'];
    $path = 'documentos/'.$archivonombre.$id_user. '/';
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$archivonombre$id_user/$archivo' width='90' height='200' class='form-control'></iframe>";
                echo "<a href='documentos/$archivonombre$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarCedSuperior?titulo=$archivonombre&id=$id_user&archivo=$archivo'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
                    <?php endforeach; ?>      
                    <?php
$id = $dataRegistro['id_principal'];
require_once 'claseConexion/conexion.php';
    $sql = $conexionSeleccion->prepare("SELECT * from estudiossuperior where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroe):

    ?>
    <!-- inicia educacion superior -->
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Educación Superior</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistroe['nombreformacionsuperior'] ?>" class="form-control" name="nombreformacion[]">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistroe['nombresuperior'] ?>" class="form-control" name="nombreinstitucion[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistroe['fechasuperiorinicio'] ?>" class="form-control" name="fechainiciosup[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistroe['fechasuperiortermino'] ?>" class="form-control" name="fechaterminosup[]">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistroe['tiempocursadosuperior'] ?>" class="form-control" name="tiempocursadosup[]">
    </div>
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistroe['documentosuperior'] ?>" class="form-control" name="documentorecibe[]">
    </div>
    <div class="col-md-3">
        <strong>Sube tu Titulo</strong>
    <input type="file"  class="form-control" name="documentolicenciatura[]" accept=".pdf">
    </div>
    
    <div class="col-md-3">
        <strong>Numero de cedula</strong>
    <input type="text" value="<?php echo $dataRegistroe['numerocedulasuperior'] ?>" class="form-control" name="numerocedula[]">
    </div>
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="documentocedula[]" accept=".pdf">
    </div>
  
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento titulo</strong>
    <?php
    $archivonombre = $dataRegistroe['nombreformacionsuperior'];
    $id_user = $dataRegistro['id_principal'];
    $path = 'documentos/'.$archivonombre.$id_user. '/';
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$archivonombre$id_user/$archivo' width='90' height='200' class='form-control'></iframe>";
                echo "<a href='documentos/$archivonombre$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarCedSuperior?titulo=$archivonombre&id=$id_user&archivo=$archivo'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    
       
    <?php endforeach; ?>

    <?php
$id = $dataRegistro['id_principal'];
require_once 'claseConexion/conexion.php';

    $sql = $conexionSeleccion->prepare("SELECT * from estudiosmaestria where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroMaestria):

    ?>
<!--PRIMER MAESTRIA-->
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Maestria</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistroMaestria['nombreformacionmaestria'] ?>" class="form-control" name="nombreformacionmaestria[]">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistroMaestria['nombremaestria'] ?>" class="form-control" name="nombremaestria[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistroMaestria['fechamaestriainicio'] ?>" class="form-control" name="fechainiciomaestria[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistroMaestria['fechamaestriatermino'] ?>" class="form-control" name="fechaterminomaestria[]">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistroMaestria['tiempocursadomaestria'] ?>" class="form-control" name="tiempocursadomaestria[]">
    </div>
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistroMaestria['documentomaestria'] ?>" class="form-control" name="documentomaestria[]">
    </div>
    <div class="col-md-3">
        <strong>Sube tu titulo</strong>
    <input type="file"  class="form-control" name="documentotitulomaestria[]" accept=".pdf">
    </div>
    
    <div class="col-md-3">
        <strong>Numero de cedula</strong>
    <input type="text" value="<?php echo $dataRegistro['numerocedulamaestria'] ?>" class="form-control" name="cedulamaestria[]">
    </div>
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="documentocedulamaestria[]" accept=".pdf">
    </div>
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documentos</strong>
    <?php
    $archivonombre = $dataRegistroMaestria['nombreformacionmaestria'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" . $archivonombre . $id_user;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$archivonombre$id_user/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$archivonombre$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarComMae1?curp=$id_user'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    
    <?php endforeach; ?>
    <!--segunda maestria-->
    <?php
$id = $dataRegistro['id_principal'];
require_once 'claseConexion/conexion.php';  
    $sql = $conexionSeleccion->prepare("SELECT * from especialidad where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroEspecialidad):

    ?>

    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Posgrado/Especialidad</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistroEspecialidad['nombreformacionacademica'] ?>" class="form-control" name="nombreformacionposgradoespecialidad[]">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistroEspecialidad['nombreinstitucion'] ?>" class="form-control" name="nombreinstitucionposgradoespecialidad[]">
    </div>
    <div class="col-md-3">
        <strong>Unidad hospitalaria</strong>
    <input type="text" value="<?php echo $dataRegistroEspecialidad['unidadhospitalaria'] ?>" class="form-control" name="unidadhospitalariaposgradoespecialidad[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistroEspecialidad['fechainicioespecialidad'] ?>" class="form-control" name="fechainiciosupposgradoespecialidad[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistroEspecialidad['fechaterminoespecialidad'] ?>" class="form-control" name="fechaterminosupposgradoespecialidad[]">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistroEspecialidad['anioscursados'] ?>" class="form-control" name="tiempocursadosupposgradoespecialidad[]">
    </div>
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistroEspecialidad['documentorecibeespecialidad'] ?>" class="form-control" name="documentorecibeposgradoespecialidad[]">
    </div>
    <div class="col-md-3">
        <strong>Sube tu titulo</strong>
    <input type="file"  class="form-control" name="archivotituloposgrado[]" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Numero de cedula</strong>
    <input type="text" value="<?php echo $dataRegistroEspecialidad['numerocedulaespecialidad'] ?>" class="form-control" name="numerocedulaposgradoespecialidad[]">
    </div>
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="archivocedulaposgrado[]" accept=".pdf">
    </div>
    
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documentos</strong>
    <?php
    $archivonombre = $dataRegistroEspecialidad['nombreformacionacademica'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" . $archivonombre . $id_user;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$archivonombre$id_user/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$archivonombre$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarPosgrado?curp=$id_user'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    
    <?php endforeach; ?>
    <?php
$id = $dataRegistro['id_principal'];
require_once 'claseConexion/conexion.php';
    $sql = $conexionSeleccion->prepare("SELECT * from doctorado where id_empleado = :id_empleado");
        $sql->execute(array(
            ':id_empleado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroDoctorado):

    ?>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Docotorado/Subespecialidad</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistroDoctorado['nombreformaciondoctorado'] ?>" class="form-control" name="nombreformaciondoctorado[]">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistroDoctorado['nombreinstituciondoctorado'] ?>" class="form-control" name="nombreinstituciondoctorado[]">
    </div>
    <div class="col-md-3">
        <strong>Unidad hospitalaria</strong>
    <input type="text" value="<?php echo $dataRegistroDoctorado['unidadhospitalariadoctorado'] ?>" class="form-control" name="unidadhospitalariadoctorado[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistroDoctorado['fechainiciodoctorado'] ?>" class="form-control" name="fechainiciosupdoctorado[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistroDoctorado['fechaterminodoctorado'] ?>" class="form-control" name="fechaterminosupdoctorado[]">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistroDoctorado['anioscursadosdoctorado'] ?>" class="form-control" name="tiempocursadosupdoctorado[]">
    </div>
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistroDoctorado['documentorecibedoctorado'] ?>" class="form-control" name="documentorecibedoctorado[]">
    </div>
    <div class="col-md-3">
        <strong>Sube tu titulo</strong>
    <input type="file"  class="form-control" name="archivotitulodoctorado[]" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Numero de cedula</strong>
    <input type="text" value="<?php echo $dataRegistroDoctorado['numeroceduladoctorado'] ?>" class="form-control" name="numeroceduladoctorado[]">
    </div>
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="archivoceduladoctorado[]" accept=".pdf">
    </div>

    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento titulo</strong>
    <?php
    $archivonombre = $dataRegistroDoctorado['nombreformaciondoctorado'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" . $archivonombre . $id_user;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$archivonombre$id_user/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$archivonombre$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminaComDoc?curp=$curp'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <?php endforeach; ?>
    <?php
$id = $dataRegistro['id_principal'];
require_once 'claseConexion/conexion.php';
    $sql = $conexionSeleccion->prepare("SELECT * from otrosestudiosaltaesp where id_postulado = :id_postulado");
        $sql->execute(array(
            ':id_postulado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroOtrosEstAltaEsp):

    ?>
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Otros estudios/Alta Especialidad</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistroOtrosEstAltaEsp['nombreformacionaltaesp'] ?>" class="form-control" name="nombreformacionaltaesp[]">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistroOtrosEstAltaEsp['nombrealtaespecialidad'] ?>" class="form-control" name="nombrealtaespecialidad[]">
    </div>
    <div class="col-md-3">
        <strong>Unidad hospitalaria</strong>
    <input type="date" value="<?php echo $dataRegistroOtrosEstAltaEsp['unidadhospaltaesp'] ?>" class="form-control" name="unidadhospaltaesp[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistroOtrosEstAltaEsp['fechainicioaltaesp'] ?>" class="form-control" name="fechainicioaltaesp[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistroOtrosEstAltaEsp['fechaterminoaltaesp'] ?>" class="form-control" name="fechaterminoaltaesp[]">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistroOtrosEstAltaEsp['tiempocursadoaltaesp'] ?>" class="form-control" name="tiempocursadoaltaesp[]">
    </div>
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistroOtrosEstAltaEsp['documentorecibealtaesp'] ?>" class="form-control" name="documentorecibealtaesp[]">
    </div>
    <div class="col-md-3">
        <strong>Sube tu titulo</strong>
    <input type="file"  class="form-control" name="archivotituloaltaesp[]" accept=".pdf">
    </div>
    <!--
    <div class="col-md-3">
        <strong>Numero de cedula</strong>
    <input type="text" value="<?php echo $dataRegistroOtrosEstAltaEsp['numerocedulaespecialidad'] ?>" class="form-control" name="cedulaaltaesp[]">
    </div>
        -->
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="cedulaAltaEsp[]" accept=".pdf">
    </div>

    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento obtenido</strong>
    <?php
    $archivonombre = $dataRegistroOtrosEstAltaEsp['nombreformacionaltaesp'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" . $archivonombre . $id_user;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$archivonombre$id_user/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$archivonombre$id_user/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminaComproEspecialidad?curp=$curp'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <?php endforeach; ?>
    <?php
$id = $dataRegistro['id_principal'];
require_once 'claseConexion/conexion.php';
    $sql = $conexionSeleccion->prepare("SELECT * from otrosestudios where id_postulado = :id_postulado");
        $sql->execute(array(
            ':id_postulado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroOtrosEst):

    ?>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Otros estudios</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistroOtrosEst['nombreformacionotros'] ?>" class="form-control" name="nombreformacionotros[]">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistroOtrosEst['nombreotrosestudiosuno'] ?>" class="form-control" name="nombreotrosestudiosuno[]">
    </div>
    
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistroOtrosEst['fechainiciootrosestudiosuno'] ?>" class="form-control" name="fechainiciootrosestudiosuno[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistroOtrosEst['fechaterminootrosestudiosuno'] ?>" class="form-control" name="fechaterminootrosestudiosuno[]">
    </div>
    
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistroOtrosEst['documentorecibeestudiosuno'] ?>" class="form-control" name="documentorecibeestudiosuno[]">
    </div>
    
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivootrosuno" accept=".pdf">
    </div>
    
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento obtenido</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'comprobante otro estudio';
    $path = "documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminaotroEs1?curp=$curp'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <?php endforeach; ?>
    
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Servicio social</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la dependencia donde se realizó</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreserviciosocial'] ?>" class="form-control" name="nombreserviciosocial">
    </div>
    
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainicioservicio'] ?>" class="form-control" name="fechainicioservicio">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminoservicio'] ?>" class="form-control" name="fechaterminoservicio">
    </div>
    
    <div class="col-md-6">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistro['documentorecibeservicio'] ?>" class="form-control" name="documentorecibeservicio">
    </div>
    
    <div class="col-md-6">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivoservsocial" accept=".pdf">
    </div>
    <div class="col-md-12">
    <strong>Labores que desempeño</strong>
        <textarea name="laboresservicio" placeholder="Address" class="form-control" rows="7"><?php echo $dataRegistro['laboresservicio'] ?></textarea>
    </div>
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento servicio social</strong>
    <?php
    $id = $dataRegistro['id_principal'];
    $compdomicilio = 'documento servicio social';
    $path = "documentos/" . $compdomicilio . $id;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$id/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminardoSer?curp=$curp'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Practicas profesionales</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la dependencia donde se realizó</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrepracticas'] ?>" class="form-control" name="nombrepracticas">
    </div>
    
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciopracticas'] ?>" class="form-control" name="fechainiciopracticas">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminopracticas'] ?>" class="form-control" name="fechaterminopracticas">
    </div>
    
    <div class="col-md-6">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistro['documentorecibepracticas'] ?>" class="form-control" name="documentorecibepracticas">
    </div>
    
    <div class="col-md-6">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivopracticas" accept=".pdf">
    </div>
    <div class="col-md-12">
    <strong>Labores que desempeño</strong>
        <textarea name="laborespracticas" placeholder="Address" class="form-control" rows="7"><?php echo $dataRegistro['laborespracticas'] ?></textarea>
    </div>
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento practicas profesionales</strong>
    <?php
    $id = $dataRegistro['id_principal'];
    $compdomicilio = 'documento practicas profesionales';
    $path = "documentos/" . $compdomicilio . $id;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$id/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarPracticasP?curp=$curp'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    
    <?php
$id = $dataRegistro['id_principal'];
require_once 'claseConexion/conexion.php';
    $sql = $conexion->prepare("SELECT * from cerficacion where id_postulado = :id_postulado");
        $sql->execute(array(
            ':id_postulado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroCertificacion):

    ?>
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Certificación</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institución educativa</strong>
    <input type="text" value="<?php echo $dataRegistroCertificacion['nombreformacioncertificauno'] ?>" class="form-control" name="nombreinstitucioncertificacion[]">
    </div>
    <div class="col-md-6">
        <strong>Especialidad que certifica</strong>
    <input type="text" value="<?php echo $dataRegistroCertificacion['nombrecertificacionuno'] ?>" class="form-control" name="nombrecertificacionuno[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistroCertificacion['fechainiciocertificacionuno'] ?>" class="form-control" name="fechainiciocertificacionuno[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistroCertificacion['fechaterminocertificacionuno'] ?>" class="form-control" name="fechaterminocertificacionuno[]">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="date" value="<?php echo $dataRegistroCertificacion['tiempocursadosupcertificacion'] ?>" class="form-control" name="tiempocursadocertificacion[]">
    </div>
    <div class="col-md-3">
        <strong>Modalidad</strong>
    <input type="date" value="<?php echo $dataRegistroCertificacion['modalidadcertificacion'] ?>" class="form-control" name="modalidadceertificacion[]">
    </div>
    <div class="col-md-3">
        <strong>Documento que acredita</strong>
    <input type="text" value="<?php echo $dataRegistroCertificacion['documentorecibecertificacion'] ?>" class="form-control" name="documentocertificacionuno[]">
    </div>
    
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivocertificacion[]" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento certificación</strong>
    <?php
    $archivoNombre = $dataRegistroCertificacion['nombreformacioncertificauno'];
    $id = $dataRegistro['id_principal'];
    $path = "documentos/" . $archivoNombre . $id;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$archivoNombre$id/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$archivoNombre$id/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminaCertificado1?curp=$id'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <?php endforeach; ?>
    <?php
$id = $dataRegistro['id_principal'];
require_once 'claseConexion/conexion.php';
    $sql = $conexionSeleccion->prepare("SELECT * from explaboralprivado where id_postulado = :id_postulado");
        $sql->execute(array(
            ':id_postulado'=>$id
        ));
        $row = $sql->fetchAll();
        foreach($row as $dataRegistroExpLaboPrivado):

    ?>

  <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Exp laboral sector privado</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la empresa</strong>
    <input type="text" value="<?php echo $dataRegistroExpLaboPrivado['nombrelaboralprivada'] ?>" class="form-control" name="nombrelaboralprivada[]">
    </div>
    <div class="col-md-6">
        <strong>Tipo de puesto</strong>
    <input type="text" value="<?php echo $dataRegistroExpLaboPrivado['tipopuestoprivada'] ?>" class="form-control" name="tipopuestoprivada[]">
    </div>
    <div class="col-md-3">
        <strong>Dirección de la empresa</strong>
    <input type="text" value="<?php echo $dataRegistroExpLaboPrivado['direccionempresaprivada'] ?>" class="form-control" name="direccionempresaprivada[]">
    </div>
    <div class="col-md-3">
        <strong>Teléfono de contacto</strong>
    <input type="text" value="<?php echo $dataRegistroExpLaboPrivado['telefonoempresaprivada'] ?>" class="form-control" name="telefonoempresaprivada[]">
    </div>
    <div class="col-md-3">
        <strong>Extensión</strong>
    <input type="text" value="<?php echo $dataRegistroExpLaboPrivado['extencionempresaprivada'] ?>" class="form-control" name="extencionempresaprivada[]">
    </div>
    <div class="col-md-3">
        <strong>Nombre de su jefe directo</strong>
    <input type="text" value="<?php echo $dataRegistroExpLaboPrivado['nombrejefeprivada'] ?>" class="form-control" name="nombrejefeprivada[]">
    </div>
    <div class="col-md-6">
        <strong>Motivo de su sepación</strong>
    <input type="text" value="<?php echo $dataRegistroExpLaboPrivado['motivoseparacionprivada'] ?>" class="form-control" name="motivoseparacionprivada[]">
    </div>
    
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistroExpLaboPrivado['fechainicioprivada'] ?>" class="form-control" name="fechainicioprivada[]">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistroExpLaboPrivado['fechaterminoprivada'] ?>" class="form-control" name="fechaterminoprivada[]">
    </div>
    <div class="col-md-12">
        <strong>Funciones principales</strong>
    <textarea rows="7" class="form-control" name="funcionesprivada[]"><?php echo $dataRegistroExpLaboPrivado['funcionesprivada'] ?></textarea>
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 1</strong>
    <input type="file"  class="form-control" name="archivoexplaboralprivadoone1[]" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 2</strong>
    <input type="file"  class="form-control" name="archivoexplaboralprivadotwo1[]" accept=".pdf">
    </div>

    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 1</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral primero 1';
    $path = "documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarExperiencia1?curp=$curp'> <i title='Eliminar archivo 1' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 2</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral primero 2';
    $path = "documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarExperiencia1_2?curp=$curp'> <i title='Eliminar archivo 2' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <?php endforeach; ?>
    
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Exp laboral sector publico</label>
    </div>
    <div class="col-md-6">
        <strong>Secretaría de Estado</strong>
    <input type="text" value="<?php echo $dataRegistro['empresauno'] ?>" class="form-control" name="empresaone">
    </div>
    <div class="col-md-6">
        <strong>Unidad responsable</strong>
    <input type="text" value="<?php echo $dataRegistro['cbx_dependenciauno'] ?>" class="form-control" name="cbx_dependenciaone">
    </div>
    <div class="col-md-3">
        <strong>Nombre del puesto</strong>
    <input type="text" value="<?php echo $dataRegistro['puestoempresauno'] ?>" class="form-control" name="puestoempresauno">
    </div>
    <div class="col-md-3">
        <strong>Tipo de puesto</strong>
    <input type="text" value="<?php echo $dataRegistro['tipopuestouno'] ?>" class="form-control" name="empresa">
    </div>
    <div class="col-md-3">
        <strong>Dirección de la institución</strong>
    <input type="text" value="<?php echo $dataRegistro['empresadirecionuno'] ?>" class="form-control" name="empresadirecionuno">
    </div>
    <div class="col-md-3">
        <strong>Teléfono de contacto</strong>
    <input type="text" value="<?php echo $dataRegistro['telcontactouno'] ?>" class="form-control" name="telcontactouno">
    </div>
    <div class="col-md-3">
        <strong>Extensión</strong>
    <input type="text" value="<?php echo $dataRegistro['extencionuno'] ?>" class="form-control" name="extencionuno">
    </div>
    <div class="col-md-3">
        <strong>Nombre de su jefe directo</strong>
    <input type="text" class="form-control" name="jefedirectouno" value="<?php echo $dataRegistro['jefedirectouno'] ?>">
    </div>
    <div class="col-md-6">
        <strong>Motivo de su sepación</strong>
    <input type="text" value="<?php echo $dataRegistro['motivoseparacionuno'] ?>" class="form-control" name="motivoseparacionuno">
    </div>
    <div class="col-md-12">
        <strong>Funciones principales</strong>
    <textarea rows="7" class="form-control" name="funcionespricipalesuno"><?php echo $dataRegistro['funcionespricipalesuno'] ?></textarea>
    </div>
    <div class="col-md-6">
        <strong>Fecha de inicio de labores</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciouno'] ?>" class="form-control" name="fechainiciouno">
    </div>
    <div class="col-md-6">
        <strong>Fecha término de labores</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminouno'] ?>" class="form-control" name="fechaterminouno">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 1</strong>
    <input type="file"  class="form-control" name="archivoexplaboralpublicoone1" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 2</strong>
    <input type="file"  class="form-control" name="archivoexplaboralpublicotwo1" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 1</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral publico primero 1';
    $path = "documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarExpPub1?curp=$curp'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 2</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral publico primero 2';
    $path = "documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarExpPub1_2?curp=$curp'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Exp laboral sector publico segundo</label>
    </div>
    <div class="col-md-6">
        <strong>Secretaría de Estado</strong>
    <input type="text" value="<?php echo $dataRegistro['empresados'] ?>" class="form-control" name="cbx_empresados">
    </div>
    <div class="col-md-6">
        <strong>Unidad responsable</strong>
    <input type="text" value="<?php echo $dataRegistro['cbx_dependenciados'] ?>" class="form-control" name="cbx_dependenciados">
    </div>
    <div class="col-md-3">
        <strong>Nombre del puesto</strong>
    <input type="text" value="<?php echo $dataRegistro['puestoempresados'] ?>" class="form-control" name="puestoempresados">
    </div>
    <div class="col-md-3">
        <strong>Tipo de puesto</strong>
    <input type="text" value="<?php echo $dataRegistro['tipopuestodos'] ?>" class="form-control" name="tipopuestodos">
    </div>
    <div class="col-md-3">
        <strong>Dirección de la institución</strong>
    <input type="text" value="<?php echo $dataRegistro['empresadirecdos'] ?>" class="form-control" name="empresadirecdos">
    </div>
    <div class="col-md-3">
        <strong>Teléfono de contacto</strong>
    <input type="text" value="<?php echo $dataRegistro['telcontactodos'] ?>" class="form-control" name="telcontactodos">
    </div>
    <div class="col-md-3">
        <strong>Extensión</strong>
    <input type="text" value="<?php echo $dataRegistro['extenciondos'] ?>" class="form-control" name="extenciondos">
    </div>
    <div class="col-md-3">
        <strong>Nombre de su jefe directo</strong>
    <input type="text" class="form-control" name="jefedirectodos" value="<?php echo $dataRegistro['jefedirectodos'] ?>">
    </div>
    <div class="col-md-6">
        <strong>Motivo de su sepación</strong>
    <input type="text" value="<?php echo $dataRegistro['motivoseparaciondos'] ?>" class="form-control" name="motivoseparaciondos">
    </div>
    <div class="col-md-12">
        <strong>Funciones principales</strong>
    <textarea rows="7" class="form-control" name="funcionespricipalesdos"><?php echo $dataRegistro['funcionespricipalesdos'] ?></textarea>
    </div>
    <div class="col-md-6">
        <strong>Fecha de inicio de labores</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainicidos'] ?>" class="form-control" name="fechainicidos">
    </div>
    <div class="col-md-6">
        <strong>Fecha término de labores</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminodos'] ?>" class="form-control" name="fechaterminodos">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 1</strong>
    <input type="file"  class="form-control" name="archivoexplaboralpublicoone2" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 2</strong>
    <input type="file"  class="form-control" name="archivoexplaboralpublicotwo2" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 1</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral publico segundo 1';
    $path = "documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarExpPub2?curp=$curp'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 2</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral publico segundo 2';
    $path = "documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarExpPub2_2?curp=$curp'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Exp laboral sector publico tercero</label>
    </div>
    <div class="col-md-6">
        <strong>Secretaría de Estado</strong>
    <input type="text" value="<?php echo $dataRegistro['empresatres'] ?>" class="form-control" name="cbx_empresatres">
    </div>
    <div class="col-md-6">
        <strong>Unidad responsable</strong>
    <input type="text" value="<?php echo $dataRegistro['cbx_dependenciatres'] ?>" class="form-control" name="cbx_dependenciatres">
    </div>
    <div class="col-md-3">
        <strong>Nombre del puesto</strong>
    <input type="text" value="<?php echo $dataRegistro['puestoempresatres'] ?>" class="form-control" name="puestoempresatres">
    </div>
    <div class="col-md-3">
        <strong>Tipo de puesto</strong>
    <input type="text" value="<?php echo $dataRegistro['tipopuestotres'] ?>" class="form-control" name="tipopuestotres">
    </div>
    <div class="col-md-3">
        <strong>Dirección de la institución</strong>
    <input type="text" value="<?php echo $dataRegistro['empresadirectres'] ?>" class="form-control" name="empresadirectres">
    </div>
    <div class="col-md-3">
        <strong>Teléfono de contacto</strong>
    <input type="text" value="<?php echo $dataRegistro['telcontactotres'] ?>" class="form-control" name="telcontactotres">
    </div>
    <div class="col-md-3">
        <strong>Extensión</strong>
    <input type="text" value="<?php echo $dataRegistro['extenciontres'] ?>" class="form-control" name="extenciontres">
    </div>
    <div class="col-md-3">
        <strong>Nombre de su jefe directo</strong>
    <input type="text" class="form-control" name="jefedirectotres" value="<?php echo $dataRegistro['jefedirectotres'] ?>">
    </div>
    <div class="col-md-6">
        <strong>Motivo de su sepación</strong>
    <input type="text" value="<?php echo $dataRegistro['motivoseparaciontres'] ?>" class="form-control" name="motivoseparaciontres">
    </div>
    <div class="col-md-12">
        <strong>Funciones principales</strong>
    <textarea rows="7" class="form-control" name="funcionespricipalestres"><?php echo $dataRegistro['funcionespricipalestres'] ?></textarea>
    </div>
    <div class="col-md-6">
        <strong>Fecha de inicio de labores</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciotres'] ?>" class="form-control" name="fechainiciotres">
    </div>
    <div class="col-md-6">
        <strong>Fecha término de labores</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminotres'] ?>" class="form-control" name="fechaterminotres">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 1</strong>
    <input type="file"  class="form-control" name="archivoexplaboralpublicoone3" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 2</strong>
    <input type="file"  class="form-control" name="archivoexplaboralpublicotwo3" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 1</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral publico tercero 1';
    $path = "documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminaExpPub3?curp=$curp'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 2</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral publico tercero 2';
    $path = "documentos/" . $compdomicilio . $curp;
    if (file_exists($path)) {
        $directorio = opendir($path);
        while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eiminarExpPub3_3?curp=$curp'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    }

    ?>
    </div>
  
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Producción cientifica(Ultima publicación)</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre del artículo o publicación</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrepublicacion'] ?>" class="form-control" name="nombrepublicacion">
    </div>
    <div class="col-md-6">
        <strong>Año de publiación</strong>
    <input type="text" value="<?php echo $dataRegistro['tiempopublicacion'] ?>" class="form-control" name="tiempopublicacion">
    </div>
    <div class="col-md-3">
        <strong>Publicado en..</strong>
    <input type="text" value="<?php echo $dataRegistro['publicadoen'] ?>" class="form-control" name="publicadoen">
    </div>
    <div class="col-md-3">
        <strong>País de publicación</strong>
    <input type="text" value="<?php echo $dataRegistro['paisdepublicacion'] ?>" class="form-control" name="paisdepublicacion">
    </div>
    
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Idioma</label>
    </div>
    <div class="col-md-6">
        <strong>Idioma</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreidioma'] ?>" class="form-control" name="nombreidioma">
    </div>
    <div class="col-md-6">
        <strong>Nivel</strong>
    <input type="text" value="<?php echo $dataRegistro['nivel'] ?>" class="form-control" name="nivel">
    </div>
    <div class="col-md-3">
        <strong>Dominio</strong>
    <input type="text" value="<?php echo $dataRegistro['niveldedominio'] ?>" class="form-control" name="niveldedominio">
    </div>
    <div class="col-md-3">
        <strong>Documento que acredita tu idioma</strong>
    <input type="text" value="<?php echo $dataRegistro['documentoacredita'] ?>" class="form-control" name="documentoacredita">
    </div>
    
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Otras habilidades</label>
    </div>
    <div class="col-md-12">
        <strong>Otras habilidades</strong>
    <textarea rows="7" class="form-control" name="otrashabilidades"><?php echo $dataRegistro['nombreidioma'] ?></textarea>
    </div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; margin-top: 10px;">
    <a href="closeSesion" class="btn btn-warning">Cerrar sesion</a>&nbsp;&nbsp;&nbsp;
    <input type="submit" name="guardar" class="btn btn-success" value="Guardar">  
        </div>
            
            <footer style="width: 100%; background: #1072b3; height: auto; bottom: 0; color: white;  text-align: center; padding: 1px; margin-top: 20px; border-radius: 0px 0px 10px 10px; ">
        <p>
            ® Hospital Regional de Alta Especialidad de Ixtapaluca, todos los derechos reservados. <br>
            Carr Federal México-Puebla Km. 34.5, Zoquiapan, 56530 Ixtapaluca, Méx.</p>
    </footer>
    
</div>
  
</form>
</body>

</html>