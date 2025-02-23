<?php
include 'db.php';

$sql = "SELECT 
            p.id AS paciente_id, p.nombre, p.edad, p.diagnostico, 
            c.id AS control_id, c.fecha, c.glucosa, c.presion, c.observaciones 
        FROM pacientes p 
        LEFT JOIN controles c ON p.id = c.paciente_id 
        ORDER BY p.id, c.fecha DESC"; // Ordena por paciente y fecha de control más reciente

$result = $conn->query($sql);
?>

<h2>Pacientes y Controles Médicos</h2>
<table border="1">
    <tr>
        <th colspan="4">Paciente</th>
        <th colspan="4">Controles Médicos</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Diagnóstico</th>
        <th>ID Control</th>
        <th>Fecha</th>
        <th>Glucosa</th>
        <th>Presión</th>
        <th>Observaciones</th>
        <th>Acciones</th>
    </tr>
    <?php
    $prev_paciente_id = null;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        
        // Si el paciente es diferente al anterior, lo mostramos
        if ($prev_paciente_id !== $row['paciente_id']) {
            echo "<td rowspan='2'>{$row['paciente_id']}</td>
                  <td rowspan='2'>{$row['nombre']}</td>
                  <td rowspan='2'>{$row['edad']}</td>
                  <td rowspan='2'>{$row['diagnostico']}</td>";
            $prev_paciente_id = $row['paciente_id'];
        }

        // Mostrar datos del control (pueden repetirse si hay varios controles)
        echo "<td>{$row['control_id']}</td>
              <td>{$row['fecha']}</td>
              <td>{$row['glucosa']}</td>
              <td>{$row['presion']}</td>
              <td>{$row['observaciones']}</td>
              <td>
                  <a href='modificar_control.php?id={$row['control_id']}'>Editar</a> |
                  <a href='borrar_control.php?id={$row['control_id']}' onclick='return confirm(\"¿Seguro que quieres eliminar?\")'>Eliminar</a>
              </td>
          </tr>";
    }
    ?>
</table>

<a href="index.php">Volver al Inicio</a>
