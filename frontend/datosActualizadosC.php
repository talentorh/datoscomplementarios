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
<form id="msform" method="POST" action="aplicacion/actualizarDatos" enctype="multipart/form-data">
<div class="container" style="border: 1px solid black; padding: 0px; border-radius: 10px;">
<header style="width: 100%; height: auto;  padding: 10px; text-align: center; color: white; font-size: 17px; background: #1072b3; border-radius: 10px 10px 0px 0px;">
        <p>Hospital Regional de Alta Especialidad de Ixtapaluca.</p>
    </header>
<div class="form-row" style="padding: 15px;">
        
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Datos personales</label>
    </div>
    <input type="hidden" value="<?php echo $dataRegistro['id_principal'] ?>" class="form-control" name="id_user">
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
    $id = $dataRegistro['id_principal'];
    $curp = 'comprobante curp';
    $path = "documentos/" .$id."/".$curp.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $curp . "'><a href='" . $path . "/" . $curp . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$curp.pdf' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$curp.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarCurp?id=$id'> <i title='Eliminar Archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
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
    $id = $dataRegistro['id_principal'];
    $compdomicilio = 'comprobante de domicilio';
    $path = "documentos/" .$id."/".$compdomicilio.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $compdomicilio . "'><a href='" . $path . "/" . $compdomicilio . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$compdomicilio.pdf' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$compdomicilio.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarCompDomicilio?id=$id'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
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
    $archivoNombre = "Certificado media superior";
    $path = "documentos/" .$id."/".$archivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$archivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$archivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
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
        <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
    <label>Nivel postecnico</label>
            </div>
  <div class="form-group col-md-12">
                    <strong>Agregar postecnico (Solo numeros)</strong>
                    <input type="number" id="quantityp" name="numpostecnico" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantityp").addEventListener("input", (event) => {
                        let content = '';

                        const quantity = event.target.value;

                        for (let i = 0; i < quantity; i++) {
                            content += `<div class="form-row">
                                    <div class="col-md-12">
                                    <h1 style="font-size:22px; text-align: center;">Información postecnico ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformacionPostecnico[${i}]" name="nombreformacionPostecnico[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstitucionPostecnico[${i}]" name="nombreinstitucionPostecnico[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainiciosupPostecnico[${i}]" name="fechainiciosupPostecnico[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminosupPostecnico[${i}]" name="fechaterminosupPostecnico[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursadosupPostecnico[${i}]" name="tiempocursadosupPostecnico[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibePostecnico[${i}]" name="documentorecibePostecnico[]" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <strong>Sube tu documento</strong>
                                    <input type="file"  class="form-control" id="documentotitulopostecnico[${i}]" name="documentotitulopostecnico[]" accept=".pdf">
                                    </div>
                                    <div class="col-md-3">
                                    <strong>Sube tu cedula</strong>
                                    <input type="file"  class="form-control" id="documentocedulapostecnico[${i}]" name="documentocedulapostecnico[]" accept=".pdf">
                                    </div>
                            
                        </div>`;
                        }
                        document.getElementById("divGuestsp").innerHTML = content;
                    })
                </script>
                <div id="divGuestsp"></div>
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
    $archivonombre = 'Titulo postecnico'.' '.$dataRegistropostecnico['nombreformacionpostecnico'];
    $id_user = $dataRegistro['id_principal'];
    $path = 'documentos/'.$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='200' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?titulo=$archivonombre&id=$id_user'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    

    ?>
    </div>
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento cedula</strong>
    <?php
    $archivonombre = 'Cedula postecnico'.' '.$dataRegistropostecnico['nombreformacionpostecnico'];
    $id_user = $dataRegistro['id_principal'];
    $path = 'documentos/'.$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='200' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?titulo=$archivonombre&id=$id_user'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    

    ?>
    </div>
                    <?php endforeach; ?>   
                    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Nivel Superior</label>
    </div>
      <div class="form-group col-md-12">
                    <strong>Agregar licenciatura (Solo numeros)</strong>
                    <input type="number" id="quantity" name="numlicenciaturas" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                
                </div>
                <script>
                    document.getElementById("quantity").addEventListener("input", (event) => {
                        let content = '';

                        const quantity = event.target.value;

                        for (let i = 0; i < quantity; i++) {
                            content += `<div class="form-row">
                            <div class="form-group col-md-12">
                                    <h1 style="font-size:22px; text-align: center;">Información licenciatura ${i +1}</h1>
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformacion[${i}]" name="nombreformacion[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstitucion[${i}]" name="nombreinstitucion[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainicio[${i}]" name="fechainiciosup[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechatermino[${i}]" name="fechaterminosup[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursado[${i}]" name="tiempocursadosup[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibe[${i}]" name="documentorecibe[]" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                <label>Numero de cedula ${i +1}</label>
                                <input type="int" id="numerocedula[${i}]" name="numerocedula[]" class="form-control">
                            </div>
                            <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="documentolicenciatura[]" accept=".pdf">
    </div>
                                <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="documentocedula[]" accept=".pdf">
    </div>
                        </div>`;
                        }
                        document.getElementById("divGuests").innerHTML = content;
                    })
                </script>
                <div id="divGuests"></div>      
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
    $archivonombre = 'Titulo licenciatura'.' '.$dataRegistroe['nombreformacionsuperior'];
    $id_user = $dataRegistro['id_principal'];
    $path = 'documentos/'.$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='200' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?titulo=$archivonombre&id=$id_user'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }

    ?>
    </div>
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento cedula</strong>
    <?php
    $archivonombre = 'Cedula licenciatura'.' '.$dataRegistroe['nombreformacionsuperior'];
    $id_user = $dataRegistro['id_principal'];
    $path = 'documentos/'.$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='200' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?titulo=$archivonombre&id=$id_user'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }

    ?>
    </div>
    
       
    <?php endforeach; ?>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
        <label>Agregar Maestria</label>
    </div>
