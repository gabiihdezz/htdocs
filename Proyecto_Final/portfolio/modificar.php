<?php
session_start();
require ('../util/funciones.php');

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usu'])) {
    header("Location: login.php");
    exit();
}

$id_usu = $_SESSION['id_usu']; // ID del usuario actual
$fecha_sesion = $_SESSION['fecha']; // Suponiendo que tienes la fecha en la sesión

// Consulta para obtener registros de control_glucosa con comparación de fecha
$sql_control = "SELECT * FROM control_glucosa WHERE id_usu = ? AND fecha = ? ORDER BY fecha DESC";
$stmt_control = $conn->prepare($sql_control);
$stmt_control->bind_param("is", $id_usu, $fecha_sesion); // Usar "s" para fecha en formato string
$stmt_control->execute();
$result_control = $stmt_control->get_result();

// Consulta para obtener registros de comida con comparación de fecha
$sql_comida = "SELECT * FROM comida WHERE id_usu = ? AND fecha = ? ORDER BY fecha DESC";
$stmt_comida = $conn->prepare($sql_comida);
$stmt_comida->bind_param("is", $id_usu, $fecha_sesion); // Usar "s" para fecha en formato string
$stmt_comida->execute();
$result_comida = $stmt_comida->get_result();

// Consulta para obtener registros de hipoglucemia con comparación de fecha
$sql_hipo = "SELECT * FROM hipoglucemia WHERE id_usu = ? AND fecha = ? ORDER BY fecha DESC";
$stmt_hipo = $conn->prepare($sql_hipo);
$stmt_hipo->bind_param("is", $id_usu, $fecha_sesion); // Usar "s" para fecha en formato string
$stmt_hipo->execute();
$result_hipo = $stmt_hipo->get_result();

// Consulta para obtener registros de hiperglucemia con comparación de fecha
$sql_hiper = "SELECT * FROM hiperglucemia WHERE id_usu = ? AND fecha = ? ORDER BY fecha DESC";
$stmt_hiper = $conn->prepare($sql_hiper);
$stmt_hiper->bind_param("is", $id_usu, $fecha_sesion); // Usar "s" para fecha en formato string
$stmt_hiper->execute();
$result_hiper = $stmt_hiper->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registros del Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
    
    <h2 class="text-center text-primary mt-3">Tus Registros en la fecha de hoy: <?php var_dump($_SESSION['fecha']) ?></h2>

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
$stmt_control->close();
$stmt_comida->close();
$stmt_hipo->close();
$stmt_hiper->close();
$conn->close();
?>
