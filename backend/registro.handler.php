<?php
session_start();
include_once 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';
    $rol = isset($_POST['rol']) ? $_POST['rol'] : '';

    // Validar los datos
    if (empty($nombre) || empty($correo) || empty($contraseña) || empty($rol)) {
        echo "Por favor, completa todos los campos del formulario.";
        exit;
    }

    // Hashear la contraseña antes de guardarla en la base de datos
    $contraseña_hashed = password_hash($contraseña, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, correo, contraseña, rol) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $nombre, $correo, $contraseña_hashed, $rol);

        if ($stmt->execute()) {
            header('Location: ../frontend/login.php'); // Redirigir al login después del registro exitoso
            exit;
        } else {
            echo 'Error al registrar el usuario: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta: ' . $conn->error;
    }
}

$conn->close();
?>
