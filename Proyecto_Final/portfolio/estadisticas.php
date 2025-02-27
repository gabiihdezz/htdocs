<?php
session_start();
require('../util/funciones.php');

if (!isset($_SESSION['id_usu'])) {
    header("Location: login.php");
    exit();
}

$id_usu = $_SESSION["id_usu"];
$fecha = isset($_SESSION["fecha"]) ? $_SESSION["fecha"] : "No disponible";

// Consultas generales
$query_stats = "SELECT AVG(gl_1h) AS promedio_glucosa_1h, AVG(gl_2h) AS promedio_glucosa_2h FROM comida WHERE id_usu = ?";
$query_hipo_count = "SELECT COUNT(*) AS total_hipoglucemias FROM hipoglucemia WHERE id_usu = ?";
$query_hiper_count = "SELECT COUNT(*) AS total_hiperglucemias FROM hiperglucemia WHERE id_usu = ?";

// Consultas último mes
$query_stats_month = "SELECT AVG(gl_1h) AS promedio_glucosa_1h, AVG(gl_2h) AS promedio_glucosa_2h FROM comida WHERE id_usu = ? AND fecha >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
$query_hipo_count_month = "SELECT COUNT(*) AS total_hipoglucemias FROM hipoglucemia WHERE id_usu = ? AND fecha >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
$query_hiper_count_month = "SELECT COUNT(*) AS total_hiperglucemias FROM hiperglucemia WHERE id_usu = ? AND fecha >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";

$stmt_stats = $conn->prepare($query_stats);
$stmt_stats->bind_param("i", $id_usu);
$stmt_stats->execute();
$result_stats = $stmt_stats->get_result()->fetch_assoc();
$stmt_stats->free_result();

$stmt_hipo_count = $conn->prepare($query_hipo_count);
$stmt_hipo_count->bind_param("i", $id_usu);
$stmt_hipo_count->execute();
$result_hipo_count = $stmt_hipo_count->get_result()->fetch_assoc();
$stmt_hipo_count->free_result();

$stmt_hiper_count = $conn->prepare($query_hiper_count);
$stmt_hiper_count->bind_param("i", $id_usu);
$stmt_hiper_count->execute();
$result_hiper_count = $stmt_hiper_count->get_result()->fetch_assoc();
$stmt_hiper_count->free_result();

$stmt_stats_month = $conn->prepare($query_stats_month);
$stmt_stats_month->bind_param("i", $id_usu);
$stmt_stats_month->execute();
$result_stats_month = $stmt_stats_month->get_result()->fetch_assoc();
$stmt_stats_month->free_result();

$stmt_hipo_count_month = $conn->prepare($query_hipo_count_month);
$stmt_hipo_count_month->bind_param("i", $id_usu);
$stmt_hipo_count_month->execute();
$result_hipo_count_month = $stmt_hipo_count_month->get_result()->fetch_assoc();
$stmt_hipo_count_month->free_result();

$stmt_hiper_count_month = $conn->prepare($query_hiper_count_month);
$stmt_hiper_count_month->bind_param("i", $id_usu);
$stmt_hiper_count_month->execute();
$result_hiper_count_month = $stmt_hiper_count_month->get_result()->fetch_assoc();
$stmt_hiper_count_month->free_result();

$stmt_stats->close();
$stmt_hipo_count->close();
$stmt_hiper_count->close();
$stmt_stats_month->close();
$stmt_hipo_count_month->close();
$stmt_hiper_count_month->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas del Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
        
        <a href="menu.php" class="btn btn-link mt-2">← Volver al Menú</a>
        <h2 class="text-center text-primary">📊 Estadísticas Generales</h2>
    <p class="fs-4 text-center">📅 Datos recopilados de tus registros.</p>
    
    <div class="fs-4 text-center"> Estadisticas del último mes</div>
    <div class="row text-center">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary p-3">
                <h5>Promedio Glucosa 1h</h5>
                <h3><?= number_format($result_stats_month['promedio_glucosa_1h'], 2) ?></h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success p-3">
                <h5>Promedio Glucosa 2h</h5>
                <h3><?= number_format($result_stats_month['promedio_glucosa_2h'], 2) ?></h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-danger p-3">
                <h5>Total Hipoglucemias</h5>
                <h3><?= $result_hipo_count_month['total_hipoglucemias'] ?></h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning p-3">
                <h5>Total Hiperglucemias</h5>
                <h3><?= $result_hiper_count_month['total_hiperglucemias'] ?></h3>
            </div>
        </div>
    </div>
    <div class="fs-4 text-center"> Estadisticas totales: </div>
    <div class="row text-center">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary p-3">
                <h5>Promedio Glucosa 1h</h5>
                <h3><?= number_format($result_stats['promedio_glucosa_1h'], 2) ?></h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success p-3">
                <h5>Promedio Glucosa 2h</h5>
                <h3><?= number_format($result_stats['promedio_glucosa_2h'], 2) ?></h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-danger p-3">
                <h5>Total Hipoglucemias</h5>
                <h3><?= $result_hipo_count['total_hipoglucemias'] ?></h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning p-3">
                <h5>Total Hiperglucemias</h5>
                <h3><?= $result_hiper_count['total_hiperglucemias'] ?></h3>
            </div>
        </div>
    </div>


    <script>
    const ctx = document.getElementById('glucoseChart').getContext('2d');
    const glucoseChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Glucosa 1h Prom.', 'Glucosa 2h Prom.', 'Hipoglucemias', 'Hiperglucemias'],
            datasets: [
                {
                    label: 'General',
                    data: [
                        <?= $result_stats['promedio_glucosa_1h'] ?>,
                        <?= $result_stats['promedio_glucosa_2h'] ?>,
                        <?= $result_hipo_count['total_hipoglucemias'] ?>,
                        <?= $result_hiper_count['total_hiperglucemias'] ?>
                    ],
                    backgroundColor: 'blue'
                },
                {
                    label: 'Último Mes',
                    data: [
                        <?= $result_stats_month['promedio_glucosa_1h'] ?>,
                        <?= $result_stats_month['promedio_glucosa_2h'] ?>,
                        <?= $result_hipo_count_month['total_hipoglucemias'] ?>,
                        <?= $result_hiper_count_month['total_hiperglucemias'] ?>
                    ],
                    backgroundColor: 'orange'
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            }
        }
    });
</script>
</body>
</html>