<div class="form-group col-md-12">
                    <strong>Agregar maestria (Solo numeros)</strong>
                    <input type="number" id="quantity2" name="maestrias" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantity2").addEventListener("input", (event) => {
                        let content = '';

                        const quantity2 = event.target.value;

                        for (let i = 0; i < quantity2; i++) {
                            content += `<div class="form-row">
                                    <div class="col-md-12">
                                    <h1 style="font-size:22px; text-align: center;">Información maestria ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformacionmaestria[${i}]" name="nombreformacionmaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombremaestria[${i}]" name="nombremaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainiciomaestria[${i}]" name="fechainiciomaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminomaestria[${i}]" name="fechaterminomaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursadomaestria[${i}]" name="tiempocursadomaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentomaestria[${i}]" name="documentomaestria[]" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                <label>Numero de cedula ${i +1}</label>
                                <input type="text" id="cedulamaestria[${i}]" name="cedulamaestria[]" class="form-control">
                                </div>
                                <div class="col-md-3">
        <strong>Sube tu titulo</strong>
    <input type="file" id="documentotitulomaestria[${i}]" class="form-control" name="documentotitulomaestria[]" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file" id="documentocedulamaestria[${i}]" class="form-control" name="documentocedulamaestria[]" accept=".pdf">
    </div>
                            
                        </div>`;
                        }
                        document.getElementById("divGuests2").innerHTML = content;
                    })
                </script>

                <div id="divGuests2"></div>
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
        <strong>Documento titulo</strong>
    <?php
    $archivonombre = 'Titulo maestria'.' '.$dataRegistroMaestria['nombreformacionmaestria'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id_user&titulo=$archivonombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }

    ?>
    </div>
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento cedula</strong>
    <?php
    $archivonombre = 'Cedula maestria'.' '.$dataRegistroMaestria['nombreformacionmaestria'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id_user&titulo=$archivonombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }

    ?>
    </div>
    
    <?php endforeach; ?>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
    <h3 style="text-align: center;">Agregar Posgrado/Especialidad</h3>
