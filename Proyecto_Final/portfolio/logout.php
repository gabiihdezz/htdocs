<?php
session_start();
require '../util/funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($id_usu) || empty($contraseña)) {
        session_destroy();
        header("Location: login.php");
        exit();
    }
    if (isset($_POST['Cerrar'])) {
        session_destroy();
        header("Location: login.php");  
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
                                    </li>
                                    <li class="nav-item col-6 col-lg-auto">
                                    <?php
                                        if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                                            echo"<a class=\"nav-link py-2 px-0 px-lg-2\" href=\"menu.php\" aria-current=\"true\">";}
                                        else{
                                            echo"<a class=\"nav-link py-2 px-0 px-lg-2\" href=\"login.php\" class=\"text-decoration-none\">";}
                                        ?>Menu</a>
                                </li>
                                <li class="nav-item col-6  col-lg-auto">
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
                </div>
                <div class="d-flex justify-content-center align-items-center min-vh-100">
                <div class="col-10 col-sm-10 col-md-6 col-lg-4 text-center p-4 align-self-center bg-light border rounded-3">
                <h4>¿Estás seguro de que quieres cerrar sesión?</h4>
                <?php if(isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
                <?php
                if (isset($_SESSION['id_usu']) && isset($_SESSION['nombre_usuario'])) {
                    echo <<<HEAD
                    
                    <form method="post" action="">
                        <input type="submit" name="Cerrar" value="Cerrar sesión" class="btn btn-primary">
                    </form>

                    HEAD;
                }

                ?>
            
            </div>
            </div>
        </div>
    </div>
    <script>
        let today = new Date().toISOString().split("T")[0];
        document.getElementById("fecha").max = today;
    </script>
</body>
</html>