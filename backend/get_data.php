<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir la conexión a la base de datos
include_once 'includes/db_connect.php';

// Obtener los datos de la tabla "beneficios"
$sql = "SELECT nombre, descripcion FROM beneficios";
$result = $conn->query($sql);

if (!$result) {
    echo json_encode(['error' => 'Error en la consulta']);
    exit;
}

$benefits = [];
while ($row = $result->fetch_assoc()) {
    $benefits[] = $row;
}

// Enviar los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($benefits);
?>
