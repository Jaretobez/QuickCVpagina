document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    // Validación del formulario de inicio de sesión
    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            const email = loginForm.email.value.trim();
            const password = loginForm.password.value.trim();

            if (!validateEmail(email)) {
                e.preventDefault();
                alert("Por favor, ingresa un correo electrónico válido.");
                return;
            }

            if (password.length < 6) {
                e.preventDefault();
                alert("La contraseña debe tener al menos 6 caracteres.");
                return;
            }
        });
    }

    // Validación del formulario de registro
    if (registerForm) {
        registerForm.addEventListener('submit', (e) => {
            const name = registerForm.name.value.trim();
            const email = registerForm.email.value.trim();
            const password = registerForm.password.value.trim();

            if (!name) {
                e.preventDefault();
                alert("El nombre es obligatorio.");
                return;
            }

            if (!validateEmail(email)) {
                e.preventDefault();
                alert("Por favor, ingresa un correo electrónico válido.");
                return;
            }

            if (password.length < 6) {
                e.preventDefault();
                alert("La contraseña debe tener al menos 6 caracteres.");
                return;
            }
        });
    }

    // Función para validar correos electrónicos
    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // Intercambio de cajas login/registro
    document.getElementById('showRegister')?.addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById('loginBox').classList.add('hidden');
        document.getElementById('registerBox').classList.remove('hidden');
    });

    document.getElementById('showLogin')?.addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById('registerBox').classList.add('hidden');
        document.getElementById('loginBox').classList.remove('hidden');
    });
});
