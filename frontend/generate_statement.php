<?php
session_start();
include_once 'includes/db_connect.php';
include_once 'includes/funciones.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$usuario_id = $_SESSION['user']['id'];

// Obtener el extracto de puntos del usuario
$extracto_puntos = generatePointsStatement($usuario_id);

// Mostrar el extracto de puntos en formato HTML o PDF, etc.
echo "<pre>";
print_r($extracto_puntos);
echo "</pre>";
?>
