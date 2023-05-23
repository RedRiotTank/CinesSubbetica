<section id="encabezado">
	<a href="index.php"><img src = "imagenes/logo.png" alt = "ERROR"></a>

	<h1>CINES<br>SUBBÉTICA</h1>

    <?php
            $vidaUtil = 7 * 24 * 60 * 60; // 7 días en segundos
          session_set_cookie_params($vidaUtil);
          session_start();

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        include('includes/session/yessession.inc.php');

    } else {
        include('includes/session/nosession.inc.php');

    }
    ?>

	</section>

	<nav id="menu">
	<ul>
		<li><a href=index.php>Inicio</a></li>

		<li><a href="display.php?displaymode=estrenos">Estrenos</a></li>
		<li><a href="display.php?displaymode=cartelera">Cartelera</a></li>
		<li><a href="tables.php?tablemode=horarios">Horarios</a></li>
		<li><a href="tables.php?tablemode=tarifas">Tarifas</a></li>
		<li><a href=informacion.php>Información</a></li>
	</ul>
</nav>
