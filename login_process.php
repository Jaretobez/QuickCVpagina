<?php
session_start();
include 'db.php';

// Verificar si el CSRF token es válido
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $_SESSION['login_error'] = "Error de validación CSRF.";
    header("Location: ../login.php");
    exit();
}

// Obtener y limpiar los datos del formulario
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Validar que los campos no estén vacíos
if (empty($email) || empty($password)) {
    $_SESSION['login_error'] = "Todos los campos son obligatorios.";
    header("Location: ../login.php");
    exit();
}

// Buscar usuario en la base de datos
$query = "SELECT id_user, nombre, contrasena FROM registro_usuarios WHERE correo = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Verificar existencia del usuario
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verificar la contraseña (plaintext comparison)
    if ($password === $user['contrasena']) {
        // Contraseña correcta
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['login_success'] = "Bienvenido, " . htmlspecialchars($user['nombre']) . " 👋";
        // Redirect to the original URL, GET parameter, or index.php
        $redirect = $_GET['redirect'] ?? $_SESSION['redirect_url'] ?? '../index.php';
        unset($_SESSION['redirect_url']);
        header("Location: $redirect");
        exit();
    } else {
        // Contraseña incorrecta
        $_SESSION['login_error'] = "Contraseña incorrecta.";
        header("Location: ../login.php");
        exit();
    }
} else {
    // Usuario no encontrado
    $_SESSION['login_error'] = "El correo no está registrado.";
    header("Location: ../login.php");
    exit();
}

$stmt->close();
$conn->close();
?>