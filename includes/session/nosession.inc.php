<form method="post" action="includes/session/login.php">
    <label for="usuario">Correo:</label>
    <input type="text" id="usuario" name="usuario" required>

    <br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required>

    <br>

    <div class="form-group">
        <div class="button-container">
            <button type="submit">Iniciar sesión</button>
        </div>
        <?php
        $error_session = isset($_GET['error_session']) && $_GET['error_session'] === 'true';

        if ($error_session) {
            echo "<p class='error-message' title='Error al iniciar sesión'>⚠</p>";
        }
        ?>
    </div>

    <a href="altausuarios.php">Alta de usuario</a>
</form>
