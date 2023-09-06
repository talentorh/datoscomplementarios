<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  
  <link rel="stylesheet" href="css/style.css">
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
<header style="width: auto; height: auto;  padding: 4px; text-align: center; color: white; font-size: 17px; background: #1072b3; ">
        <p>Hospital Regional de Alta Especialidad de Ixtapaluca.</p>
    </header>
  <!-- multistep form -->
<form id="msform" method="POST" action="aplicacion/actualizarDatos" enctype="multipart/form-data">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Datos personales</li>
    <li>Datos Academicos</li>
    <li>Posgrado/Especialidad</li>
    <li>Otros estudios</li>
    <li>Serv social/Practicas</li>
    <li>Certificacion</li>
    <li>Cursos</li>
    <li>Exp laboral privado</li>
    <li>Exp laboral publico</li>
    <li>Produccion cientifica</li>
    <li>Idioma</li>
    <li>Otras habilidades</li>
    <li><a href="closeSesion" style="color: red;">Cerrar sesion</a></li>
  </ul>
  <!-- fieldsets -->
  
  <fieldset>
    
    <div class="form-row">
        
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
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
    <div class="col-md-3">
        <strong>CURP</strong>
    <input type="text" value="<?php echo $dataRegistro['curp'] ?>" class="form-control" name="curp" minlength="18" maxlength="18">
    </div>
    <div class="col-md-3">
        <strong>R.F.C</strong>
    <input type="text" value="<?php echo $dataRegistro['rfcprincipal'] ?>" class="form-control" name="rfc">
    </div>
    <div class="col-md-3">
        <strong>Correo electronico</strong>
    <input type="text" value="<?php echo $dataRegistro['correoelectronico'] ?>" class="form-control" name="correo">
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
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'comprobantedomicilio';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-3">
        <strong>Delegacón</strong>
    <input type="text" value="<?php echo $dataRegistro['municipio'] ?>" class="form-control" name="municipio">
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
    </div>
    <input type="button" name="next" class="next action-button" value="Next" style="background-color: yellow; color: black;"/>
  </fieldset>
  <fieldset>
  <div class="form-row">
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
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento certificado</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'comprobante media superior';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Educación Superior</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreformacionsuperior'] ?>" class="form-control" name="nombreformacionsuperior">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombresuperior'] ?>" class="form-control" name="nombresuperior">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechasuperiorinicio'] ?>" class="form-control" name="fechasuperiorinicio">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechasuperiortermino'] ?>" class="form-control" name="fechasuperiortermino">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistro['tiempocursadosuperior'] ?>" class="form-control" name="tiempocursadosuperior">
    </div>
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistro['documentosuperior'] ?>" class="form-control" name="documentosuperior">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivosuperior" accept=".pdf">
    </div>
    
    <div class="col-md-3">
        <strong>Numero de cedula</strong>
    <input type="text" value="<?php echo $dataRegistro['numerocedulasuperior'] ?>" class="form-control" name="numerocedulasuperior">
    </div>
    <div class="col-md-6">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="archivocedulasuperior" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento titulo</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'comprobante superior';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Cedula</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'cedula superior';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <!--primer maestria-->
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Maestria</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreformacionmaestria'] ?>" class="form-control" name="nombreformacionmaestria">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombremaestria'] ?>" class="form-control" name="nombremaestria">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciomaestria'] ?>" class="form-control" name="fechainiciomaestria">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminomaestria'] ?>" class="form-control" name="fechaterminomaestria">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistro['tiempocursadomaestria'] ?>" class="form-control" name="tiempocursadomaestria">
    </div>
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistro['documentomaestria'] ?>" class="form-control" name="documentomaestria">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivomaestria" accept=".pdf">
    </div>
    
    <div class="col-md-3">
        <strong>Numero de cedula</strong>
    <input type="text" value="<?php echo $dataRegistro['cedulamaestria'] ?>" class="form-control" name="cedulamaestria">
    </div>
    <div class="col-md-6">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="archivomaestriacedula" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento titulo</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'comprobante maestria';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento cedula</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'cedula maestria';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <!--segunda maestria-->
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Segunda Maestria</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreformacionmaestriados'] ?>" class="form-control" name="nombreformacionmaestriados">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombremaestriados'] ?>" class="form-control" name="nombremaestriados">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciomaestriados'] ?>" class="form-control" name="fechainiciomaestriados">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminomaestriados'] ?>" class="form-control" name="fechaterminomaestriados">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistro['tiempocursadomaestriados'] ?>" class="form-control" name="tiempocursadomaestriados">
    </div>
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistro['documentomaestriados'] ?>" class="form-control" name="documentomaestriados">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivomaestriados" accept=".pdf">
    </div>
    
    <div class="col-md-3">
        <strong>Numero de cedula</strong>
    <input type="text" value="<?php echo $dataRegistro['cedulamaestriados'] ?>" class="form-control" name="cedulamaestriados">
    </div>
    <div class="col-md-6">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="archivomaestriadoscedula" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento titulo</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'comprobante maestria dos';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100'class='form-control' ></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento cedula</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'cedula maestria dos';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
  </div>
  <input type="button" name="previous" class="previous action-button" value="Previous" style="background-color: yellow; color: black;"/>
    <input type="button" name="next" class="next action-button" value="Next" style="background-color: yellow; color: black;"/>
  </fieldset>
  <fieldset>
    <div class="form-row">
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Posgrado/Especialidad</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreformacionposgrado'] ?>" class="form-control" name="nombreformacionposgrado">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreposgrado'] ?>" class="form-control" name="nombreposgrado">
    </div>
    <div class="col-md-3">
        <strong>Unidad hospitalaria</strong>
    <input type="text" value="<?php echo $dataRegistro['unidadhospitalaria'] ?>" class="form-control" name="unidadhospitalaria">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaposgradoinicio'] ?>" class="form-control" name="fechaposgradoinicio">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaposgradotermino'] ?>" class="form-control" name="fechaposgradotermino">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistro['tiempocursadoposgrado'] ?>" class="form-control" name="tiempocursadoposgrado">
    </div>
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistro['documentorecibeposgrado'] ?>" class="form-control" name="documentorecibeposgrado">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivoposgrado" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Numero de cedula</strong>
    <input type="text" value="<?php echo $dataRegistro['numerocedulaposgrado'] ?>" class="form-control" name="numerocedulaposgrado">
    </div>
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="archivoposgradocedula" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento titulo</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'comprobante posgrado';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento cedula</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'cedula posgrado';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control' ></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Docotorado/Subespecialidad</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreformaciondoctorado'] ?>" class="form-control" name="nombreformaciondoctorado">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombredoctorado'] ?>" class="form-control" name="nombredoctorado">
    </div>
    <div class="col-md-3">
        <strong>Unidad hospitalaria</strong>
    <input type="text" value="<?php echo $dataRegistro['unidadhospitalariadoctorado'] ?>" class="form-control" name="unidadhospitalariadoctorado">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciodoctorado'] ?>" class="form-control" name="fechainiciodoctorado">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminodoctorado'] ?>" class="form-control" name="fechaterminodoctorado">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistro['tiempocursadodoctorado'] ?>" class="form-control" name="tiempocursadodoctorado">
    </div>
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistro['documentorecibedoctorado'] ?>" class="form-control" name="documentorecibedoctorado">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivodoctorado" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Numero de cedula</strong>
    <input type="text" value="<?php echo $dataRegistro['numeroceduladoctorado'] ?>" class="form-control" name="numeroceduladoctorado">
    </div>
    <div class="col-md-3">
        <strong>Sube tu cedula</strong>
    <input type="file"  class="form-control" name="archivodoctoradocedula" accept=".pdf">
    </div>

    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento titulo</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'comprobante doctorado';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento cedula</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'cedula doctorado';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" style="background-color: yellow; color: black;"/>
    <input type="button" name="next" class="next action-button" value="Next" style="background-color: yellow; color: black;"/>
  </fieldset>
  <fieldset>
    <div class="form-row">
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Otros estudios/Alta Especialidad</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreformacionaltaesp'] ?>" class="form-control" name="nombreformacionaltaesp">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrealtaespecialidad'] ?>" class="form-control" name="nombrealtaespecialidad">
    </div>
    <div class="col-md-3">
        <strong>Unidad hospitalaria</strong>
    <input type="text" value="<?php echo $dataRegistro['unidadhospaltaesp'] ?>" class="form-control" name="unidadhospaltaesp">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainicioaltaesp'] ?>" class="form-control" name="fechainicioaltaesp">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminoaltaesp'] ?>" class="form-control" name="fechaterminoaltaesp">
    </div>
    <div class="col-md-3">
        <strong>Tiempo cursado</strong>
    <input type="text" value="<?php echo $dataRegistro['tiempocursadoaltaesp'] ?>" class="form-control" name="tiempocursadoaltaesp">
    </div>
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistro['documentorecibealtaesp'] ?>" class="form-control" name="documentorecibealtaesp">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivoaltaesp" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento obtenido</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'comprobante alta epecialidad';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Otros estudios 1</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreformacionotros'] ?>" class="form-control" name="nombreformacionotros">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreotrosestudiosuno'] ?>" class="form-control" name="nombreotrosestudiosuno">
    </div>
    
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciootrosestudiosuno'] ?>" class="form-control" name="fechainiciootrosestudiosuno">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminootrosestudiosuno'] ?>" class="form-control" name="fechaterminootrosestudiosuno">
    </div>
    
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistro['documentorecibeestudiosuno'] ?>" class="form-control" name="documentorecibeestudiosuno">
    </div>
    
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivootrosuno" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
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
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Otros estudios 2</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la formacion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreformacionotrosdos'] ?>" class="form-control" name="nombreformacionotrosdos">
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institucion</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreotrosestudiosdos'] ?>" class="form-control" name="nombreotrosestudiosdos">
    </div>
    
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciootrosestudiosdos'] ?>" class="form-control" name="fechainiciootrosestudiosdos">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminootrosestudiosdos'] ?>" class="form-control" name="fechaterminootrosestudiosdos">
    </div>
    
    <div class="col-md-3">
        <strong>Documento obtenido</strong>
    <input type="text" value="<?php echo $dataRegistro['documentorecibeestudiosdos'] ?>" class="form-control" name="documentorecibeestudiosdos">
    </div>
    
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivootrosdos" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento obtenido</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'comprobante otro estudio segundo';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" style="background-color: yellow; color: black;"/>
    <input type="button" name="next" class="next action-button" value="Next" style="background-color: yellow; color: black;"/>
  </fieldset>
  <fieldset>
    <div class="form-row">
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
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento servicio social</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento servicio social';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
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
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento practicas profesionales</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento practicas profesionales';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    </div>

    <input type="button" name="previous" class="previous action-button" value="Previous" style="background-color: yellow; color: black;"/>
    <input type="button" name="next" class="next action-button" value="Next" style="background-color: yellow; color: black;"/>
  </fieldset>
  <fieldset>
    <div class="form-row">
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Certificación</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institución educativa</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreformacioncertificauno'] ?>" class="form-control" name="nombreformacioncertificauno">
    </div>
    <div class="col-md-6">
        <strong>Especialidad que certifica</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrecertificacionuno'] ?>" class="form-control" name="nombrecertificacionuno">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciocertificacionuno'] ?>" class="form-control" name="fechainiciocertificacionuno">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminocertificacionuno'] ?>" class="form-control" name="fechaterminocertificacionuno">
    </div>
    <div class="col-md-3">
        <strong>Documento que acredita</strong>
    <input type="text" value="<?php echo $dataRegistro['documentocertificacionuno'] ?>" class="form-control" name="documentocertificacionuno">
    </div>
    
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivocertificacion" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento certificación</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento certificacion uno';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Certificación Dos</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la institución educativa</strong>
    <input type="text" value="<?php echo $dataRegistro['nombreformacioncertificaciondos'] ?>" class="form-control" name="nombreformacioncertificaciondos">
    </div>
    <div class="col-md-6">
        <strong>Especialidad que certifica</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrecertificaciondos'] ?>" class="form-control" name="nombrecertificaciondos">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciocertificaciondos'] ?>" class="form-control" name="fechainiciocertificaciondos">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminocertificaciondos'] ?>" class="form-control" name="fechaterminocertificaciondos">
    </div>
    <div class="col-md-3">
        <strong>Documento que acredita</strong>
    <input type="text" value="<?php echo $dataRegistro['documentocertificaciondos'] ?>" class="form-control" name="documentocertificaciondos">
    </div>
    
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivocertificaciondos" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento certificación dos</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento certificacion dos';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" style="background-color: yellow; color: black;"/>
    <input type="button" name="next" class="next action-button" value="Next" style="background-color: yellow; color: black;"/>
  </fieldset>
  <fieldset>
  <div class="form-row">
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Actualización academica/Primer curso</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre del curso</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrecursouno'] ?>" class="form-control" name="nombrecursouno">
    </div>
    <div class="col-md-6">
        <strong>Institución sede</strong>
    <input type="text" value="<?php echo $dataRegistro['institucioncursouno'] ?>" class="form-control" name="institucioncursouno">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciocursouno'] ?>" class="form-control" name="fechainiciocursouno">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminocursouno'] ?>" class="form-control" name="fechaterminocursouno">
    </div>
    <div class="col-md-3">
        <strong>Documento que acredita</strong>
    <input type="text" value="<?php echo $dataRegistro['documentorecibecursouno'] ?>" class="form-control" name="documentorecibecursouno">
    </div>
    <div class="col-md-3">
        <strong>Nacional/Internacinal</strong>
    <input type="text" value="<?php echo $dataRegistro['nacionalprimero'] ?>" class="form-control" name="nacionalprimero">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivoactualizacionacademicauno" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento act. academica</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento actualizacion academica uno';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Curso Dos</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre del curso</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrecursodos'] ?>" class="form-control" name="nombrecursodos">
    </div>
    <div class="col-md-6">
        <strong>Institución sede</strong>
    <input type="text" value="<?php echo $dataRegistro['institucioncursodos'] ?>" class="form-control" name="institucioncursodos">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciocursodos'] ?>" class="form-control" name="fechainiciocursodos">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminocursodos'] ?>" class="form-control" name="fechaterminocursodos">
    </div>
    <div class="col-md-3">
        <strong>Documento que acredita</strong>
    <input type="text" value="<?php echo $dataRegistro['documentorecibecursodos'] ?>" class="form-control" name="documentorecibecursodos">
    </div>
    <div class="col-md-3">
        <strong>Nacional/Internacinal</strong>
    <input type="text" value="<?php echo $dataRegistro['nacionalsegundo'] ?>" class="form-control" name="nacionalsegundo">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivoactualizacionacademicados" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento act. academica</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento actualizacion academica dos';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Curso Tres</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre del curso</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrecursotres'] ?>" class="form-control" name="nombrecursotres">
    </div>
    <div class="col-md-6">
        <strong>Institución sede</strong>
    <input type="text" value="<?php echo $dataRegistro['institucioncursotres'] ?>" class="form-control" name="institucioncursotres">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainiciocursotres'] ?>" class="form-control" name="fechainiciocursotres">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminocursotres'] ?>" class="form-control" name="fechaterminocursotres">
    </div>
    <div class="col-md-3">
        <strong>Documento que acredita</strong>
    <input type="text" value="<?php echo $dataRegistro['documentorecibecursotres'] ?>" class="form-control" name="documentorecibecursotres">
    </div>
    <div class="col-md-3">
        <strong>Nacional/Internacinal</strong>
    <input type="text" value="<?php echo $dataRegistro['nacionaltercero'] ?>" class="form-control" name="nacionaltercero">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento</strong>
    <input type="file"  class="form-control" name="archivoactualizacionacademicatres" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento act. academica</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento actualizacion academica tres';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" style="background-color: yellow; color: black;"/>
    <input type="button" name="next" class="next action-button" value="Next" style="background-color: yellow; color: black;"/>
  </fieldset>
  <fieldset>
    <div class="form-row">
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Exp laboral sector privado</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la empresa</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrelaboralprivada'] ?>" class="form-control" name="nombrelaboralprivada">
    </div>
    <div class="col-md-6">
        <strong>Tipo de puesto</strong>
    <input type="text" value="<?php echo $dataRegistro['tipopuestoprivada'] ?>" class="form-control" name="tipopuestoprivada">
    </div>
    <div class="col-md-3">
        <strong>Dirección de la empresa</strong>
    <input type="text" value="<?php echo $dataRegistro['direccionempresaprivada'] ?>" class="form-control" name="direccionempresaprivada">
    </div>
    <div class="col-md-3">
        <strong>Teléfono de contacto</strong>
    <input type="text" value="<?php echo $dataRegistro['telefonoempresaprivada'] ?>" class="form-control" name="telefonoempresaprivada">
    </div>
    <div class="col-md-3">
        <strong>Extensión</strong>
    <input type="text" value="<?php echo $dataRegistro['extencionempresaprivada'] ?>" class="form-control" name="extencionempresaprivada">
    </div>
    <div class="col-md-3">
        <strong>Nombre de su jefe directo</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrejefeprivada'] ?>" class="form-control" name="nombrejefeprivada">
    </div>
    <div class="col-md-6">
        <strong>Motivo de su sepación</strong>
    <input type="text" value="<?php echo $dataRegistro['motivoseparacionprivada'] ?>" class="form-control" name="motivoseparacionprivada">
    </div>
    
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainicioprivada'] ?>" class="form-control" name="fechainicioprivada">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminoprivada'] ?>" class="form-control" name="fechaterminoprivada">
    </div>
    <div class="col-md-12">
        <strong>Funciones principales</strong>
    <textarea rows="7" class="form-control" name="funcionesprivada"><?php echo $dataRegistro['funcionesprivada'] ?></textarea>
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 1</strong>
    <input type="file"  class="form-control" name="archivoexplaboralprivadoone1" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 2</strong>
    <input type="file"  class="form-control" name="archivoexplaboralprivadotwo1" accept=".pdf">
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
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Exp laboral sector privado segundo</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la empresa</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrelaboralprivadados'] ?>" class="form-control" name="nombrelaboralprivadados">
    </div>
    <div class="col-md-6">
        <strong>Tipo de puesto</strong>
    <input type="text" value="<?php echo $dataRegistro['tipopuestoprivadados'] ?>" class="form-control" name="tipopuestoprivadados">
    </div>
    <div class="col-md-3">
        <strong>Dirección de la empresa</strong>
    <input type="text" value="<?php echo $dataRegistro['direccionempresaprivadados'] ?>" class="form-control" name="direccionempresaprivadados">
    </div>
    <div class="col-md-3">
        <strong>Teléfono de contacto</strong>
    <input type="text" value="<?php echo $dataRegistro['telefonoempresaprivadados'] ?>" class="form-control" name="telefonoempresaprivadados">
    </div>
    <div class="col-md-3">
        <strong>Extensión</strong>
    <input type="text" value="<?php echo $dataRegistro['extencionempresaprivadados'] ?>" class="form-control" name="extencionempresaprivadados">
    </div>
    <div class="col-md-3">
        <strong>Nombre de su jefe directo</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrejefeprivadados'] ?>" class="form-control" name="nombrejefeprivadados">
    </div>
    <div class="col-md-6">
        <strong>Motivo de su sepación</strong>
    <input type="text" value="<?php echo $dataRegistro['motivoseparacionprivadados'] ?>" class="form-control" name="motivoseparacionprivadados">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainicioprivadados'] ?>" class="form-control" name="fechainicioprivadados">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminoprivadados'] ?>" class="form-control" name="fechaterminoprivadados">
    </div>
    <div class="col-md-12">
        <strong>Funciones principales</strong>
    <textarea rows="7" class="form-control" name="funcionesprivadados"><?php echo $dataRegistro['funcionesprivadados'] ?></textarea>
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 1</strong>
    <input type="file"  class="form-control" name="archivoexplaboralprivadoone2" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 2</strong>
    <input type="file"  class="form-control" name="archivoexplaboralprivadotwo2" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 1</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral segundo 1';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 2</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral segundo 2';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Exp laboral sector privado tercero</label>
    </div>
    <div class="col-md-6">
        <strong>Nombre de la empresa</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrelaboralprivadatres'] ?>" class="form-control" name="nombrelaboralprivadatres">
    </div>
    <div class="col-md-6">
        <strong>Tipo de puesto</strong>
    <input type="text" value="<?php echo $dataRegistro['tipopuestoprivadatres'] ?>" class="form-control" name="tipopuestoprivadatres">
    </div>
    <div class="col-md-3">
        <strong>Dirección de la empresa</strong>
    <input type="text" value="<?php echo $dataRegistro['direccionempresaprivadatres'] ?>" class="form-control" name="direccionempresaprivadatres">
    </div>
    <div class="col-md-3">
        <strong>Teléfono de contacto</strong>
    <input type="text" value="<?php echo $dataRegistro['telefonoempresaprivadatres'] ?>" class="form-control" name="telefonoempresaprivadatres">
    </div>
    <div class="col-md-3">
        <strong>Extensión</strong>
    <input type="text" value="<?php echo $dataRegistro['extencionempresaprivadatres'] ?>" class="form-control" name="extencionempresaprivadatres">
    </div>
    <div class="col-md-3">
        <strong>Nombre de su jefe directo</strong>
    <input type="text" value="<?php echo $dataRegistro['nombrejefeprivadatres'] ?>" class="form-control" name="nombrejefeprivadatres">
    </div>
    <div class="col-md-6">
        <strong>Motivo de su sepación</strong>
    <input type="text" value="<?php echo $dataRegistro['motivoseparacionprivadatres'] ?>" class="form-control" name="motivoseparacionprivadatres">
    </div>
    <div class="col-md-3">
        <strong>Fecha de inicio</strong>
    <input type="date" value="<?php echo $dataRegistro['fechainicioprivadatres'] ?>" class="form-control" name="fechainicioprivadatres">
    </div>
    <div class="col-md-3">
        <strong>Fecha de termino</strong>
    <input type="date" value="<?php echo $dataRegistro['fechaterminoprivadatres'] ?>" class="form-control" name="fechaterminoprivadatres">
    </div>
    <div class="col-md-12">
        <strong>Funciones principales</strong>
    <textarea rows="7" class="form-control" name="funcionesprivadatres"><?php echo $dataRegistro['funcionesprivadatres'] ?></textarea>
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 1</strong>
    <input type="file"  class="form-control" name="archivoexplaboralprivadoone3" accept=".pdf">
    </div>
    <div class="col-md-3">
        <strong>Sube tu documento 2</strong>
    <input type="file"  class="form-control" name="archivoexplaboralprivadotwo3" accept=".pdf">
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 1</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral tercero 1';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    <div class="col-md-3" style="border: 1px solid #F0F0F0;">
        <strong>Documento exp laboral 2</strong>
    <?php
    $curp = $dataRegistro['curp'];
    $compdomicilio = 'documento exp laboral tercero 2';
                $path = "documentos/" . $compdomicilio . $curp;
                if (file_exists($path)) {
                    $directorio = opendir($path);
                    while ($archivo = readdir($directorio)) {
                        if (!is_dir($archivo)) {
                            echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' ></a></div><br>";

                            echo "<iframe src='documentos/$compdomicilio$curp/$archivo' width='90' height='100' class='form-control'></iframe>";
                            echo "<a href='documentos/$compdomicilio$curp/$archivo' target='_blank'> <i title='Ver Archivo Adjunto' id='guardar'class='fas fa-file-pdf'></i></a>";
                        }
                    }
                }

                ?>
    </div>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" style="background-color: yellow; color: black;" />
    <input type="button" name="next" class="next action-button" value="Next" style="background-color: yellow; color: black;" />
  </fieldset>
  <fieldset>
  <div class="form-row">
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
                        }
                    }
                }

                ?>
    </div>
  </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" style="background-color: yellow; color: black;"/>
    <input type="button" name="next" class="next action-button" value="Next" style="background-color: yellow; color: black;"/>
  </fieldset>
  <fieldset>
  <div class="form-row">
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
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" style="background-color: yellow; color: black;"/>
    <input type="button" name="next" class="next action-button" value="Next" style="background-color: yellow; color: black;"/>
  </fieldset>
  <fieldset>
  <div class="form-row">
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
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" style="background-color: yellow;"/>
    <input type="button" name="next" class="next action-button" value="Next" style="background-color: yellow;"/>
  </fieldset>
  <fieldset>
  <div class="form-row">
  <div class="col-md-12" style="text-align: center; font-size: 25px; color: black;">
        <label>Otras habilidades</label>
    </div>
    <div class="col-md-12">
        <strong>Otras habilidades</strong>
    <textarea rows="7" class="form-control" name="otrashabilidades"><?php echo $dataRegistro['nombreidioma'] ?></textarea>
    </div>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" style="background-color: yellow; color: black;"/>
    <input type="submit" name="guardar" class="action-button-save" value="Actualizar Datos" style="background-color: orange; font-size: 11px; color: black;">
    
  </fieldset>
  