</div>
    <div class="form-group col-md-12">
                    <strong>Agregar posgrado/especialidad (Solo numeros)</strong>
                    <input type="number" id="quantity3" name="posgrados" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantity3").addEventListener("input", (event) => {
                        let content = '';

                        const quantity3 = event.target.value;

                        for (let i = 0; i < quantity3; i++) {
                            content += `<div class="form-row">
                                    <div class="col-md-12">
                                    <h1 style="font-size:22px; text-align: center;">Información posgrado/especialidad ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformacionposgradoespecialidad[${i}]" name="nombreformacionposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstitucionposgradoespecialidad[${i}]" name="nombreinstitucionposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainiciosupposgradoespecialidad[${i}]" name="fechainiciosupposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminosupposgradoespecialidad[${i}]" name="fechaterminosupposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursadosupposgradoespecialidad[${i}]" name="tiempocursadosupposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Unidad hospitalaria ${i +1}</label>
                                <input type="text" id="unidadhospitalariaposgradoespecialidad[${i}]" name="unidadhospitalariaposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibeposgradoespecialidad[${i}]" name="documentorecibeposgradoespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Numero de cedula ${i +1}</label>
                                <input type="int" id="numerocedulaposgradoespecialidad[${i}]" name="numerocedulaposgradoespecialidad[]" class="form-control">
                            </div>
                            <div class="col-md-3">
        <strong>Sube tu titulo</strong>
    <input type="file" id="archivotituloposgrado[${i}]" class="form-control" name="archivotituloposgrado[]" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file" id="archivocedulaposgrado[${i}]" class="form-control" name="archivocedulaposgrado[]" accept=".pdf">
    </div>
                            
                        </div>`;
                        }
                        document.getElementById("divGuests3").innerHTML = content;
                    })
                </script>

                <div id="divGuests3"></div>
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
        <strong>Documento titulo</strong>
    <?php
    $archivonombre = 'Titulo posgrado'.' '.$dataRegistroEspecialidad['nombreformacionacademica'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" . $id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id_user&titulo=$archivonombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    ?>
    </div>
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento cedula</strong>
    <?php
    $archivonombre = 'Cedula posgrado'.' '.$dataRegistroEspecialidad['nombreformacionacademica'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" . $id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id_user&titulo=$archivonombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    ?>
    </div>
<?php endforeach; ?>  
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
    <h3 style="text-align: center;">Agregar Doctorado/Subespecialidad</h3>
</div>
<div class="form-group col-md-12">
                    <strong>Agregar doctorado (Solo numeros)</strong>
                    <input type="number" id="quantity4" name="doctorados" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantity4").addEventListener("input", (event) => {
                        let content = '';

                        const quantity4 = event.target.value;

                        for (let i = 0; i < quantity4; i++) {
                            content += `<div class="form-row">
                                <div class="col-md-12">
                                    <h1 style="font-size:22px; text-align: center;">Información doctorado ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación académica ${i +1}</label>
                                <input type="text" id="nombreformaciondoctorado[${i}]" name="nombreformaciondoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstituciondoctorado[${i}]" name="nombreinstituciondoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainiciosupdoctorado[${i}]" name="fechainiciosupdoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminosupdoctorado[${i}]" name="fechaterminosupdoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursadosupdoctorado[${i}]" name="tiempocursadosupdoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Unidad hospitalaria ${i +1}</label>
                                <input type="int" id="unidadhospitalariadoctorado[${i}]" name="unidadhospitalariadoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibedoctorado[${i}]" name="documentorecibedoctorado[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Numero de cedula ${i +1}</label>
                                <input type="text" id="numeroceduladoctorado[${i}]" name="numeroceduladoctorado[]" class="form-control">
                              </div>
                              <div class="col-md-3">
        <strong>Sube tu titulo</strong>
    <input type="file" id="archivotitulodoctorado[${i}]" class="form-control" name="archivotitulodoctorado[]" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file" id="archivoceduladoctorado[${i}]" class="form-control" name="archivoceduladoctorado[]" accept=".pdf">
    </div>
                        </div>`;
                        }
                        document.getElementById("divGuests4").innerHTML = content;
                    })
                </script>

                <div id="divGuests4"></div>
    
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
    $archivonombre = 'Titulo doctorado'.' '.$dataRegistroDoctorado['nombreformaciondoctorado'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id_user&titulo=$archivonombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    ?>
    </div>
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Cedula titulo</strong>
    <?php
    $archivonombre = 'Cedula doctorado'.' '.$dataRegistroDoctorado['nombreformaciondoctorado'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id_user&titulo=$archivonombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    ?>
    </div>
    <?php endforeach; ?>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
    <h3 style="text-align: center;">Agregar Estudios Alta especialidad</h3>
</div>
<div class="form-group col-md-12">
                    <strong>Agregar Estudios Alta especialidad (Solo numeros)</strong>
                    <input type="number" id="quantity7" name="otrosestudios" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantity7").addEventListener("input", (event) => {
                        let content = '';

                        const quantity7 = event.target.value;

                        for (let i = 0; i < quantity7; i++) {
                            content += `<div class="form-row">
                            <div class="col-md-12">
                                    <h1 style="font-size:22px; text-align: center;">Información Estudios Alta especialidad ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación ${i +1}</label>
                                <input type="text" id="nombreformacionaltaesp[${i}]" name="nombreformacionaltaesp[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombrealtaespecialidad[${i}]" name="nombrealtaespecialidad[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Unidad hospitalaria ${i +1}</label>
                                <input type="text" id="unidadhospaltaesp[${i}]" name="unidadhospaltaesp[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainicioaltaesp[${i}]" name="fechainicioaltaesp[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminoaltaesp[${i}]" name="fechaterminoaltaesp[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Años cursados ${i +1}</label>
                                <input type="text" id="tiempocursadoaltaesp[${i}]" name="tiempocursadoaltaesp[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibealtaesp[${i}]" name="documentorecibealtaesp[]" class="form-control">
                                </div>
                                <div class="col-md-3">
        <strong>Sube tu titulo</strong>
    <input type="file" id="archivotituloaltaesp[${i}]" class="form-control" name="archivotituloaltaesp[]" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file" id="cedulaAltaEsp[${i}]" class="form-control" name="cedulaAltaEsp[]" accept=".pdf">
    </div>
                        </div>`;
                        }
                        document.getElementById("divGuests7").innerHTML = content;
                    })
                </script>

                <div id="divGuests7"></div>
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
        <label>Estudios Alta Especialidad</label>
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
    <div class="col-md-3">
        <strong>Numero de cedula</strong>
    <input type="text" value="<?php echo $dataRegistroOtrosEstAltaEsp['numerocedulaespecialidad'] ?>" class="form-control" name="cedulaaltaesp[]">
    </div>
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="cedulaAltaEsp[]" accept=".pdf">
    </div>

    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento titulo</strong>
    <?php
    $archivonombre = 'Titulo alta especialidad'.' '.$dataRegistroOtrosEstAltaEsp['nombreformacionaltaesp'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$archivonombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    ?>
    </div>
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento cedula</strong>
    <?php
    $archivonombre = 'Cedula alta especialidad'.' '.$dataRegistroOtrosEstAltaEsp['nombreformacionaltaesp'];
    $id_user = $dataRegistro['id_principal'];
    $path = "documentos/" .$id_user.'/'.$archivonombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id_user/$archivonombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id_user/$archivonombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$archivonombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    ?>
    </div>
    <?php endforeach; ?>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
    <h3 style="text-align: center;">Agregar Otros estudios</h3>
</div>
<div class="form-group col-md-12">
                    <strong>Agregar otros estudios (Solo numeros)</strong>
                    <input type="number" id="quantity8" name="otrosestudios" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantity8").addEventListener("input", (event) => {
                        let content = '';

                        const quantity8 = event.target.value;

                        for (let i = 0; i < quantity8; i++) {
                            content += `<div class="form-row">
                            <div class="col-md-12">
                                    <h1 style="font-size:22px; text-align: center;">Información otros estudios ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la formación ${i +1}</label>
                                <input type="text" id="nombreformacionotros[${i}]" name="nombreformacionotros[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreotrosestudiosuno[${i}]" name="nombreotrosestudiosuno[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainiciootrosestudiosuno[${i}]" name="fechainiciootrosestudiosuno[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminootrosestudiosuno[${i}]" name="fechaterminootrosestudiosuno[]" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentorecibeestudiosuno[${i}]" name="documentorecibeestudiosuno[]" class="form-control">
                                </div>
                                <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file" id="archivootrosuno[${i}]" class="form-control" name="archivootrosuno[]" accept=".pdf">
    </div>
                        </div>`;
                        }
                        document.getElementById("divGuests8").innerHTML = content;
                    })
                </script>

                <div id="divGuests8"></div>
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
        <label>Otros estudios </label>
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
    <input type="file"  class="form-control" name="archivootrosuno[]" accept=".pdf">
    </div>
    
    <div class="col-md-12" style="border: 1px solid #F0F0F0;">
        <strong>Documento obtenido</strong>
        <?php
    $archivoNombre = 'Documento otros estudios'.' '.$dataRegistroOtrosEst['nombreformacionotros'];
    $id = $dataRegistro['id_principal'];
    $path = "documentos/" .$id.'/'.$archivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$archivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$archivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$archivoNombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
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
    $ArchivoNombre = 'Documento servicio social';
    $path = "documentos/".$id.'/'.$ArchivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$ArchivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$ArchivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$ArchivoNombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
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
    $archivoNombre = 'Documento practicas profesionales';
    $path = "documentos/".$id.'/'.$archivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$archivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$archivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$archivoNombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }

    ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
    <h3 style="text-align: center;">Agregar Certificaciones</h3>
