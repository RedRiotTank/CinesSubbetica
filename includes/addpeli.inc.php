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
    <form id="peliculaForm" method="post" action="./form_executions/movie_save.php">
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

        <div id="validationErrors"></div>
    </form>

</section>


