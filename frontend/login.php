<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="UTF-8">
    <title>HRAEI IXTAPALUCA</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="icono/icono.ico" rel="shortcut icon">
    <link rel="stylesheet" href="css/stylelogin.css?=1">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

</head>

<body>
    <header style="width: auto; height: auto; padding: 4px; text-align: center; color: white; font-size: 17px; background: #1072b3; ">
        <p>Hospital Regional de Alta Especialidad de Ixtapaluca.</p>
    </header>

    <div class="form-bg">
        <div class="container">
            <div class="row">
                    <div class="form-container">
                        <form class="form-horizontal" method="post" autocomplete="off">
                            <h3 class="title">R.H</h3>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-user"></i></span>
                                <input class="form-control" type="email" placeholder="Username" name="usuario" required>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input class="form-control" type="password" placeholder="Password" name="password" required>
                            </div>
                            <button class="btn signin" type="submit">Log in</button>
                        
                            <span class="register"><a href="https://hraei.gob.mx/rH/recursos_humanos" target="_blank">Hospital Regional de Alta Especialidad de Ixtapaluca</a></span>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <footer style="width: 100%; position: fixed; background: #1072b3; height: auto; bottom: 0; color: white;  text-align: center;">
        <p>
            ® Hospital Regional de Alta Especialidad de Ixtapaluca, todos los derechos reservados. <br>
            Carr Federal México-Puebla Km. 34.5, Zoquiapan, 56530 Ixtapaluca, Méx.</p>
    </footer>
</body>
</html>
<?php session_start();
error_reporting(0);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $correo = $_POST['usuario'];
    $password = $_POST['password'];
    
include("claseConexion/conexion.php");

    $statement = $conexion->prepare('SELECT correoelectronico, rfc FROM datospersonales WHERE correoelectronico= :correoelectronico AND rfc = :rfc and acceder = :acceder');
    $statement->execute(array(
        
        ':correoelectronico' => $correo,
        ':rfc'=>$password,
        ':acceder'=>1
    ));

    $resultado = $statement->fetch();
    if ($resultado != false){
        $_SESSION['candidato'] = $correo;
        header('location: misDatos');
    
    }
    echo "<script>alertify.error('Usuario o contraseña incorrectos');</script>";
                    }

?>