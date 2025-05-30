<?php
$host = "127.0.0.1";
$usuario = "root";
$contrasena = "1234"; // XAMPP normalmente no tiene contraseña para root
$basedatos = "quickcv4";
$puerto = 3306;

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $basedatos, $puerto);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>


