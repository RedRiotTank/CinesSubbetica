document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registration-form');
    const nombreField = document.getElementById('nombre');
    const apellidoField = document.getElementById('apellido');
    const fechaNacimientoField = document.getElementById('fecha_nacimiento');
    const emailField = document.getElementById('email');
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirm_password');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Detiene el envío del formulario

        const errors = [];

        // Validación del campo Nombre
        const nombreValue = nombreField.value.trim();
        if (nombreValue === '') {
            errors.push('⚠ El campo Nombre está vacío.');
        } else if (nombreValue.length > 50) {
            errors.push('⚠ El campo Nombre no puede tener más de 50 caracteres.');
        } else if (nombreValue.includes('.')) {
            errors.push('⚠ El campo Nombre no puede contener puntos (".").');
        }

        // Validación del campo Apellido
        const apellidoValue = apellidoField.value.trim();
        if (apellidoValue === '') {
            errors.push('⚠ El campo Apellido está vacío.');
        } else if (apellidoValue.length > 100) {
            errors.push('⚠ El campo Apellido no puede tener más de 100 caracteres.');
        } else if (apellidoValue.includes('.')) {
            errors.push('⚠ El campo Apellido no puede contener puntos (".").');
        }

        // Validación de la fecha de nacimiento
        const fechaNacimientoValue = fechaNacimientoField.value;
        const fechaNacimiento = new Date(fechaNacimientoValue);
        const minDate = new Date('1920-01-01');
        const maxDate = new Date('2024-01-01');
        if (fechaNacimiento < minDate || fechaNacimiento >= maxDate) {
            errors.push('⚠ La fecha de nacimiento debe estar entre el 1 de enero de 1920 y el 1 de enero de 2024.');
        }

        // Validación del correo electrónico
        const emailValue = emailField.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailValue)) {
            errors.push('⚠ El correo electrónico no tiene un formato válido.');
        }

        // Validación de la contraseña
        const passwordValue = passwordField.value;
        const confirmPasswordValue = confirmPasswordField.value;
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{1,}$/;
        if (passwordValue === '') {
            errors.push('⚠ El campo Contraseña está vacío.');
        } else if (passwordValue.length > 100) {
            errors.push('⚠ El campo Contraseña no puede tener más de 100 caracteres.');
        } else if (!passwordRegex.test(passwordValue)) {
            errors.push('⚠ La contraseña no es suficientemente segura. Debe contener al menos una mayúscula y un número.');
        } else if (passwordValue !== confirmPasswordValue) {
            errors.push('⚠ La contraseña y la confirmación de contraseña no coinciden.');
        }

        // Mostrar los mensajes de error en el formulario
        const errorContainer = document.getElementById('error-container');
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
