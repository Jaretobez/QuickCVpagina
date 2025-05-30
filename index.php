<?php
session_start();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickCV - Generador de Currículums Express</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
<?php include 'navbar.php'; ?>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Crea tu CV profesional en minutos</h1>
                <p>Diseña un currículum que destaque con nuestras plantillas profesionales y herramientas fáciles de usar.</p>
                <a href="templates.php" class="cta-button">Comenzar Ahora</a>
            </div>
            <div class="hero-image">
                <svg viewBox="0 0 200 200" class="decoration-svg">
                    <rect x="20" y="20" width="160" height="160" rx="10" fill="#e0e7ff"/>
                    <rect x="40" y="40" width="120" height="20" rx="5" fill="#3b82f6"/>
                    <rect x="40" y="80" width="120" height="10" rx="5" fill="#93c5fd"/>
                    <rect x="40" y="100" width="120" height="10" rx="5" fill="#93c5fd"/>
                    <rect x="40" y="120" width="80" height="10" rx="5" fill="#93c5fd"/>
                </svg>
            </div>
        </section>

        <section class="features">
            <h2>¿Por qué elegir QuickCV?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <svg class="feature-icon" viewBox="0 0 24 24">
                        <path fill="#3b82f6" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                    <h3>Plantillas Profesionales</h3>
                    <p>Diseños modernos y atractivos para todo tipo de profesiones.</p>
                </div>
                <div class="feature-card">
                    <svg class="feature-icon" viewBox="0 0 24 24">
                        <path fill="#3b82f6" d="M13 2v7h7v13H4V2h9zm2 4V3.5L18.5 7H15z"/>
                    </svg>
                    <h3>Fácil de Usar</h3>
                    <p>Interfaz intuitiva que te permite crear tu CV en minutos.</p>
                </div>
                <div class="feature-card">
                    <svg class="feature-icon" viewBox="0 0 24 24">
                        <path fill="#3b82f6" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                    </svg>
                    <h3>Formato Profesional</h3>
                    <p>Currículums optimizados para sistemas de seguimiento.</p>
                </div>
            </div>
        </section>

        <section class="popular-templates">
            <h2>Plantillas Populares</h2>
            <p class="section-description">Explora nuestras plantillas más utilizadas por profesionales</p>
            
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="template-preview">
<div class="preview-image moderno" style="display:flex;align-items:center;justify-content:center;background:#f4f4f4;padding:0;margin:0;min-height:260px;max-height:260px;">
    <img src="uploads/cvmoderno.png" alt="Vista previa Moderno" style="width:210px;height:260px;object-fit:cover;border-radius:8px;display:block;box-shadow:0 2px 8px #0001;">
</div>
                            <div class="preview-info">
                                <h3>Moderno</h3>
                                <p>Diseño contemporáneo para destacar</p>
                                <a href="generator.php?template=moderno" class="preview-button">Usar Plantilla</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="template-preview">
<div class="preview-image clasico" style="display:flex;align-items:center;justify-content:center;background:#f4f4f4;padding:0;margin:0;min-height:260px;max-height:260px;">
    <img src="uploads/cvclasico2.png" alt="Vista previa Clasico" style="width:210px;height:260px;object-fit:cover;border-radius:8px;display:block;box-shadow:0 2px 8px #0001;">
</div>
                            <div class="preview-info">
                                <h3>Clásico</h3>
                                <p>Formato tradicional y efectivo</p>
                                <a href="generator.html?template=clasico" class="preview-button">Usar Plantilla</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="template-preview">
<div class="preview-image minimalista" style="display:flex;align-items:center;justify-content:center;background:#f4f4f4;padding:0;margin:0;min-height:260px;max-height:260px;">
    <img src="uploads/cvminimalista.png" alt="Vista previa Minimalista" style="width:210px;height:260px;object-fit:cover;border-radius:8px;display:block;box-shadow:0 2px 8px #0001;">
</div>
                            <div class="preview-info">
                                <h3>Minimalista</h3>
                                <p>Diseño limpio y directo</p>
                                <a href="generator.html?template=minimalista" class="preview-button">Usar Plantilla</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="templates-cta">
                <a href="templates.php" class="cta-button">Ver Más Plantillas</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 QuickCV - Todos los derechos reservados</p>
    </footer>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>