</div>
<div class="form-group col-md-12">
                    <strong>Agregar certificación (Solo numeros)</strong>
                    <input type="number" id="quantity6" name="certificaciones" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantity6").addEventListener("input", (event) => {
                        let content = '';

                        const quantity6 = event.target.value;

                        for (let i = 0; i < quantity6; i++) {
                            content += `<div class="form-row">
                            <div class="col-md-12">
                                    <h1 style="font-size:22px; text-align: center;">Información certificación ${i +1}</h1>
                                </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de la certificación ${i +1}</label>
                                <input type="text" id="nombrecertificacionuno[${i}]" name="nombrecertificacionuno[]" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                <label>Nombre de la institución educativa ${i +1}</label>
                                <input type="text" id="nombreinstitucioncertificacion[${i}]" name="nombreinstitucioncertificacion[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha de inicio ${i +1}</label>
                                <input type="date" id="fechainiciocertificacionuno[${i}]" name="fechainiciocertificacionuno[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Fecha termino ${i +1}</label>
                                <input type="date" id="fechaterminocertificacionuno[${i}]" name="fechaterminocertificacionuno[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Total de horas ${i +1}</label>
                                <input type="text" id="tiempocursadocertificacion[${i}]" name="tiempocursadocertificacion[]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                <label>Modalidad ${i +1}</label>
                                <select name="modalidadceertificacion[]" id="modalidadceertificacion[${i}]" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="Presencial">Presencial</option>
                                    <option value="A distancia">A distancia</option>
                                    <option value="Mixta">Mixta</option>
                                </select>
                                </div>
                                <div class="form-group col-md-12">
                                <label>Documento que recibe ${i +1}</label>
                                <input type="text" id="documentocertificacionuno[${i}]" name="documentocertificacionuno[]" class="form-control">
                                </div>
                                <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file" id="archivocertificacion[${i}]" class="form-control" name="archivocertificacion[]" accept=".pdf">
    </div>
                            
                        </div>`;
                        }
                        document.getElementById("divGuests6").innerHTML = content;
                    })
                </script>

                <div id="divGuests6"></div>
    <?php
