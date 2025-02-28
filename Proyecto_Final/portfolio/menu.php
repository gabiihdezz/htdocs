<?php
session_start();  // Mantén esto siempre al principio
require_once($_SERVER['DOCUMENT_ROOT'] . '/util/funciones.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fecha"])) {
    $_SESSION["fecha"] = $_POST["fecha"];
}
else{
    $_SESSION["fecha"] = null;
}

$fechaSeleccionada = isset($_SESSION["fecha"])? $_SESSION["fecha"] : null;
if (!isset($_SESSION['id_usu'])) {
    header("Location: login.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú</title>
    <link rel="icon" href="../util/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>


    *{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .fondo{
            background-image: url("../util/fondo1.webp");
            background-repeat: repeat;
            height: 100%; 
        }
        html, body {
            margin: 0;
            padding: 0;

        }
        .navbar-nav .nav-link:hover {
            color: white !important; 
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="row">
            <header class="navbar navbar-expand-lg bd-navbar fixed-top bg-info">
                <nav class="container-xxl bd-gutter flex-wrap flex-lg-nowrap" aria-label="Main navigation">
                    <a class="navbar-brand p-0 me-0 me-lg-2" href="../inicio.php" aria-label="Bootstrap">
                        <img src="../util/cora.png " alt="Logo a modo de simulación" width="50px">
                    </a>
                    <div class="offcanvas-lg offcanvas-end flex-grow-1 fs-5" tabindex="-1" >
                        <div class="offcanvas-body p-4 pt-0 p-lg-0">
                            <hr class="d-lg-none text-white-50">
                            <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
                                <li class="nav-item col-6 col-lg-auto">
                                    <a class="nav-link py-2 px-0 px-lg-2" href="../inicio.php" aria-current="true">Inicio</a>
                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                    <a class="nav-link py-2 px-0 px-lg-2" href="menu.php">Menu</a>
                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                    <a class="nav-link py-2 px-0 px-lg-2" href="estadisticas.php">Estadisticas</a>
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
        </div>
        
        <div class="row pt-4 mt-5">
            <div class="col-12 text-justify">
                <?php
                
                if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                    $usuario = $_SESSION['nombre_usuario'];
                    echo "<div class=\"fs-2 text-center mt-5\">Bienvenido/a, $usuario</div>";
                } else {
                    echo "<div class=\"fs-2 text-center mt-5\">Inicia sesión para disfrutar de este servicio</div>";
                }
                
                ?>
                 
                 <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-8 pt-4 mb-4 mt-3 text-center">
                        <form method="POST" action="">
                            <div class="fs-3 p-2 text-primary">Introduzca una fecha: </div>
                            <input type="date" id="fecha" name="fecha" class="form-control w-100" required>
                            <button type="submit" class="btn btn-primary mt-2">Enviar</button>
                        </form>

                        <?php if (!$fechaSeleccionada): ?>
                            <div class="text-danger fs-4 mt-2">Debes introducir una fecha para continuar.</div>
                        <?php endif; ?>

                        <div class="fs-3 p-2 text-primary">Selecciona en el menú de abajo lo que desees hacer: </div>
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <?php   
                                        if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                                            if ($fechaSeleccionada) {
                                                echo " <a class=\"btn btn-outline-primary w-100\" href=\"anadir.php?fecha=" . urlencode($_SESSION["fecha"]) . "\">Añadir</a>";
                                            } else {
                                                echo " <button class=\"btn btn-outline-secondary w-100\" disabled>Añadir</button>";
                                            }
                                        } 
                                        ?>
                                        </li>
                                        <li class="mb-3">
                                        <?php   
                                        if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                                            if ($fechaSeleccionada) {
                                                echo " <a class=\"btn btn-outline-primary w-100\" href=\"modificar.php\">Modificar</a>";
                                            } else {
                                                echo " <button class=\"btn btn-outline-secondary w-100\" disabled>Modificar</button>";
                                            }
                                        } 
                                            ?>
                                        </li>
                                        <li class="mb-3">
                                            <?php   
                                        if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                                            if ($fechaSeleccionada) {
                                                echo " <a class=\"btn btn-outline-primary w-100\" href=\"borrar.php\">Borrar</a>";
                                            } else {
                                                echo " <button class=\"btn btn-outline-secondary w-100\" disabled>Borrar</button>";
                                            }
                                        }
                                            ?>
                                        </li>

                                        <li class="mb-3">
                                            <?php   
                                        if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                                            if ($fechaSeleccionada) {
                                                echo " <a class=\"btn btn-outline-primary w-100\" href=\"consultar.php\">Consultar</a>";
                                            } else {
                                                echo " <button class=\"btn btn-outline-secondary w-100\" disabled>Consultar</button>";
                                            }
                                        }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script>
    let today = new Date().toISOString().split("T")[0];
    document.getElementById("fecha").max = today;
</script>

</body>
</html>