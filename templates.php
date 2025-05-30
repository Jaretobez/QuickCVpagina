<?php
session_start();

// Determine if user is logged in
$is_logged_in = isset($_SESSION['user_id']);

// Define base URLs for each template
$templates = [
    'moderno' => 'generator.php?id_plantilla=1',
    'clasico' => 'generator.php?id_plantilla=2',
    'minimalista' => 'generator.php?id_plantilla=3'
];

// Set link URLs based on login status
$links = [];
foreach ($templates as $key => $url) {
    $links[$key] = $is_logged_in ? $url : 'login.php?redirect=' . urlencode($url);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantillas - QuickCV</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="templates.css">
</head>
<body>
<?php include 'navbar.php'; ?>

    <main class="templates-container">
        <h1>Elige una de Nuestras Plantillas</h1>
        <p class="templates-intro">Elige entre nuestros diseños profesionales para crear tu CV perfecto</p>
        
        <div class="templates-grid">
            <div class="template-card">
                <div class="template-preview moderno">
                    <img src="uploads/cvmoderno.png" alt="Vista previa Moderno" style="width:100%;height:auto;object-fit:cover;border-radius:8px;">
                </div>
                <h3>Moderno</h3>
                <p>Diseño contemporáneo ideal para profesionales creativos</p>
                <a href="<?php echo htmlspecialchars($links['moderno']); ?>" class="cta-button">Usar Plantilla</a>
            </div>
            <div class="template-card">
                <div class="template-preview clasico">
                    <img src="uploads/cvclasico2.png" alt="Vista previa Clasico" style="width:100%;height:auto;object-fit:cover;border-radius:8px;">
                </div>
                <h3>Clásico</h3>
                <p>Diseño tradicional perfecto para roles corporativos</p>
                <a href="<?php echo htmlspecialchars($links['clasico']); ?>" class="cta-button">Usar Plantilla</a>
            </div>
            <div class="template-card">
                <div class="template-preview minimalista">
                    <img src="uploads/cvminimalista.png" alt="Vista previa Minimalista" style="width:100%;height:auto;object-fit:cover;border-radius:8px;">
                </div>
                <h3>Minimalista</h3>
                <p>Diseño limpio y simple que destaca el contenido</p>
                <a href="<?php echo htmlspecialchars($links['minimalista']); ?>" class="cta-button">Usar Plantilla</a>
            </div>
        </div>
    </main>

    <footer>
        <p>© 2024 QuickCV - Todos los derechos reservados</p>
    </footer>
</body>
</html>

