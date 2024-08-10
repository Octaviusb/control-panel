<?php
include 'includes/db_connect.php';
include 'includes/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['authorize_redemption'])) {
    $redemptionId = $_POST['redemption_id'];
    $status = $_POST['status'];
    $comments = $_POST['comments'];

    if (authorizeRedemption($conn, $redemptionId, $status, $comments)) {
        $successMessage = "Canje autorizado correctamente.";
    } else {
        $errorMessage = "Error al autorizar el canje: " . $conn->error;
    }
}

// Redirigir al usuario de vuelta a perfil.php o mostrar un mensaje de éxito/error
header('Location: perfil.php');
exit;
?>