

document.addEventListener("DOMContentLoaded", () => {
// ------------------ EXPERIENCIA ------------------
const experienceContainer = document.getElementById("experienceContainer");
const addExperienceBtn = document.getElementById("addExperience");

// ------------------ EDUCACIÓN ------------------
const educationContainer = document.getElementById("educationContainer");
const addEducationBtn = document.getElementById("addEducation");

// ------------------ HABILIDADES (simple input) ------------------
// No lógica de etiquetas ni inputs ocultos, solo vista previa
const skillsInput = document.getElementById("skills");
const skillsPreview = document.getElementById("preview-habilidades");
if (skillsInput) {
    skillsInput.addEventListener("input", function () {
        skillsPreview.innerHTML = "";
        if (skillsInput.value.trim() !== "") {
            skillsInput.value.split(",").forEach(skill => {
                const li = document.createElement("li");
                li.textContent = skill.trim();
                skillsPreview.appendChild(li);
            });
        }
    });
}

// ------------------ FOTO ------------------
document.getElementById('photoUpload').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const preview = document.getElementById('photoPreview');
    const plantillaFoto = document.getElementById('preview-imagen');

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.innerHTML = '';
            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = 'Foto subida';
            img.style.maxWidth = '100%';
            img.style.maxHeight = '100%';
            img.style.objectFit = 'cover';
            preview.appendChild(img);

            if (plantillaFoto) {
                plantillaFoto.src = e.target.result;
            }
        };
        reader.readAsDataURL(file);
    }
});

// ------------------ EXPERIENCIA ------------------
addExperienceBtn.addEventListener('click', () => {
    const clone = experienceContainer.querySelector(".experience-entry").cloneNode(true);
    clone.querySelectorAll("input, textarea").forEach(input => input.value = '');
    experienceContainer.appendChild(clone);
    updatePreview();
});

experienceContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("remove-button")) {
        const all = experienceContainer.querySelectorAll(".experience-entry");
        if (all.length > 1) {
            e.target.closest(".experience-entry").remove();
            updatePreview();
        } else {
            alert("Debe haber al menos una experiencia laboral.");
        }
    }
});

// ------------------ EDUCACIÓN ------------------
addEducationBtn.addEventListener("click", () => {
    const clone = educationContainer.querySelector(".education-entry").cloneNode(true);
    clone.querySelectorAll("input").forEach(input => input.value = '');
    educationContainer.appendChild(clone);
    updatePreview();
});

educationContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("remove-education-button")) {
        const all = educationContainer.querySelectorAll(".education-entry");
        if (all.length > 1) {
            e.target.closest(".education-entry").remove();
            updatePreview();
        } else {
            alert("Debe haber al menos una entrada de educación.");
        }
    }
});

updatePreview(); // Ejecuta al cargar


});

document.getElementById('addLanguage').addEventListener('click', function () {
const container = document.getElementById('languagesContainer');
const entry = document.createElement('div');
entry.classList.add('language-entry');
entry.innerHTML = `         <div class="form-grid">             <div class="form-group">                 <label>Idioma</label>                 <input type="text" name="language[]" placeholder="Ej. Inglés">             </div>             <div class="form-group">                 <label>Dominio (%)</label>                 <input type="range" name="proficiency[]" min="0" max="100" value="50" class="language-slider" oninput="this.nextElementSibling.value = this.value">                 <output>50</output>             </div>             <div class="form-group full-width">                 <button type="button" class="remove-language-button">Eliminar</button>             </div>         </div>
    `;
container.appendChild(entry);
updatePreview();
});

document.addEventListener('click', function (e) {
if (e.target && e.target.classList.contains('remove-language-button')) {
e.target.closest('.language-entry').remove();
updatePreview();
}
});

// ------------------ ACTUALIZACIÓN DE VISTA PREVIA ------------------
function updatePreview() {
// Información personal
document.getElementById("preview-nombre").textContent = document.getElementById("nombre").value || "Tu nombre";
document.getElementById("preview-puesto").textContent = document.getElementById("puesto").value || "Puesto a postular";
document.getElementById("preview-correo").textContent = document.getElementById("correo").value || "[correo@ejemplo.com](mailto:correo@ejemplo.com)";
document.getElementById("preview-telefono").textContent = document.getElementById("telefono").value || "+34 600 000 000";
document.getElementById("preview-direccion").textContent = document.getElementById("direccion").value || "Dirección";


// Sobre mí
document.getElementById("preview-descripcion").textContent = document.getElementById("sobremi").value || "Descripción personal...";

// Habilidades (simple input)
const skillsInput = document.getElementById("skills");
const skillsPreview = document.getElementById("preview-habilidades");
skillsPreview.innerHTML = "";
if (skillsInput && skillsInput.value.trim() !== "") {
    skillsInput.value.split(",").forEach(skill => {
        const li = document.createElement("li");
        li.textContent = skill.trim();
        skillsPreview.appendChild(li);
    });
}

// Experiencia
const experiencePreview = document.getElementById("preview-experiencia");
experiencePreview.innerHTML = "";

document.querySelectorAll("#experienceContainer .experience-entry").forEach(entry => {
    const puesto = entry.querySelector("input[name='position[]']").value;
    const empresa = entry.querySelector("input[name='company[]']").value;
    const inicio = entry.querySelector("input[name='startDate[]']").value;
    const fin = entry.querySelector("input[name='endDate[]']").value;
    const descripcion = entry.querySelector("textarea[name='description[]']").value;

    if (puesto || empresa || inicio || fin || descripcion) {
        const div = document.createElement("div");
        div.classList.add("exp");
        div.innerHTML = `
            <h4>${puesto} - ${empresa}</h4>
            <p>${inicio} - ${fin}</p>
            <p>${descripcion}</p>
        `;
        experiencePreview.appendChild(div);
    }
});

// Educación
const eduPreview = document.getElementById("preview-formacion");
eduPreview.innerHTML = "";

document.querySelectorAll("#educationContainer .education-entry").forEach(entry => {
    const titulo = entry.querySelector("input[name='degree[]']").value;
    const institucion = entry.querySelector("input[name='institution[]']").value;
    const fecha = entry.querySelector("input[name='graduationDate[]']").value;

    if (titulo || institucion || fecha) {
        const div = document.createElement("div");
        div.classList.add("edu");
        div.innerHTML = `
            <h4>${titulo} - ${institucion}</h4>
            <p>${fecha}</p>
        `;
        eduPreview.appendChild(div);
    }
});


// Idiomas
const idiomasPreview = document.querySelector(".languages");
if (idiomasPreview) {
    idiomasPreview.querySelectorAll(".language-item.dynamic").forEach(el => el.remove());

    document.querySelectorAll("#languagesContainer .language-entry").forEach(entry => {
        const idioma = entry.querySelector("input[name='language[]']").value;
        const dominio = entry.querySelector("input[name='proficiency[]']").value;

        if (idioma && dominio) {
            const div = document.createElement("div");
            div.classList.add("language-item", "dynamic");
            div.innerHTML = `
                <span>${idioma}</span>
                <div class="progress-bar">
                    <div class="progress" style="width: ${dominio}%"></div>
                </div>
            `;
            idiomasPreview.appendChild(div);
        }
    });
}


}

// Actualizar vista previa al escribir en cualquier campo
document.addEventListener("input", function () {
updatePreview();
});

// Evitar envío del formulario con Enter
document.getElementById('cvForm').addEventListener('keydown', function (e) {
if (e.key === 'Enter' && e.target.nodeName !== 'TEXTAREA') {
e.preventDefault();
}
});

