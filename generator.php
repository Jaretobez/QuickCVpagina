<?php
session_start();
$id_plantilla = $_POST['id_plantilla'] ?? $_GET['id_plantilla'] ?? null;
$plantilla_html = '';

include 'db/db.php';
include 'render_minimalista.php';
include 'render_moderno.php';
include 'render_clasico.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generar'])) {
    // Subir la foto (opcional)
    $foto = null;
    if (!empty($_FILES['foto']['name'])) {
        $nombreFoto = basename($_FILES['foto']['name']);
        $rutaDestino = 'uploads/' . $nombreFoto;
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }
        move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino);
        $foto = $nombreFoto;
    }

    // 1. Crear el curriculum y obtener el id_curriculum
    $titulo_cv = $_POST['nombre'] . ' - ' . date('Y-m-d');
    // Si tienes login, pon el id del usuario logueado, si no, usa 0
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
    $stmt = $conn->prepare("INSERT INTO curriculum (id_user, plantilla, titulo) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id_user, $id_plantilla, $titulo_cv);
    $stmt->execute();
    $id_curriculum = $stmt->insert_id;
    $stmt->close();

    // 2. Insertar en usuarios (relacionado con curriculum)
    $nombre = $_POST['nombre'];
    $puesto = $_POST['puesto'] ?? '';
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $sobremi = $_POST['sobremi'];
    $stmt = $conn->prepare("INSERT INTO usuarios (id_curriculum, nombre, puesto, correo, telefono, direccion, sobremi, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $id_curriculum, $nombre, $puesto, $correo, $telefono, $direccion, $sobremi, $foto);
    $stmt->execute();
    $usuario_id = $stmt->insert_id;
    $stmt->close();

    // 3. Experiencias
    if (isset($_POST['position'])) {
        foreach ($_POST['position'] as $i => $puesto) {
            $empresa = $_POST['company'][$i];
            $inicio = $_POST['startDate'][$i];
            $fin = $_POST['endDate'][$i];
            $descripcion = $_POST['description'][$i];
            $stmt = $conn->prepare("INSERT INTO experiencias (id_curriculum, usuario_id, puesto, empresa, fecha_inicio, fecha_fin, descripcion) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iisssss", $id_curriculum, $usuario_id, $puesto, $empresa, $inicio, $fin, $descripcion);
            $stmt->execute();
            $stmt->close();
        }
    }

    // 4. Educación
    if (isset($_POST['degree'])) {
        foreach ($_POST['degree'] as $i => $titulo) {
            $institucion = $_POST['institution'][$i];
            $graduacion = $_POST['graduationDate'][$i];
            $stmt = $conn->prepare("INSERT INTO educacion (id_curriculum, usuario_id, titulo, institucion, fecha_graduacion) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iisss", $id_curriculum, $usuario_id, $titulo, $institucion, $graduacion);
            $stmt->execute();
            $stmt->close();
        }
    }

// 5. Habilidades
if (!empty($_POST['skills'])) {
    // Separar por coma y limpiar espacios
    $habilidades = array_map('trim', explode(',', $_POST['skills']));
    foreach ($habilidades as $habilidad) {
        if ($habilidad !== '') {
            $stmt = $conn->prepare("INSERT INTO habilidades (id_curriculum, usuario_id, habilidad) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $id_curriculum, $usuario_id, $habilidad);
            $stmt->execute();
            $stmt->close();
        }
    }
}

    // 6. Idiomas
    if (isset($_POST['language'])) {
        foreach ($_POST['language'] as $i => $idioma) {
            $nivel = $_POST['proficiency'][$i];
            $stmt = $conn->prepare("INSERT INTO idiomas (id_curriculum, usuario_id, idioma, dominio) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iisi", $id_curriculum, $usuario_id, $idioma, $nivel);
            $stmt->execute();
            $stmt->close();
        }
    }

    // Redirección a la plantilla generada
    echo "<script>window.open('generar_plantilla.php?id_plantilla=" . urlencode($id_plantilla) . "&id_curriculum=" . urlencode($id_curriculum) . "', '_blank');</script>";
}

function prepararDatosRender() {
    return [
        'nombre' => $_POST['nombre'] ?? '',
        'puesto' => $_POST['puesto'] ?? '',
        'correo' => $_POST['correo'] ?? '',
        'telefono' => $_POST['telefono'] ?? '',
        'direccion' => $_POST['direccion'] ?? '',
        'imagen' => '',
        'habilidades' => !empty($_POST['skills']) ? array_map('trim', explode(',', $_POST['skills'])) : [],
        'experiencia' => array_map(
            function ($i) {
                return [
                    'puesto' => $_POST['position'][$i] ?? '',
                    'empresa' => $_POST['company'][$i] ?? '',
                    'fecha_inicio' => $_POST['startDate'][$i] ?? '',
                    'fecha_fin' => $_POST['endDate'][$i] ?? '',
                    'descripcion' => $_POST['description'][$i] ?? ''
                ];
            },
            array_keys($_POST['position'] ?? [])
        ),
        'formacion' => array_map(
            function ($i) {
                return [
                    'titulo' => $_POST['degree'][$i] ?? '',
                    'institucion' => $_POST['institution'][$i] ?? '',
                    'anio_graduacion' => $_POST['graduationDate'][$i] ?? '',
                    'descripcion' => ''
                ];
            },
            array_keys($_POST['degree'] ?? [])
        )
    ];
}

// Uso:
if ($id_plantilla == 1) {
    $plantilla_html = renderModerno(prepararDatosRender());
} elseif ($id_plantilla == 2) {
    $plantilla_html = renderClasico(prepararDatosRender());
} elseif ($id_plantilla == 3) {
    $plantilla_html = renderMinimalista(prepararDatosRender());
}

?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de CV - QuickCV</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="generator.css">
 <!-- CSS de las plantillas -->
  <?php if ($id_plantilla == 3): ?>
    <!-- minimalista -->
    <link rel="stylesheet" href="plantillas cv/stylesplantilla1.css">
  <?php elseif ($id_plantilla == 1): ?>
    <!-- moderna -->
    <link rel="stylesheet" href="plantillas cv/styles_moderno.css">
  <?php elseif ($id_plantilla == 2): ?>
    <!-- clásica -->
    <link rel="stylesheet" href="plantillas cv/styles_clasico.css">
  <?php endif; ?>

</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<body>
<?php include 'navbar.php'; ?>

    <main class="generator-container">
        <div class="cv-form">
            <h2>Genera tu CV</h2>


            <form id="cvForm" method="post" enctype="multipart/form-data" action="generator.php" name="quickcv">
                <input type="hidden" name="id_plantilla" value="<?php echo htmlspecialchars($id_plantilla); ?>">
                <section class="form-section">
                    <h3>Información Personal</h3>
                    <div class="form-grid">
                    <div class="form-group photo-upload-container">
                            <label for="photoUpload" class="photo-label">
                                <div class="photo-preview" id="photoPreview">
                                    <svg class="photo-placeholder" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>
                                    <span>Subir Foto</span>
                                </div>
                            </label>
                            <input type="file" id="photoUpload" name="foto" accept="image/*" class="hidden">
                        </div>
                        <div class="form-group">
                            <label for="fullName">Nombre Completo</label>
                            <!--<input type="text" id="fullName" required>-->
                            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="puesto">Puesto</label>
                            <input type="text" id="puesto" name="puesto" placeholder="Puesto deseado">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                           <!-- <input type="email" id="email" required>-->
                           <input type="text" id="correo" name="correo" placeholder="Correo Electronico" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                           <!-- <input type="tel" id="phone">-->
                            <input type="text" id="telefono" name="telefono" placeholder="Teléfono" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Ubicación</label>
                         <!--   <input type="text" id="location">-->
                         <input type="text" id="direccion" name="direccion" placeholder="Direccion" required>
                        </div>
                        <div class="form-group full-width">
                            <label for="sobremi">Sobre Mí</label>
                         <textarea name="sobremi" id="sobremi" placeholder="Habla sobre ti" required></textarea>
                        </div>
                    </div>
                </section>

                <section class="form-section">
                    <h3>Experiencia Laboral</h3>
                    <div id="experienceContainer">
                        <div class="experience-entry">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Puesto</label>
                                    <input type="text" name="position[]">
                                </div>
                                <div class="form-group">
                                    <label>Empresa</label>
                                    <input type="text" name="company[]">
                                </div>
                                <div class="form-group">
                                    <label>Fecha Inicio</label>
                                    <input type="month" name="startDate[]">
                                </div>
                                <div class="form-group">
                                    <label>Fecha Fin</label>
                                    <input type="month" name="endDate[]">
                                </div>
                                <div class="form-group full-width">
                                    <label>Descripción</label>
                                    <textarea name="description[]" rows="3"></textarea>
                                </div>
                                <div class="form-group full-width">
                                    <button type="button" class="remove-button">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="add-button" id="addExperience">+ Añadir Experiencia</button>
                </section>


                <section class="form-section">
                    <h3>Educación</h3>
                    <div id="educationContainer">
                        <div class="education-entry">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="degree[]">
                                </div>
                                <div class="form-group">
                                    <label>Institución</label>
                                    <input type="text" name="institution[]">
                                </div>
                                <div class="form-group">
                                    <label>Año de Graduación</label>
                                    <input type="month" name="graduationDate[]">
                                </div>
                                <div class="form-group full-width">
                                    <button type="button" class="remove-education-button">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="add-button" id="addEducation">+ Añadir Educación</button>
                </section>

<section class="form-section">
    <h3>Habilidades</h3>
    <div class="form-group">
        <input type="text" id="skills" name="skills" placeholder="Ej: HTML, CSS, Trabajo en equipo">
    </div>
</section>

                <section class="form-section">
                    <h3>Idiomas</h3>
                    <div id="languagesContainer">
                        <div class="language-entry">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Idioma</label>
                                    <input type="text" name="language[]" placeholder="Ej. Inglés">
                                </div>
                                <div class="form-group">
                                    <label>Dominio (%)</label>
                                    <input type="range" name="proficiency[]" min="0" max="100" value="50" class="language-slider" oninput="this.nextElementSibling.value = this.value">
                                    <output>50</output>
                                </div>
                                <div class="form-group full-width">
                                    <button type="button" class="remove-language-button">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="add-button" id="addLanguage">+ Añadir Idioma</button>
                </section>

            <button type="submit" name="generar" value="generar" class="cta-button">Generar CV</button>
            </form>
            </div>

                <div class="cv-preview">
                    <h3>Vista Previa</h3>
                    <div id="cvPreview" class="preview-container">
                        <?php echo $plantilla_html; ?>
                    </div>
                </div>
    </main>

    <footer>
        <p>&copy; 2024 QuickCV - Todos los derechos reservados</p>
    </footer>

    <script src="generator.js"></script>
</body>

