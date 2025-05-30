<?php
session_start();

$id_plantilla = $_GET['id_plantilla'] ?? null;
$id_curriculum = $_GET['id_curriculum'] ?? null;

if (!$id_plantilla || !$id_curriculum) {
    die("Faltan datos para mostrar la plantilla: id_plantilla=$id_plantilla, id_curriculum=$id_curriculum");
}

include 'db/db.php';

// Obtener los datos del usuario principal asociado al curriculum
$query = "SELECT * FROM usuarios WHERE id_curriculum = ? LIMIT 1";
$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Error en la preparación de la consulta de usuario: " . $conn->error);
}
$stmt->bind_param("i", $id_curriculum);
$stmt->execute();
$result = $stmt->get_result();
$datos_usuario = $result->fetch_assoc();
$stmt->close();

if (!$datos_usuario) {
    die("No se encontraron los datos del usuario para id_curriculum: $id_curriculum");
}

// Obtener la ruta de la plantilla desde la base de datos
$query_plantilla = "SELECT ruta_archivo FROM plantilla WHERE id_plantilla = ?";
$stmt = $conn->prepare($query_plantilla);
if (!$stmt) {
    die("Error en la preparación de la consulta de plantilla: " . $conn->error);
}
$stmt->bind_param("i", $id_plantilla);
$stmt->execute();
$result_plantilla = $stmt->get_result();
$plantilla = $result_plantilla->fetch_assoc();
$stmt->close();

if (!$plantilla) {
    die("No se encontró la plantilla para id_plantilla: $id_plantilla");
}

$ruta_plantilla = $plantilla['ruta_archivo'];


// Verifica si el archivo de plantilla existe
if (!file_exists($ruta_plantilla)) {
    die("La plantilla no se encuentra en la ruta especificada: $ruta_plantilla");
}


// Leer el contenido de la plantilla
$html = file_get_contents($ruta_plantilla);
if (empty($html)) {
    die("El archivo de plantilla está vacío: $ruta_plantilla");
}


// Reemplazar las variables en la plantilla con los datos del usuario
// Construir base_url dinámicamente para rutas absolutas correctas
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$script_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/';
$base_url = $protocolo . '://' . $host . $script_dir;

$foto_nombre = isset($datos_usuario['foto']) ? $datos_usuario['foto'] : '';
$foto_ruta_servidor = 'uploads/' . $foto_nombre;
$foto_url = $base_url . 'uploads/' . rawurlencode($foto_nombre);

$ruta_foto = (!empty($foto_nombre) && file_exists($foto_ruta_servidor))
    ? $foto_url
    : $base_url . 'plantillas cv/profile-placeholder.png';

// Depuración: guardar la ruta de la foto generada
file_put_contents('debug_ruta_foto.txt', $ruta_foto);

$html = str_replace('{{puesto}}', htmlspecialchars($datos_usuario['puesto'] ?? 'Sin puesto'), $html);
$html = str_replace('{{imagen}}', $ruta_foto, $html);
$html = str_replace('{{nombre}}', htmlspecialchars($datos_usuario['nombre'] ?? 'Sin nombre'), $html);
$html = str_replace('{{correo}}', htmlspecialchars($datos_usuario['correo'] ?? 'Sin correo'), $html);
$html = str_replace('{{telefono}}', htmlspecialchars($datos_usuario['telefono'] ?? 'Sin teléfono'), $html);
$html = str_replace('{{direccion}}', htmlspecialchars($datos_usuario['direccion'] ?? 'Sin dirección'), $html);
$html = str_replace('{{sobremi}}', htmlspecialchars($datos_usuario['sobremi'] ?? 'Sin descripción'), $html);

// Guardar el HTML generado tras el reemplazo de variables para depuración
file_put_contents('debug_template.html', $html); // Save replaced template for debugging

// Habilidades
$query_habilidades = "SELECT habilidad FROM habilidades WHERE id_curriculum = ?";
$stmt = $conn->prepare($query_habilidades);
$stmt->bind_param("i", $id_curriculum);
$stmt->execute();
$result_habilidades = $stmt->get_result();

$habilidades_html = '';
while ($row = $result_habilidades->fetch_assoc()) {
    $habilidades_html .= '<li>' . htmlspecialchars($row['habilidad']) . '</li>';
}
$html = preg_replace('#<ul id="preview-habilidades">.*?</ul>#s', '<ul id="preview-habilidades">' . $habilidades_html . '</ul>', $html);
$stmt->close();

// Experiencia laboral
$query_experiencia = "SELECT * FROM experiencias WHERE id_curriculum = ?";
$stmt = $conn->prepare($query_experiencia);
$stmt->bind_param("i", $id_curriculum);
$stmt->execute();
$result_experiencia = $stmt->get_result();

