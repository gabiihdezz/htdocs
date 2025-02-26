<?php
session_start();
require('../util/funciones.php');

if (!isset($_SESSION['id_usu'])) {
    header("Location: login.php");
    exit();
}
if (!isset($_SESSION['fecha'])) {
    header("menu.php");
    exit();
}

$id_usu = $_SESSION["id_usu"];
$fecha = isset($_SESSION["fecha"]) ? $_SESSION["fecha"] : "No disponible";

// Consultas para obtener los datos
$query_control = "SELECT fecha, deporte, lenta FROM control_glucosa WHERE id_usu = ? AND fecha = ?";
$query_comida = "SELECT fecha, tipo_comida, gl_1h, raciones, insulina, gl_2h FROM comida WHERE id_usu = ? AND fecha = ?";
$query_hipo = "SELECT fecha, hora, glucosa, tipo_comida FROM hipoglucemia WHERE id_usu = ? AND fecha = ?";
$query_hiper = "SELECT fecha, hora, glucosa, correccion, tipo_comida FROM hiperglucemia WHERE id_usu = ? AND fecha = ?";

// Preparación de consultas
$stmt_control = $conn->prepare($query_control);
$stmt_control->bind_param("is", $id_usu, $fecha);
$stmt_control->execute();
$result_control = $stmt_control->get_result();
$stmt_control->free_result();

$stmt_comida = $conn->prepare($query_comida);
$stmt_comida->bind_param("is", $id_usu, $fecha);
$stmt_comida->execute();
$result_comida = $stmt_comida->get_result();
$stmt_comida->free_result();

$stmt_hipo = $conn->prepare($query_hipo);
$stmt_hipo->bind_param("is", $id_usu, $fecha);
$stmt_hipo->execute();
$result_hipo = $stmt_hipo->get_result();
$stmt_hipo->free_result();

$stmt_hiper = $conn->prepare($query_hiper);
$stmt_hiper->bind_param("is", $id_usu, $fecha);
$stmt_hiper->execute();
$result_hiper = $stmt_hiper->get_result();
$stmt_hiper->free_result();

register_shutdown_function('handle_fatal_error');

function handle_fatal_error() {
    $error = error_get_last(); // Obtiene el último error


    if ($error !== NULL && $error['type'] === E_ERROR) {
        // Redirige al menu.php en caso de error fatal
        header('Location: menu.php');
        exit();
    }
}

$inactividad_maxima = 1 * 60;  

if (isset($_SESSION['last_activity'])) {
    $tiempo_inactivo = time() - $_SESSION['last_activity']; 

    if ($tiempo_inactivo > $inactividad_maxima) {
        session_unset();
        session_destroy();
        header("Location: ../inicio.php");  
        exit();
    }
}

$_SESSION['last_activity'] = time();

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registros del Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
<body class="container mt-5">
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
                            </ul>
                            <ul class="navbar-nav flex-row flex-wrap ms-md-auto gap-3 align-content-center">
                                <li class="nav-item col-6 col-lg-auto ">
                                    <a class="nav-link py-2 px-0 px-lg-2" href="login.php">Iniciar Sesión</a>
                                </li>
                                <li class="nav-item col-6 col-lg-auto">
                                    <a class="nav-link py-2 px-0 px-lg-2" href="signup.php">Registrarse</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
        
        <a href="menu.php" class="btn btn-link mt-2">← Volver al Menú</a>

    <h2 class="text-center text-primary mt-4">Tus Registros</h2>
    <p class="fs-3 text-center">La fecha que has seleccionado: <b class="text-primary"><?= htmlspecialchars($fecha) ?> </b></p>

    <!-- Tabla de Control de Glucosa -->
    <h3 class="mt-4">Control de Glucosa</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Fecha</th>
                <th>Deporte</th>
                <th>Dosis Lenta</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result_control->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['fecha']) ?></td>
                    <td><?= htmlspecialchars($row['deporte']) ?></td>
                    <td><?= htmlspecialchars($row['lenta']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Tabla de Comidas -->
    <h3 class="mt-4">Comidas Registradas</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Fecha</th>
                <th>Tipo de Comida</th>
                <th>Glucosa 1h</th>
                <th>Raciones</th>
                <th>Insulina</th>
                <th>Glucosa 2h</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result_comida->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['fecha']) ?></td>
                    <td><?= htmlspecialchars($row['tipo_comida']) ?></td>
                    <td><?= htmlspecialchars($row['gl_1h']) ?></td>
                    <td><?= htmlspecialchars($row['raciones']) ?></td>
                    <td><?= htmlspecialchars($row['insulina']) ?></td>
                    <td><?= htmlspecialchars($row['gl_2h']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Tabla de Hipoglucemia -->
    <h3 class="mt-4">Registros de Hipoglucemia</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-danger">
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Glucosa</th>
                <th>Tipo de Comida</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result_hipo->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['fecha']) ?></td>
                    <td><?= htmlspecialchars($row['hora']) ?></td>
                    <td><?= htmlspecialchars($row['glucosa']) ?></td>
                    <td><?= htmlspecialchars($row['tipo_comida']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Tabla de Hiperglucemia -->
    <h3 class="mt-4">Registros de Hiperglucemia</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-warning">
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Glucosa</th>
                <th>Corrección</th>
                <th>Tipo de Comida</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result_hiper->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['fecha']) ?></td>
                    <td><?= htmlspecialchars($row['hora']) ?></td>
                    <td><?= htmlspecialchars($row['glucosa']) ?></td>
                    <td><?= htmlspecialchars($row['correccion']) ?></td>
                    <td><?= htmlspecialchars($row['tipo_comida']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>

<?php
// Cierre de las conexiones
$stmt_control->close();
$stmt_comida->close();
$stmt_hipo->close();
$stmt_hiper->close();
$conn->close();
?>
