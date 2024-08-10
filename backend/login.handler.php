<?php
session_start();
include_once 'includes/db_connect.php';
include_once 'includes/funciones.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['login-email']) ? $_POST['login-email'] : '';
    $password = isset($_POST['login-password']) ? $_POST['login-password'] : '';
    $otp = isset($_POST['otp']);

    // Lógica de autenticación
    $user = authenticateUser($email, $password);

    if ($user) {
        if ($user['otp'] && !$otp) {
            $error = 'OTP requerido.';
        } else {
            $_SESSION['user'] = $user;
            $_SESSION['role'] = $user['rol'];

            // Redirigir según el rol del usuario
            if ($_SESSION['role'] == 'admin') {
                header('Location: /frontend/estatica.php');
            } else {
                header('Location: /frontend/index.php'); 
            }
            exit;
        }
    } else {
        $error = 'Credenciales incorrectas o OTP inválido.';
    }
}
?>