$experiencia_html = '';
while ($row = $result_experiencia->fetch_assoc()) {
    $experiencia_html .= "<div class='exp-item'>";
    $experiencia_html .= '<h4>' . htmlspecialchars($row['puesto']) . ' - ' . htmlspecialchars($row['empresa']) . '</h4>';
    $experiencia_html .= '<p>' . htmlspecialchars($row['fecha_inicio']) . ' - ' . htmlspecialchars($row['fecha_fin']) . '</p>';
    $experiencia_html .= '<p>' . htmlspecialchars($row['descripcion']) . '</p>';
    $experiencia_html .= "</div>";
}
$html = preg_replace('#<div id="preview-experiencia">.*?</div>#s', '<div id="preview-experiencia">' . $experiencia_html . '</div>', $html);
$stmt->close();

// Formación
$query_formacion = "SELECT * FROM educacion WHERE id_curriculum = ?";
$stmt = $conn->prepare($query_formacion);
$stmt->bind_param("i", $id_curriculum);
$stmt->execute();
$result_formacion = $stmt->get_result();

$formacion_html = '';
while ($row = $result_formacion->fetch_assoc()) {
    $formacion_html .= "<div class='edu-item'>";
    $formacion_html .= '<h4>' . htmlspecialchars($row['titulo']) . ' - ' . htmlspecialchars($row['institucion']) . '</h4>';
    $formacion_html .= '<p>' . htmlspecialchars($row['fecha_graduacion']) . '</p>';
    $formacion_html .= "</div>";
}
$html = preg_replace('#<div id="preview-formacion">.*?</div>#s', '<div id="preview-formacion">' . $formacion_html . '</div>', $html);
$stmt->close();

// Idiomas dinámicos
$query_idiomas = "SELECT idioma, dominio FROM idiomas WHERE id_curriculum = ?";
$stmt = $conn->prepare($query_idiomas);
$stmt->bind_param("i", $id_curriculum);
$stmt->execute();
$result_idiomas = $stmt->get_result();

$idiomas_html = '';
while ($row = $result_idiomas->fetch_assoc()) {
    $idiomas_html .= '<li>' . htmlspecialchars($row['idioma']) . ' - ' . htmlspecialchars($row['dominio']) . '%</li>';
}
$html = preg_replace('#<section class="languages">\s*<h2>IDIOMAS</h2>(.*?)</section>#s', '<section class="languages"><h2>IDIOMAS</h2><ul>' . $idiomas_html . '</ul></section>', $html);
$stmt->close();

// Asegurar una estructura HTML válida
$css_file = '';
if ($id_plantilla == 1) {
    $css_file = 'plantillas cv/styles_moderno.css';
} elseif ($id_plantilla == 2) {
    $css_file = 'plantillas cv/styles_clasico.css';
} elseif ($id_plantilla == 3) {
    $css_file = 'plantillas cv/stylesplantilla1.css';
}

$html = '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CV Generado</title>
    <link rel="stylesheet" href="' . $css_file . '">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .page-container {
            width: 210mm;
            height: 297mm;
            margin: 20px auto; /* centrado */
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 0;
        }

        #plantilla {
            width: 100%;
            height: 100%;
        }

        div.botones {
            text-align: center;
            margin: 20px 0;
        }

        div.botones button {
            background-color: #007BFF !important;
            border: none !important;
            color: white !important;
            padding: 10px 20px !important;
            margin: 10px !important;
            border-radius: 5px !important;
            font-size: 16px !important;
            cursor: pointer !important;
            transition: background-color 0.3s ease !important;
        }

        div.botones button:hover {
            background-color: #0056b3 !important;
        }

        @media print {
            body, html {
                margin: 0 !important;
                padding: 0 !important;
                background: white !important;
            }

            .page-container {
                margin: 0 !important;
                padding: 0 !important;
                box-shadow: none !important;
                width: 210mm !important;
                height: 297mm !important;
            }

            div.botones {
                display: none !important;
            }

            .exp-item, .edu-item {
                page-break-inside: avoid;
                break-inside: avoid;
            }
        }
    </style>
</head>
<body>

    <div class="page-container">
        <div id="plantilla">' . $html . '</div>
    </div>

    <div class="botones">
        <a href="index.php"><button>Regresar al inicio</button></a>
        <button onclick="guardarPDF()" class="guardar-pdf-btn">Guardar como PDF</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        async function guardarPDF() {
            const element = document.getElementById("plantilla");
            const canvas = await html2canvas(element, {
                scale: 3,
                useCORS: true,
                scrollY: -window.scrollY
            });

            const imgData = canvas.toDataURL("image/jpeg", 1.0);
            const pdf = new jspdf.jsPDF({
                orientation: "portrait",
                unit: "mm",
                format: "a4"
            });

            const pageWidth = 210;
            const pageHeight = 297;
            const imgProps = pdf.getImageProperties(imgData);
            const pdfWidth = pageWidth;
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

            pdf.addImage(imgData, "JPEG", 0, 0, pdfWidth, pdfHeight);
            pdf.save("mi_curriculum.pdf");
        }
    </script>
</body>
</html>';






// Depuración: Guardar el HTML generado
file_put_contents('debug_cv.html', $html);

// Mostrar el HTML
echo $html;
?>