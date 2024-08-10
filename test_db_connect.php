<?php
include_once 'includes/db_connect.php';
include_once 'includes/funciones.php';

if ($conn->ping()) {
    echo "Conexión exitosa";
} else {
    echo "Error de conexión: " . $conn->error;
}

$conn->close();
?>
