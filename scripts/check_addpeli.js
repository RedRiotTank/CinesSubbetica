document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('peliculaForm');
    const validationErrorsContainer = document.getElementById('validationErrors');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        validationErrorsContainer.innerHTML = '';

        const nombreField = document.getElementById('nombre');
        const anioField = document.getElementById('anio');
        const directorField = document.getElementById('director');
        const interpretesField = document.getElementById('interpretes');
        const tematicasField = document.getElementById('tematicas');
        const valoracionField = document.getElementById('valoracion');
        const sinopsisField = document.getElementById('sinopsis');
        const trailerField = document.getElementById('trailer');

        const errors = [];

        // Validación del campo Nombre
        const nombreValue = nombreField.value.trim();
        if (nombreValue === '') {
            errors.push('⚠ El campo Nombre es obligatorio.');
        } else if (nombreValue.length > 255) {
            errors.push('⚠ El campo Nombre no puede tener más de 255 caracteres.');
        } else if (nombreValue.endsWith('.')) {
            errors.push('⚠ El campo Nombre no puede terminar con un punto.');
        }

        // Validación del campo Año
        const anioValue = anioField.value.trim();
        if (/^\d{1,4}$/.test(anioValue) === false) {
            errors.push('⚠ El campo Año debe ser un número de hasta 4 dígitos.');
        } else {
            const currentYear = new Date().getFullYear();
            if (anioValue < 1895 || anioValue > currentYear) {
                errors.push(
                    `⚠ El campo Año debe ser un número entre 1895 y ${currentYear}.`
                );
            }
        }

        // Validación del campo Director
        const directorValue = directorField.value.trim();
        if (directorValue.length > 255) {
            errors.push('⚠ El campo Director no puede tener más de 255 caracteres.');
        } else if (directorValue.endsWith('.')) {
            errors.push('⚠ El campo Director no puede terminar con un punto.');
        }

        // Validación del campo Intérpretes
        const interpretesValue = interpretesField.value.trim();
        if (interpretesValue.length > 255) {
            errors.push(
                '⚠ El campo Intérpretes no puede tener más de 255 caracteres.'
            );
        } else if (interpretesValue.endsWith('.')) {
            errors.push('⚠ El campo Intérpretes no puede terminar con un punto.');
        }

        // Validación del campo Temáticas
        const tematicasValue = tematicasField.value.trim();
        if (tematicasValue.length > 255) {
            errors.push(
                '⚠ El campo Temáticas no puede tener más de 255 caracteres.'
            );
        } else if (tematicasValue.endsWith('.')) {
            errors.push('⚠ El campo Temáticas no puede terminar con un punto.');
        }

        // Validación del campo Valoración
        const valoracionValue = valoracionField.value;
        if (valoracionValue < 1 || valoracionValue > 5) {
            errors.push('⚠ El campo Valoración debe ser un número entre 1 y 5.');
        }

        // Validación del campo Sinopsis
        const sinopsisValue = sinopsisField.value.trim();
        if (sinopsisValue.endsWith('.')) {
            errors.push('⚠ El campo Sinopsis no puede terminar con un punto.');
        } else if (sinopsisValue.length > 1000) {
            errors.push('⚠ El campo Sinopsis no puede tener más de 1000 caracteres.');
        }

        // Validación del campo Trailer
        const trailerValue = trailerField.value.trim();
        if (trailerValue.endsWith('.')) {
            errors.push('⚠ El campo Trailer no puede terminar con un punto.');
        } else if (trailerValue.length > 255) {
            errors.push('⚠ El campo Trailer no puede tener más de 255 caracteres.');
        }

        if (!trailerValue.includes('youtube.com')) {
            errors.push('⚠ El campo Trailer debe ser un enlace de Youtube.');
        }

        if (trailerValue.includes(' ')) {
            errors.push('⚠ El campo Trailer no puede tener espacios.');
        }

        // Mostrar los mensajes de error en el formulario
        if (errors.length > 0) {
            errors.forEach(function(error) {
                const errorElement = document.createElement('p');
                errorElement.textContent = error;
                errorElement.style.color = 'red';
                validationErrorsContainer.appendChild(errorElement);
            });
        } else {
            form.submit();
        }
    });
});
