<?php
session_start(); // Asegurarse de iniciar la sesión


if (!isset($_SESSION['id_usu'])) {
    header("Location: login.php");
    exit();
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/util/funciones.php');




if (isset($_SESSION["fecha"]) && isset($_SESSION["id_usu"])) {
    $fecha = $_SESSION['fecha'];
    $id_usu = $_SESSION["id_usu"];
    $prnumberFecha = "<div class=\"fs-2\">La fecha seleccionada es: " . $fecha . " </div>";
} else {
    echo "<div class=\"fs-5 \">No se ha seleccionado ninguna fecha.</div>";
        header("Location: menu.php");
    exit();
}
// Manejo del formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_comida = trim($_POST["tipo_comida"]);
    $gl_1h = ($_POST["gl_1h"]);
    $raciones = ($_POST["raciones"]);
    $insulina = ($_POST["insulina"]);
    $deporte = ($_POST["deporte"]);
    $lenta = ($_POST["lenta"]);
    $gl_2h = ($_POST["gl_2h"]);
    $estado_glucosa = trim(string: $_POST["estado_glucosa"]);

    // Llamar a la función para guardar en la base de datos
    $resultados = anadir($tipo_comida, $gl_1h, $raciones, $insulina, $gl_2h, $id_usu, $fecha, $deporte, $lenta) ;
    if ($estado_glucosa === 'hipo') {
        $glucosa = trim($_POST["glucosaHipo"]);
        $hora = ($_POST["horaHipo"]);
        $resultado = anadirHipo($glucosa, $hora, $tipo_comida, $id_usu,$fecha);
    } 
    else if($estado_glucosa === 'hiper') {
        $glucosa = trim($_POST["glucosa"]);
        $hora = ($_POST["hora"]);
        $corr = ($_POST["corr"]);
        $resultado = anadirHiper($glucosa, $hora, $corr, $tipo_comida, $id_usu, $fecha);
    }
    header("Location: menu.php");
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
<body class="background">
    <div class="container ">
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
                                        echo"<li class=\"nav-item col-6 col-lg-auto \">\"
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

        <div class=" row pt-4 mt-5">
            <div class="col-12 text-justify">
                <a href="menu.php" class="btn btn-link mt-2">← Volver al Menú</a>
                     <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8 pt-4 mb-4 mt-5 text-center">
                        <?php if(isset($prnumberFecha)) { echo "<div class=\"fs-1\">$prnumberFecha</div>"; }
                        else{
                            header("Location: menu.php");
                            exit();
                        } ?>

                        <div class="fs-3 p-2 text-primary">Añadir: </div>
                            <form class="col-8 justify-content-center text-align-center align-items-center mx-auto" method="POST" action="">
                            <label for="tipo_comida">Tipo de comida:</label>
                            <?php 
                            $tipos_registrados = [];
                            $sql = "SELECT tipo_comida FROM comida WHERE id_usu = ? AND fecha = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("is", $id_usu, $fecha);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while ($row = $result->fetch_assoc()) {
                                $tipos_registrados[] = $row['tipo_comida'];
                            }
                            $stmt->close();
                            ?>
                            <select id="tipo_comida" name="tipo_comida" class="form-control" required>
                                <option value="">Selecciona una opción</option>
                                <option value="Desayuno" <?= in_array("Desayuno", $tipos_registrados) ? "disabled" : "" ?>>Desayuno</option>
                                <option value="Almuerzo" <?= in_array("Almuerzo", $tipos_registrados) ? "disabled" : "" ?>>Almuerzo</option>
                                <option value="Comida" <?= in_array("Comida", $tipos_registrados) ? "disabled" : "" ?>>Comida</option>
                                <option value="Merienda" <?= in_array("Merienda", $tipos_registrados) ? "disabled" : "" ?>>Merienda</option>
                                <option value="Cena" <?= in_array("Cena", $tipos_registrados) ? "disabled" : "" ?>>Cena</option>
                            </select>
                            <label for="gl_1h">Glucosa 1 hora después:</label>
                            <input type="text" id="gl_1h" name="gl_1h" class="form-control" required>

                            <label for="raciones">Raciones de carbohidratos:</label>
                            <input type="text" id="raciones" name="raciones" class="form-control" required>

                            <label for="insulina">Insulina administrada:</label>
                            <input type="text" id="insulina" name="insulina" class="form-control" required>

                            <label for="deporte">Deporte 5-max, 1-min:</label>
                            <input type="number" id="deporte" name="deporte" max="5" class="form-control" required>

                            <label for="lenta">Lenta (Dosis):</label>
                            <input type="text" id="lenta" name="lenta" class="form-control" required>

                            <label for="gl_2h">Glucosa 2 horas después:</label>
                            <input type="text" id="gl_2h" name="gl_2h" class="form-control" required>


                            <label for="estado_glucosa">Estado:</label>
                            <select  id="estado_glucosa" name="estado_glucosa" class="form-control mb-3" required onchange="mostrarCampos()">
                                <option value="">Selecciona una opción</option>
                                <option value="hipo">Hipoglucemia</option>
                                <option value="hiper">Hiperglucemia</option>
                            </select>

                            <div id="campo_hipo" class="mb-3" style="display: none;">
                            <label for="glucosaHipo">Glucosa:</label>
                            <input type="number" id="glucosaHipo" name="glucosaHipo" class="form-control">

                                <label for="horaHipo">¿A que Hora?</label>
                                <input type="time" id="horaHipo" name="horaHipo" class="form-control">
                            </div>

                            <div id="campo_hiper" class="mb-3" style="display: none;">
                                <label for="glucosa">Glucosa:</label>
                                <input type="number" id="glucosa" name="glucosa" class="form-control">

                                <label for="hora">¿A que Hora?</label>
                                <input type="time" id="hora" name="hora" class="form-control">

                                <label for="corr">Glucosa corregida:</label>
                                <input type="text" id="corr" name="corr" class="form-control">
                            </div>
                                <input type="submit" value="Enviar" class="btn btn-primary">
                        </form>

                        <script>
                            function mostrarCampos() {
                                let seleccion = document.getElementById("estado_glucosa").value;
                                document.getElementById("campo_hipo").style.display = seleccion === "hipo" ? "block" : "none";
                                document.getElementById("campo_hiper").style.display = seleccion === "hiper" ? "block" : "none";
                            }
                        </script>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>