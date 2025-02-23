<?php
include 'db.php';

$result = $conn->query("SELECT COUNT(*) as total, AVG(edad) as edad_promedio FROM pacientes");
$stats = $result->fetch_assoc();

echo "<h2>Estadísticas</h2>";
echo "Total de pacientes: " . $stats['total'] . "<br>";
echo "Edad promedio: " . round($stats['edad_promedio'], 2);
?>