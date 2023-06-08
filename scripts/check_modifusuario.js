document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.register form');
    const nombreField = document.getElementById('nombre');
    const apellidosField = document.getElementById('apellidos');
    const fechaNacimientoField = document.getElementById('fecha_nacimiento');
    const generoField = document.getElementById('genero');
    const passwordActualField = document.getElementById('password_actual');
    const passwordNuevaField = document.getElementById('password_nueva');
    const confirmarPasswordField = document.getElementById('confirmar_password');
    const errorContainer = document.getElementById('validationErrors');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Detiene el envío del formulario

        const errors = [];

        const nombreValue = nombreField.value.trim();
        if (nombreValue.length > 50) {
            errors.push('⚠ El campo Nombre no puede tener más de 50 caracteres.');
        } else if (nombreValue.includes('.')) {
            errors.push('⚠ El campo Nombre no puede contener puntos (".").');
        }

        const apellidoValue = apellidoField.value.trim();
        if (apellidoValue.length > 100) {
            errors.push('⚠ El campo Apellido no puede tener más de 100 caracteres.');
        } else if (apellidoValue.includes('.')) {
            errors.push('⚠ El campo Apellido no puede contener puntos (".").');
        }

        // Validación de la contraseña actual
        const passwordActualValue = passwordActualField.value;
        if (passwordActualValue === '') {
            errors.push('⚠ El campo Contraseña actual es obligatorio');
        }

        // Validación de la contraseña nueva
        const passwordNuevaValue = passwordNuevaField.value;
        if (passwordNuevaValue !== '') {
            const confirmarPasswordValue = confirmarPasswordField.value;
            if (passwordNuevaValue !== confirmarPasswordValue) {
                errors.push('⚠ La contraseña nueva y la confirmación de contraseña no coinciden.');
            }
        }

        // Mostrar los mensajes de error en el formulario
        errorContainer.innerHTML = ''; // Limpiar mensajes de error anteriores

        if (errors.length > 0) {
            errors.forEach(function(error) {
                const message = document.createElement('p');
                message.textContent = error;
                errorContainer.appendChild(message);
            });
        } else {
            form.submit(); // Enviar el formulario si no hay errores
        }
    });
});
