<?php
session_start();
include 'db/db.php';

// Generar CSRF token si no existe
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - QuickCV</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php include 'navbar.php'; ?>

    <main class="login-container">
        <div class="auth-box" id="loginBox">
            <h2>Iniciar Sesión</h2>
            <?php if (isset($_SESSION['login_error'])): ?>
            <div class="alert error">
                <?php echo htmlspecialchars($_SESSION['login_error']); unset($_SESSION['login_error']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['login_success'])): ?>
            <div class="alert success">
                <?php echo htmlspecialchars($_SESSION['login_success']); unset($_SESSION['login_success']); ?>
            </div>
        <?php endif; ?>
            <form id="loginForm" class="auth-form" action="db/login_process.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="cta-button">Iniciar Sesión</button>
            </form>
            <p class="auth-switch">¿No tienes una cuenta? <a href="#" id="showRegister">Regístrate</a></p>
        </div>

        <div class="auth-box hidden" id="registerBox">
            <h2>Registro</h2>
            <?php if (isset($_SESSION['register_error'])): ?>
                <div class="alert error">
                    <?php echo htmlspecialchars($_SESSION['register_error']); unset($_SESSION['register_error']); ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['register_success'])): ?>
                <div class="alert success">
                    <?php echo htmlspecialchars($_SESSION['register_success']); unset($_SESSION['register_success']); ?>
                </div>
            <?php endif; ?>
            <form id="registerForm" class="auth-form" action="db/register_process.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="form-group">
                    <label for="regName">Nombre Completo</label>
                    <input type="text" id="regName" name="name" required>
                </div>
                <div class="form-group">
                    <label for="regEmail">Correo Electrónico</label>
                    <input type="email" id="regEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="regPassword">Contraseña</label>
                    <input type="password" id="regPassword" name="password" required>
                </div>
                <button type="submit" class="cta-button">Registrarse</button>
            </form>
            <p class="auth-switch">¿Ya tienes una cuenta? <a href="#" id="showLogin">Inicia Sesión</a></p>
        </div>
    </main>

    <footer>
        <p>© 2024 QuickCV - Todos los derechos reservados</p>
    </footer>

    <script src="login.js"></script>

    <?php if (isset($_SESSION['show_register']) && $_SESSION['show_register']): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("loginBox").classList.add("hidden");
            document.getElementById("registerBox").classList.remove("hidden");
        });
    </script>
    <?php unset($_SESSION['show_register']); endif; ?>

</body>
</html>