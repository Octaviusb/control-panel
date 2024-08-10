<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include_once 'includes/db_connect.php';
include_once 'includes/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $documento = $_POST['documento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $ciudad = $_POST['ciudad'];

    // Obtener el ID de usuario de la sesión
    $user_id = $_SESSION['user']['id'];

    // Preparar la consulta SQL para actualizar el perfil
    $sql = "UPDATE usuarios SET nombre = ?, documento = ?, fecha_nacimiento = ?, correo = ?, celular = ?, ciudad = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ssssssi", $nombre, $documento, $fecha_nacimiento, $email, $celular, $ciudad, $user_id);
        
        if ($stmt->execute()) {
            echo 'Perfil actualizado exitosamente';
        } else {
            echo 'Error al actualizar el perfil: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta: ' . $conn->error;
    }
}
?>
