<?php
session_start();
require_once('../util/login.php'); 
require_once('../util/funciones.php');  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contra = $_POST["contra"];
    $correo = $_POST["correo"];
    $usuario = $_POST["usuario"];
    $fecha = $_POST["fecha"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $contra2 = $_POST["contra2"];

    if ($contra !== $contra2) {
        $error = "Las contraseñas no coinciden. Inténtalo de nuevo.";
    } else {
        if (registroUsuario($contra, $correo , $usuario, $fecha, $nombre, $apellidos)) {
            $_SESSION["usuario"] = $usuario;
            header("Location: ../inicio.php");  
            exit();
        } else {
            $error = "Error al registrar el usuario. Inténtalo de nuevo.";
        }
    }
    
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="icon" href="../util/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        *{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .fondo{
            background-image: url("../util/fondo.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%; 
        }
        html, body {
            margin: 0;
            padding: 0;
            overflow: hidden;

        }
        .navbar-nav .nav-link:hover {
            color: white !important; 
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }
        </style>
</head>
<body class="fondo">
        <div class="row">
                <header class="navbar navbar-expand-lg bd-navbar sticky-top bg-info">
                    <nav class="container-xxl bd-gutter flex-wrap flex-lg-nowrap" aria-label="Main navigation">

                            <a class="navbar-brand p-0 me-0 me-lg-2" href="inicio.php" aria-label="Bootstrap">
                            <img src="../util/cora.png " alt="Logo a modo de simulación" width="50" >
                            </a>
            

                            <div class="offcanvas-lg offcanvas-end flex-grow-1" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel" data-bs-scroll="true">

                            <div class="offcanvas-body p-4 pt-0 p-lg-0">
                                <hr class="d-lg-none text-white-50">
                                <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
                                <li class="nav-item col-6 col-lg-auto">
                                    <a class="nav-link py-2 px-0 px-lg-2" href="tabla.php" aria-current="true">Insertar</a>
                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                    <a class="nav-link py-2 px-0 px-lg-2" href="estadisticas.php">Estadisticas</a>
                                </li>
                                </ul>


                                <ul class="navbar-nav flex-row flex-wrap ms-md-auto gap-3 align-content-center">
                                    <li class="nav-item col-6 col-lg-auto ">
                                        <a href="login.php">Iniciar Sesion</a>
                                    </li>
                                    <li class="nav-item col-6 col-lg-auto">
                                        <a href="signup.php">Registrarse</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
                <div class="d-flex justify-content-center align-items-center min-vh-100">
                <div class="col-10 col-sm-10 col-md-6 col-lg-4 text-center p-4 align-self-center bg-light border rounded-3">
                <h2>Registrarte</h2>
                <?php if(isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

                <form method="post" action="">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="nombre" class="form-label fs-5">Nombre: </label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="apellidos" class="form-label fs-5">Apellidos: </label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label for="correo" class="form-label fs-5">Correo Electrónico: </label>
                            <input type="text" id="correo" name="correo" class="form-control" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="fecha" class="form-label fs-5">Fecha de Nacimiento: </label>
                            <input type="date" id="fecha" name="fecha" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label for="usuario" class="form-label fs-5">Usuario: </label>
                            <input type="text" id="usuario" name="usuario" class="form-control" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="contra" class="form-label fs-5">Contraseña: </label>
                            <input type="password" id="contra" name="contra" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                            <label for="contra2" class="form-label fs-5">Repetir contraseña: </label>
                            <input type="password" id="contra2" name="contra2" class="form-control" required>
                        </div>
                        <div class="col-12 col-sm-6 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                        </div>
                    </div>
                </form>
                     <hr>
                <div class="d-flex justify-content-around text-align-center">
                <p>¿Ya tienes una cuenta?</p>
                <a href="login.php">Inicia sesión aquí</a>
            </div>
            </div>
        </div>
    </div>
</body>
</html>