$id = $dataRegistro['id_principal'];
require_once 'claseConexion/conexion.php';
    $sql = $conexionSeleccion->prepare("SELECT * from cerficacion where id_postulado = :id_postulado");
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
        <strong>Nombre de la certificación</strong>
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
        <strong>Total de horas</strong>
    <input type="text" value="<?php echo $dataRegistroCertificacion['tiempocursadosupcertificacion'] ?>" class="form-control" name="tiempocursadocertificacion[]">
    </div>
    <div class="form-group col-md-3">
    <strong>Modalidad</strong>
                                <select name="modalidadceertificacion[]" id="modalidadceertificacion" class="form-control">
                                    <option value="<?php echo $dataRegistroCertificacion['modalidadcertificacion'] ?>"><?php echo $dataRegistroCertificacion['modalidadcertificacion'] ?></option>
                                    <option value="Presencial">Presencial</option>
                                    <option value="A distancia">A distancia</option>
                                    <option value="Mixta">Mixta</option>
                                </select>
                                </div>
    <div class="col-md-3">
        <strong>Documento que acredita</strong>
    <input type="text" value="<?php echo $dataRegistroCertificacion['documentorecibecertificacion'] ?>" class="form-control" name="documentocertificacionuno[]">
    </div>
    
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivocertificacion[]" accept=".pdf">
    </div>
    <div class="col-md-6" style="border: 1px solid #F0F0F0;">
        <strong>Documento certificación</strong>
    <?php
    $archivoNombre = 'Documento certificacion'.' '.$dataRegistroCertificacion['nombrecertificacionuno'];
    $id = $dataRegistro['id_principal'];
    $path = "documentos/".$id.'/'.$archivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$archivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$archivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$archivoNombre'> <i title='Eliminar archivo' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }

    ?>
    </div>
    <?php endforeach; ?>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: orange;">
    <h3 style="text-align: center;">Exp. laboral sector privado</h3>
    </div>
