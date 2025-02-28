<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/util/funciones.php');
error_reporting(E_ALL);  // Muestra todos los errores.
ini_set('display_errors', 1);  // Muestra los errores en pantalla.

$nombre = $apellidos = $correo = $fecha = $usuario = "";
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $apellidos = trim($_POST["apellidos"]);
    $fecha = trim( $_POST["fecha"]);
    $usuario = trim($_POST["usuario"]);
    $contra = $_POST["contra"];
    $contra2 = $_POST["contra2"];

    if (empty($id_usu) || empty($contraseña)) {
        $error="El usuario o la contraseña están vacíos, no se guardarán los datos.";
        session_destroy();
        header("Location: signup.php");
        exit();
    }
    if ($contra !== $contra2) {
        $error = "Las contraseñas no coinciden. Inténtalo de nuevo.";
    } else {
        // Intentar registrar el usuario
        $id_usuario = registroUsuario($contra, $usuario, $fecha, $nombre, $apellidos);

        if ($id_usuario) {
            // Iniciar sesión automáticamente con los datos devueltos
            $_SESSION['id_usu'] = $id_usuario;
            $_SESSION['nombre_usuario'] = $nombre;
            $_SESSION['usuario'] = $usuario;

            // Asegurar que la sesión se guarda antes de redirigir
            session_write_close();

            // Redirigir al usuario a la página de inicio
            header("Location: ../inicio.php");
            exit();
        } else {
            $error = "Error al registrar el usuario. Es posible que el nombre de usuario ya esté en uso.";
        }
    }
    if (isset($_POST['Cerrar'])) {
        session_destroy();
        header("Location: signup.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <link rel="icon" href="../util/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        *{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .fondo{
            /* background-image: url("../util/fondo.jpg"); */
            background-repeat: no-repeat;
            background-image: url("../util/fondo1.webp");
            background-size: cover;
            height: 100%; 
        }
        html, body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        *, *::before, *::after {
            box-sizing: border-box;
        }

        .navbar-nav .nav-link:hover {
            color: white !important; 
        }

        </style>
</head>
<body class="fondo">
        <div class="row">
                <header class="navbar navbar-expand-lg bd-navbar sticky-top bg-info">
                    <nav class="container-xxl bd-gutter flex-wrap flex-lg-nowrap" aria-label="Main navigation">

                            <a class="navbar-brand p-0 me-0 me-lg-2" href="../inicio.php" aria-label="Bootstrap">
                            <img src="../util/cora.png " alt="Logo a modo de simulación" width="50">
                            </a>

                            <div class="offcanvas-lg offcanvas-end flex-grow-1 fs-5" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel" data-bs-scroll="true">

                            <div class="offcanvas-body p-4 pt-0 p-lg-0">
                                <hr class="d-lg-none text-white-50">
                                <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
                                    <a class="nav-link py-2 px-0 px-lg-2" href="../inicio.php">Inicio</a>
                                    <li class="nav-item col-6 col-lg-auto">
                                    <?php
                                        if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                                            echo"<a class=\"nav-link py-2 px-0 px-lg-2\" href=\"menu.php\" aria-current=\"true\">";}
                                        else{
                                            echo"<a class=\"nav-link py-2 px-0 px-lg-2\" href=\"login.php\" class=\"text-decoration-none\">";}
                                        ?>Menu</a>
                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                <?php
                                        if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                                            echo"<a class=\"nav-link py-2 px-0 px-lg-2\" href=\"estadisticas.php\" aria-current=\"true\">";}
                                        else{
                                            echo"<a class=\"nav-link py-2 px-0 px-lg-2\" href=\"login.php\" class=\"text-decoration-none\">";}
                                        ?>Estadisticas</a>
                                </li>
                                </ul>


                                <ul class="navbar-nav flex-row flex-wrap ms-md-auto gap-3 align-content-center">
                                <?php 
                                if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                                    echo"<li class=\"nav-item col-6 col-lg-auto \">
                                        <a class=\"nav-link py-2 px-0 px-lg-2\" href=\"logout.php\">Cerrar Sesión</a>
                                    </li>";}
                                else{
                                    echo"<li class=\"nav-item col-6 col-lg-auto \">
                                        <a class=\"nav-link py-2 px-0 px-lg-2\" href=\"login.php\">Iniciar Sesión</a>
                                    </li>
                                    <li class=\"nav-item col-6 col-lg-auto\">
                                        <a class=\"nav-link py-2 px-0 px-lg-2\" href=\"signup.php\">Registrarse</a>
                                    </li>";}
                                    
                                ?>
                            </ul>

                            </div>
                        </div>
                    </nav>
                </header>
                <div class="d-flex justify-content-center align-items-center min-vh-100">
                <div class="col-10 col-sm-10 col-md-6 col-lg-4 text-center p-4 align-self-center bg-light border rounded-3">
                <h2>Registrarte</h2>
                <?php if(isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
                <?php
                    $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
                    $apellidos = isset($_POST['apellidos']) ? htmlspecialchars($_POST['apellidos']) : '';
                    $fecha = isset($_POST['fecha']) ? htmlspecialchars($_POST['fecha']) : '';
                    $usuario = isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : '';
                    $contra = isset($_POST['contra']) ? $_POST['contra'] : '';
                    $contra2 = isset($_POST['contra2']) ? $_POST['contra2'] : '';
                                    
                if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                    echo <<<HEAD
                    
                    <form method="post" action="">
                        <div class="mb-3">Para registrar otro usuario tienes que cerrar sesión</div>
                        <div class="mb-3">¿Quieres cerrar sesión?</div>
                        <input type="submit" name="Cerrar" value="Cerrar sesión" class="btn btn-primary">
                    </form>

                    HEAD;
                } else {
                    echo <<<HEAD
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label for="nombre" class="form-label fs-5">Nombre: </label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required value='$nombre' >
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="apellidos" class="form-label fs-5">Apellidos: </label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control" required value='$apellidos' >
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <label for="fecha" class="form-label fs-5">Fecha de Nacimiento: </label>
                                <input type="date" id="fecha" name="fecha" class="form-control" required value='$fecha' >
                             </div>
                            <div class="col-12 col-sm-6">
                                <label for="usuario" class="form-label fs-5">Usuario: </label>
                                <input type="text" id="usuario" name="usuario" class="form-control" required value='$usuario' >
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <label for="contra" class="form-label fs-5">Contraseña: </label>
                                <input type="password" id="contra" name="contra" class="form-control" required >
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="contra2" class="form-label fs-5">Repetir contraseña: </label>
                                <input type="password" id="contra2" name="contra2" class="form-control" required >
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                            </div>
                        </div>
                    </form>

                    HEAD;
                }
                ?>
            
                     <hr>
                <div class="d-flex justify-content-around text-align-center">
                <p>¿Ya tienes una cuenta?</p>
                <a href="login.php">Inicia sesión aquí</a>
            </div>
            </div>
        </div>
    </div>
    <script>
    // Obtener la fecha actual en formato YYYY-MM-DD
    let today = new Date().toISOString().split("T")[0];

    // Asignar la fecha máxima al input 
    document.getElementById("fecha").max = today;
</script>
</body>
</html>