</form>

<br><br>
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
      <script id="rendered-js" >
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function () {
  if (animating) return false;
  animating = true;

  current_fs = $(this).parent();
  next_fs = $(this).parent().next();

  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

  //show the next fieldset
  next_fs.show();
  //hide the current fieldset with style
  current_fs.animate({ opacity: 0 }, {
    step: function (now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = now * 50 + "%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale(' + scale + ')',
        'position': 'absolute' });

      next_fs.css({ 'left': left, 'opacity': opacity });
    },
    duration: 800,
    complete: function () {
      current_fs.hide();
      animating = false;
    },
    //this comes from the custom easing plugin
    easing: 'easeInOutBack' });

});

$(".previous").click(function () {
  if (animating) return false;
  animating = true;

  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();

  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

  //show the previous fieldset
  previous_fs.show();
  //hide the current fieldset with style
  current_fs.animate({ opacity: 0 }, {
    step: function (now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = (1 - now) * 50 + "%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({ 'left': left });
      previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
    },
    duration: 800,
    complete: function () {
      current_fs.hide();
      animating = false;
    },
    //this comes from the custom easing plugin
    easing: 'easeInOutBack' });

});
//# sourceURL=pen.js
 function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
    
}

    </script>

<footer style="width: 100%; position: fixed; background: #1072b3; height: auto; bottom: 0; color: white;  text-align: center; padding: 1px; margin-top: 20px;">
        <p>
            ® Hospital Regional de Alta Especialidad de Ixtapaluca, todos los derechos reservados. <br>
            Carr Federal México-Puebla Km. 34.5, Zoquiapan, 56530 Ixtapaluca, Méx.</p>
    </footer>
</body>

</html>
