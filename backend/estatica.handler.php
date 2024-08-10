<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user'])) {
    header('Location: index.php'); // Redirigir al login si no está autenticado
    exit();
}

?>