document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementsByClassName('ponercomentario')[0];
    const commentField = document.getElementById('comment');
    const errorContainer = document.querySelector('.error');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Detiene el envío del formulario

        const errors = [];

        // Validación del campo Comentario
        const commentValue = commentField.value.trim();
        if (commentValue.length > 150) {
            errors.push('⚠ El comentario no puede ser tan extenso.');
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
