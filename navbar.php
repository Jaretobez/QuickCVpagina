
<style>

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
    background-color: var(--background-color);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.nav-logo {
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--primary-color);
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 2rem;
}

.nav-links a {
    text-decoration: none;
    color: var(--text-color);
    transition: color 0.3s ease;
}

.nav-links a:hover {
    color: var(--primary-color);
}
</style>

    <nav class="navbar">
    <div class="nav-logo">QuickCV</div>
<ul class="nav-links">
    <li><a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Inicio</a></li>
    <li><a href="templates.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'templates.php' ? 'active' : ''; ?>">Plantillas</a></li>
    <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="templates.php" class="cta-button">Crear CV</a></li>
        <li><a href="logout.php" class="logout-link">Cerrar Sesión</a></li>
    <?php else: ?>
        <li><a href="login.php">Iniciar Sesión</a></li>
    <?php endif; ?>
</ul>
</nav>