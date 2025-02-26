<?php
session_start();
require('../util/funciones.php');

if (!isset($_SESSION['id_usu'])) {
    header("Location: login.php");
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


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registros del Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="../util/logo.png" type="image/x-icon">
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
        
        
        <a href="menu.php" class="btn btn-link mt-4">← Volver al Menú</a>
        <h2 class="text-center text-primary mt-4">Tus Registros</h2>
        <p class="fs-3 text-center">La fecha que has seleccionado: <b class="text-primary"><?= htmlspecialchars($fecha) ?> </b></p>
        <h3 class="mt-4">Escoge una consulta para Borrar: </h3>
        <!-- Tabla de Control de Glucosa -->
        <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th colspan="4"></th>
                <th colspan="2">Hipoglucemia</th>
                <th colspan="3">Hiperglucemia</th>
                <th colspan="2"></th>
            </tr>
            <tr>
                <th>GL/1H</th>
                <th>Rac.</th>
                <th>Insu.</th>
                <th>GL/2H</th>
                <th>GLU.</th>
                <th>Hora</th>
                <th>GLU.</th>
                <th>Hora</th>
                <th>Corrección</th>
                <th>Lenta</th>
                <th>Deporte</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Utilizamos los resultados de las consultas para fusionar los datos
            while ($row_comida = $result_comida->fetch_assoc()) {
                $row_hipo = $result_hipo->fetch_assoc() ?: [];
                $row_hiper = $result_hiper->fetch_assoc() ?: [];
                $row_control = $result_control->fetch_assoc() ?: [];
            
                echo "<tr>";
                // Columna de Comida
                echo "<td>" . htmlspecialchars($row_comida['gl_1h'] ?? 'N/A') . "</td>";
                echo "<td>" . htmlspecialchars($row_comida['raciones'] ?? 'N/A') . "</td>";
                echo "<td>" . htmlspecialchars($row_comida['insulina'] ?? 'N/A') . "</td>";
                echo "<td>" . htmlspecialchars($row_comida['gl_2h'] ?? 'N/A') . "</td>";
            
                // Columna de Hipoglucemia
                echo "<td>" . htmlspecialchars($row_hipo['glucosa'] ?? 'N/A') . "</td>";
                echo "<td>" . htmlspecialchars($row_hipo['hora'] ?? 'N/A') . "</td>";
            
                // Columna de Hiperglucemia
                echo "<td>" . htmlspecialchars($row_hiper['glucosa'] ?? 'N/A') . "</td>";
                echo "<td>" . htmlspecialchars($row_hiper['hora'] ?? 'N/A') . "</td>";
                echo "<td>" . htmlspecialchars($row_hiper['correccion'] ?? 'N/A') . "</td>";
            
                // Columna de Control de Glucosa
                echo "<td>" . htmlspecialchars($row_control['lenta'] ?? 'N/A') . "</td>";
                echo "<td>" . htmlspecialchars($row_control['deporte'] ?? 'N/A') . "</td>";
            
                echo "</tr>";
            }
            
            ?>
            
        </tbody>
    </table>
    <!-- Tabla de Comidas -->
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
