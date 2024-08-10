<?php
session_start();
include_once 'includes/db_connect.php';

// Habilitar la visualización de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si los datos del formulario se enviaron por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Validar los datos (opcional)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Por favor, completa todos los campos del formulario.";
        exit;
    }

    // Guardar los datos en la base de datos (ejemplo con la tabla "contactos")
    $sql = "INSERT INTO contactos (nombre, email, mensaje) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $message);
        
        if ($stmt->execute()) {
            echo "Formulario enviado correctamente.";
        } else {
            echo "Error al enviar el formulario: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Método de solicitud no válido.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Formulario</title>
    <link rel="stylesheet" href="submit.css">
</head>
<body>
    <!-- Puedes agregar contenido HTML adicional aquí si es necesario -->
</body>
</html>
