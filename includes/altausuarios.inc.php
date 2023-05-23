<section class="register">
				<h1>Registro de Usuario</h1>
				<form method="post" action="alta.php">
				    <label for="nombre">Nombre:</label>
				    <input type="text" id="nombre" name="nombre" required>

				    <label for="apellido">Apellido:</label>
				    <input type="text" id="apellido" name="apellido" required>

				    <label for="genero">Género:</label>
				    <select id="genero" name="genero" required>
				        <option value="hombre">Hombre</option>
				        <option value="mujer">Mujer</option>
				        <option value="otro">Otro</option>
				    </select>
				   <fieldset>
                       <legend>Fecha de nacimiento</legend>
                       <article>
                           <label for="fecha_nacimiento">Ingrese su fecha de nacimiento:</label>
                           <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                       </article>
                   </fieldset>


				    <fieldset>
				        <legend>Géneros de cine favoritos:</legend>
				        <article>
				            <input type="checkbox" id="accion" name="generos" value="accion">
				            <label for="accion">Acción</label>
				        </article>
				        <article>
				            <input type="checkbox" id="comedia" name="generos" value="comedia">
				            <label for="comedia">Comedia</label>
				        </article>
				        <article>
				            <input type="checkbox" id="drama" name="generos" value="drama">
				            <label for="drama">Drama</label>
				        </article>
				        <article>
				            <input type="checkbox" id="policías" name="generos" value="policías">
				            <label for="drama">Policías</label>
				        </article>
				    </fieldset>

				    <label for="email">Correo Electrónico:</label>
				    <input type="email" id="email" name="email" required>

				    <label for="password">Contraseña:</label>
				    <input type="password" id="password" name="password" required>

				    <label for="confirm_password">Confirmar Contraseña:</label>
				    <input type="password" id="confirm_password" name="confirm_password" required>

				    <button type="submit">Registrarse</button>
				</form>

			</section>