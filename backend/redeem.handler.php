<?php
session_start();
include_once 'includes/db_connect.php';
include_once 'includes/funciones.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['beneficio_id'])) {
    $beneficio_id = $_POST['beneficio_id'];
    $usuario_id = $_SESSION['user']['id'];

    // Obtener puntos del usuario
    $puntos_usuario = getEmployeePoints($usuario_id);

    // Obtener puntos necesarios para el canje (simulando un valor fijo por beneficio)
    $puntos_necesarios = 100; // Ajusta este valor según tus necesidades

    if ($puntos_usuario >= $puntos_necesarios) {
        // Realizar el canje de puntos
        redeemPoints($usuario_id, $beneficio_id, $puntos_necesarios);
        echo "Canje de puntos exitoso";
    } else {
        echo "No tienes suficientes puntos para realizar este canje";
    }
}
?>