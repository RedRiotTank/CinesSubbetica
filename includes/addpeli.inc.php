<style>
    .error {
        color: red;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .error-symbol {
        margin-right: 5px;
    }
</style>

<section class="register">
    <h1>Añadir Película</h1>
    <form id="peliculaForm" method="post" action="guardar_peli.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="anio">Año:</label>
        <input type="text" id="anio" name="anio">

        <label for="director">Director:</label>
        <input type="text" id="director" name="director">

        <label for="interpretes">Intérpretes:</label>
        <textarea id="interpretes" name="interpretes"></textarea>

        <label for="tematicas">Temáticas:</label>
        <textarea id="tematicas" name="tematicas"></textarea>

        <label for="valoracion">Valoración media:</label>
        <input type="text" id="valoracion" name="valoracion">

        <label for="sinopsis">Sinopsis:</label>
        <textarea id="sinopsis" name="sinopsis"></textarea>

        <label for="trailer">Trailer:</label>
        <textarea id="trailer" name="trailer"></textarea>

        <label for="estreno">¿Es un estreno?</label>
        <input type="checkbox" id="estreno" name="estreno">

        <button type="submit">Añadir Película</button>
    </form>
    <div id="validationErrors"></div>
</section>

<script>
    const form = document.getElementById('peliculaForm');
    const validationErrorsContainer = document.getElementById('validationErrors');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        validationErrorsContainer.innerHTML = '';

        const nombre = document.getElementById('nombre').value;
        const anio = document.getElementById('anio').value;
        const director = document.getElementById('director').value;
        const interpretes = document.getElementById('interpretes').value;
        const tematicas = document.getElementById('tematicas').value;
        const valoracion = document.getElementById('valoracion').value;
        const sinopsis = document.getElementById('sinopsis').value;
        const trailer = document.getElementById('trailer').value;

        const errors = [];

        if (nombre.trim() === '') {
            errors.push('El campo Nombre es obligatorio.');
        } else {
            if (nombre.length > 255) {
                errors.push('El campo Nombre no puede tener más de 255 caracteres.');
            }
            if (nombre.endsWith('.')) {
                errors.push('El campo Nombre no puede terminar con un punto.');
            }
        }

        if(/^\d{1,4}$/.test(anio) === false) {
            errors.push('El campo Año debe ser un número de hasta 4 dígitos.');
        } else {
            if (anio < 1895 || anio > 2040) {
                errors.push('El campo Año debe ser un número entre 1895 y 2021.');
            }
        }


        if (director.length > 255) {
            errors.push('El campo Director no puede tener más de 255 caracteres.');
        }
        if (director.endsWith('.')) {
            errors.push('El campo Director no puede terminar con un punto.');
        }


        if (interpretes.length > 255) {
            errors.push('El campo Intérpretes no puede tener más de 255 caracteres.');
        }
        if (interpretes.endsWith('.')) {
            errors.push('El campo Intérpretes no puede terminar con un punto.');
        }

        if (tematicas.length > 255) {
            errors.push('El campo Temáticas no puede tener más de 255 caracteres.');
        }

        if(tematicas.endsWith('.')) {
            errors.push('El campo Temáticas no puede terminar con un punto.');
        }

        if(valoracion < 1 || valoracion > 5){
            errors.push('El campo Valoración debe ser un número entre 1 y 5.');
        }

        if (sinopsis.endsWith('.')) {
            errors.push('El campo Sinopsis no puede terminar con un punto.');
        }
        if (sinopsis.length > 1000) {
            errors.push('El campo Sinopsis no puede tener más de 1000 caracteres.');
        }

        if(trailer.endsWith('.')) {
            errors.push('El campo Trailer no puede terminar con un punto.');
        }

        if (trailer.length > 255) {
            errors.push('El campo Trailer no puede tener más de 255 caracteres.');
        }

        if (trailer.includes('youtube.com') === false) {
            errors.push('El campo Trailer debe ser un enlace de Youtube.');
        }

        if (trailer.includes(' ') === true) {
            errors.push('El campo Trailer no puede tener espacios.');
        }

    if (errors.length > 0) {
        errors.forEach(function(error) {
            const errorElement = document.createElement('p');
            errorElement.classList.add('error');

            const errorSymbol = document.createElement('span');
            errorSymbol.classList.add('error-symbol');
            errorSymbol.textContent = '⚠️'; // Símbolo de peligro Unicode

            errorElement.appendChild(errorSymbol);
            errorElement.textContent += error; // Agrega el texto de error

            validationErrorsContainer.appendChild(errorElement);
        });
    } else {
        form.submit();
    }
  });
</script>
