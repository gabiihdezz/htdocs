<?php
include 'db.php';

$sql = "SELECT c.id, c.fecha, c.glucosa, c.presion, c.observaciones, p.nombre 
        FROM controles c
        JOIN pacientes p ON c.paciente_id = p.id"; // Relación con pacientes

$result = $conn->query($sql);

echo "<h2>Lista de Controles Médicos</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>Paciente:</strong> " . $row["nombre"] . " | 
                  <strong>Fecha:</strong> " . $row["fecha"] . " | 
                  <strong>Glucosa:</strong> " . $row["glucosa"] . " | 
                  <strong>Presión:</strong> " . $row["presion"] . " | 
                  <strong>Observaciones:</strong> " . $row["observaciones"] . "</p>";
    }
} else {
    echo "No hay controles registrados.";
}

$conn->close();
?>
