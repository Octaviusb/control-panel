<?php
session_start();
include_once 'includes/db_connect.php';
include_once 'includes/funciones.php';

// Verificar si el usuario ya está logueado
if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Manejar el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];
    $otp = isset($_POST['otp']) ? 1 : 0;

    // Consulta a la base de datos
    $sql = "SELECT id, nombre, correo, rol, contraseña, otp FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña usando password_verify
        if (password_verify($password, $user['contraseña'])) {
            // Verificar OTP si está habilitado
            if ($user['otp'] && !$otp) {
                echo 'OTP requerido';
                exit();
            }

            $_SESSION['user'] = $user;
            $_SESSION['role'] = $user['rol']; // Establecer el rol en la sesión

            // Redirigir según el rol del usuario
            if ($_SESSION['role'] == 'admin') {
                header('Location: estatica.php'); // Página de administrador
            } 

            exit(); // Importante salir del script después de redirigir
        } else {
            $error = 'Correo electrónico o contraseña incorrectos';
        }
    } else {
        $error = 'Correo electrónico o contraseña incorrectos';
    }
}
?>  