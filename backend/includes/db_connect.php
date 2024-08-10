<?php
// Constantes para la conexión a la base de datos
$servername = 'localhost';
$username = 'obuitragocamelo';
$password = 'Obc19447/*';
$dbname = 'mi_proyecto';

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
