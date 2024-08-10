<?php
include_once 'includes/db_connect.php';
include_once 'includes/funciones.php';

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos 'mi_proyecto'";
}

$conn->close();
?>
