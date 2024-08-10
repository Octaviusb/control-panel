<?php
// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
if (!function_exists('isUserAuthenticated')) {
    function isUserAuthenticated() {
        return isset($_SESSION['user']);
    }
}

// Obtener el ID del usuario autenticado (si está disponible)
if (!function_exists('getAuthenticatedUserId')) {
    function getAuthenticatedUserId() {
        return isUserAuthenticated() ? $_SESSION['user']['id'] : null;
    }
}

// Método para cerrar sesión
if (!function_exists('logoutUser')) {
    function logoutUser() {
        // Limpiar la sesión y redirigir al inicio de sesión
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit;
    }
}
?>

// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
function isUserAuthenticated() {
    return isset($_SESSION['user']);
}

// Obtener el ID del usuario autenticado (si está disponible)
function getAuthenticatedUserId() {
    return isUserAuthenticated() ? $_SESSION['user']['id'] : null;
}

// Método para cerrar sesión
function logoutUser() {
    // Limpiar la sesión y redirigir al inicio de sesión
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
