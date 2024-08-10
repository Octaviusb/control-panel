// Consulta SQL para obtener la fecha de vencimiento de los puntos para el usuario actual
$sqlFechaVencimiento = "SELECT fecha_vencimiento FROM puntos WHERE usuario_id = ?";
$stmtFechaVencimiento = $conn->prepare($sqlFechaVencimiento);
$stmtFechaVencimiento->bind_param("i", $_SESSION['user']['id']);
$stmtFechaVencimiento->execute();
$resultFechaVencimiento = $stmtFechaVencimiento->get_result();

if ($resultFechaVencimiento->num_rows > 0) {
    $rowFechaVencimiento = $resultFechaVencimiento->fetch_assoc();
    $fechaVencimiento = $rowFechaVencimiento['fecha_vencimiento'];
    // Ahora $fechaVencimiento contiene la fecha de vencimiento de los puntos del usuario
}