<div class="form-group col-md-12">
                    <strong>Agregar Exp. laboral sector privado (Solo numeros)</strong>
                    <input type="number" id="quantity9" name="explaboral" autocomplete="off" class="form-control" min="0" max="5" placeholder="EJEMPLO: 1,2,3 etc">
                </div>
                <script>
                    document.getElementById("quantity9").addEventListener("input", (event) => {
                        let content = '';

                        const quantity9 = event.target.value;

                        for (let i = 0; i < quantity9; i++) {
                            content += `<div class="form-row">
                            <div class="col-md-12">
                                    <h1 style="font-size:22px; text-align: center;">Información Exp. laboral sector privado ${i +1}</h1>
                                </div>

      <div class="form-group col-md-6">
        <label>Nombre de la empresa</label>
        <input type="text" class="form-control" autocomplete="off" id="nombrelaboralprivada[]" name="nombrelaboralprivada[]">
      </div>
      <div class="form-group col-md-6">
        <label>Tipo de puesto</label>
        <input type="text" class="form-control" autocomplete="off" id="tipopuestoprivada[]" name="tipopuestoprivada[]">
      </div>
      <div class="form-group col-md-6">
        <label>Dirección de la empresa</label>
        <input type="text" class="form-control" autocomplete="off" id="direccionempresaprivada[]" name="direccionempresaprivada[]">
      </div>
      <div class="form-group col-md-3">
        <label>Teléfono de contacto</label>
        <input type="text" class="form-control" autocomplete="off" id="telefonoempresaprivada[]" name="telefonoempresaprivada[]">
      </div>
      <div class="form-group col-md-3">
        <label>Extensión</label>
        <input type="text" class="form-control" autocomplete="off" id="extencionempresaprivada[]" name="extencionempresaprivada[]">
      </div>
      <div class="form-group col-md-6">
        <label>Nombre de su jefe directo</label>
        <input type="text" class="form-control" autocomplete="off" id="nombrejefeprivada[]" name="nombrejefeprivada[]">
      </div>
      <div class="form-group col-md-6">
        <label>Motivo de su sepación</label>
        <input type="text" class="form-control" autocomplete="off" id="motivoseparacionprivada[]" name="motivoseparacionprivada[]">
      </div>
      <div class="form-group col-md-12">
        <label>Funciones principales</label>
        <textarea rows="4" class="form-control" autocomplete="off" id="funcionesprivada[]" name="funcionesprivada[]"></textarea>
      </div>
      <div class="form-group col-md-6">
        <label>Fecha de inicio de labores</label>
        <input type="date" class="form-control" autocomplete="off" id="fechainicioprivada[]" name="fechainicioprivada[]">
      </div>
      <div class="form-group col-md-6">
        <label>Fecha término de labores</label>
        <input type="date" class="form-control" autocomplete="off" id="fechaterminoprivada[]" name="fechaterminoprivada[]">
      </div>
      <div class="col-md-3">
        <strong>Sube tu documento 1</strong>
    <input type="file"  class="form-control" name="archivoexplaboralprivadoone1[]" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 2</strong>
    <input type="file"  class="form-control" name="archivoexplaboralprivadotwo1[]" accept=".pdf">
    </div>
      </div>`;
                        }
                        document.getElementById("divGuests9").innerHTML = content;
                    })
                </script>

                <div id="divGuests9"></div>
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
    $id = $dataRegistro['id_principal'];
    $ArchivoNombre = 'Documento exp laboral privada 1'.$dataRegistroExpLaboPrivado['nombrelaboralprivada'];
    $path = "documentos/" .$id.'/'.$ArchivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$ArchivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$ArchivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$ArchivoNombre'> <i title='Eliminar archivo 1' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 2</strong>
    <?php
    $id = $dataRegistro['id_principal'];
    $archivoNombre = 'Documento exp laboral privada 2'.$dataRegistroExpLaboPrivado['nombrelaboralprivada'];
    $path = "documentos/" .$id.'/'.$archivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$archivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$archivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$archivoNombre'> <i title='Eliminar archivo 2' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
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
    $id = $dataRegistro['id_principal'];
    $ArchivoNombre = 'exp laboral publico primero 1';
    $path = "documentos/" .$id.'/'.$ArchivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$ArchivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$ArchivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$ArchivoNombre'> <i title='Eliminar archivo 1' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 2</strong>
    <?php
    $id = $dataRegistro['id_principal'];
    $archivoNombre = 'exp laboral publico primero 2';
    $path = "documentos/" .$id.'/'.$archivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$archivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$archivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$archivoNombre'> <i title='Eliminar archivo 2' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
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
    $id = $dataRegistro['id_principal'];
    $ArchivoNombre = 'exp laboral publico segundo 1';
    $path = "documentos/" .$id.'/'.$ArchivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$ArchivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$ArchivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$ArchivoNombre'> <i title='Eliminar archivo 1' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 2</strong>
    <?php
    $id = $dataRegistro['id_principal'];
    $archivoNombre = 'exp laboral publico segundo 2';
    $path = "documentos/" .$id.'/'.$archivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$archivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$archivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$archivoNombre'> <i title='Eliminar archivo 2' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
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
    $id = $dataRegistro['id_principal'];
    $ArchivoNombre = 'exp laboral publico tercero 1';
    $path = "documentos/" .$id.'/'.$ArchivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$ArchivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$ArchivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$ArchivoNombre'> <i title='Eliminar archivo 1' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
            }
        }
    ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 2</strong>
    <?php
    $id = $dataRegistro['id_principal'];
    $archivoNombre = 'exp laboral publico tercero 2';
    $path = "documentos/" .$id.'/'.$archivoNombre.'.pdf';
    if (file_exists($path)) {
        $directorio = opendir($path);
        $archivo = readdir($directorio);
            if (!is_dir($archivo)) {
                echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                echo "<iframe src='documentos/$id/$archivoNombre.pdf' width='90' height='100' class='form-control'></iframe>";
                echo "<a href='documentos/$id/$archivoNombre.pdf' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                echo "<a href='eliminarDocumentacion/eliminarDocumento?id=$id&titulo=$archivoNombre'> <i title='Eliminar archivo 2' id='guardar'class='fas fa-trash' style='color: red;'></i></a>";
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
