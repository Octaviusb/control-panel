<?php
session_start();

// Verificar si se ha enviado una imagen
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === 0) {
    // Directorio donde se guardará la imagen
    $uploadDir = 'uploads/';

    // Generar un nombre único para la imagen
    $fileName = uniqid('profile_', true) . '.' . pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);

    // Ruta completa de la imagen
    $uploadPath = $uploadDir . $fileName;

    // Mover la imagen al directorio de destino
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadPath)) {
        // Guardar la ruta de la imagen en la sesión del usuario
        $_SESSION['user']['profile_picture'] = $uploadPath;

        // Redirigir a la página de perfil o a donde sea necesario
        header('Location: perfil.php');
        exit;
    } else {
        echo 'Error al subir la imagen.';
    }
} else {
    echo 'No se ha seleccionado ninguna imagen o ha ocurrido un error.';
}
?>
