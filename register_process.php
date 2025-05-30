<?php
session_start();
include 'db.php';

// Verificar CSRF token
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $_SESSION['register_error'] = "Error de validación CSRF.";
    $_SESSION['show_register'] = true;
    header("Location: ../login.php");
    exit();
}

// Obtener y limpiar datos
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Validar campos
if (empty($name) || empty($email) || empty($password)) {
    $_SESSION['register_error'] = "Todos los campos son obligatorios.";
    $_SESSION['show_register'] = true;
    header("Location: ../login.php");
    exit();
}

// Validar formato de correo
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['register_error'] = "Correo electrónico inválido.";
    $_SESSION['show_register'] = true;
    header("Location: ../login.php");
    exit();
}

// Verificar si el correo ya está registrado
$query = "SELECT id_user FROM registro_usuarios WHERE correo = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
if ($stmt->get_result()->num_rows > 0) {
    $_SESSION['register_error'] = "El correo ya está registrado.";
    $_SESSION['show_register'] = true;
    header("Location: ../login.php");
    exit();
}
$stmt->close();

// Insertar usuario (plaintext password)
$query = "INSERT INTO registro_usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $name, $email, $password);
if ($stmt->execute()) {
    $_SESSION['register_success'] = "✅ Registro exitoso. Ahora puedes iniciar sesión.";
    $_SESSION['show_register'] = false; // Show login form
} else {
    $_SESSION['register_error'] = "Error al registrar: " . $stmt->error;
    $_SESSION['show_register'] = true;
}
$stmt->close();
$conn->close();
header("Location: ../login.php");
exit();
?>