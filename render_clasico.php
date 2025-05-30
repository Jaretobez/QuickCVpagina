<?php
function renderClasico($data) {
    $template = file_get_contents('plantillas cv/plantilla_clasica.html');

    // Reemplazos básicos
    $template = str_replace('{{nombre}}', $data['nombre'], $template);
    $template = str_replace('{{puesto}}', $data['puesto'] ?? '', $template);
    $template = str_replace('{{correo}}', $data['correo'], $template);
    $template = str_replace('{{telefono}}', $data['telefono'], $template);
    $template = str_replace('{{direccion}}', $data['direccion'], $template);
    $template = str_replace('{{sobremi}}', $data['sobremi'] ?? '', $template);
    $template = str_replace('{{imagen}}', $data['imagen'], $template);

    // Habilidades
    $habilidades_html = '';
    foreach ($data['habilidades'] as $skill) {
        $habilidades_html .= "<li>$skill</li>";
    }
    $template = str_replace('{{habilidades}}', $habilidades_html, $template);

    // Experiencia
    $experiencia_html = '';
    foreach ($data['experiencia'] as $exp) {
        $experiencia_html .= "
        <div class='exp'>
            <h4>{$exp['puesto']} - {$exp['empresa']}</h4>
            <p>{$exp['fecha_inicio']} - {$exp['fecha_fin']}</p>
            <p>{$exp['descripcion']}</p>
        </div>";
    }
    $template = str_replace('{{experiencia}}', $experiencia_html, $template);

    // Formación
    $formacion_html = '';
    foreach ($data['formacion'] as $edu) {
        $formacion_html .= "
        <div class='edu'>
            <h4>{$edu['titulo']} - {$edu['institucion']}</h4>
            <p>{$edu['anio_graduacion']}</p>
        </div>";
    }
    $template = str_replace('{{formacion}}', $formacion_html, $template);

    return $template;
}
