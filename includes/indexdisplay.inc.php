<section class="fullDisplay">
	<section class="moviesDisplay">
		<h5 id="estsemana">ESTRENOS DE LA SEMANA</h5>

		<?php

            require_once 'database.php';
            // Crear una instancia de la clase Database
            $db = new Database();

            // Conectar a la base de datos
            $db->connect();

            $movies = $db->getMoviesdisplay(1,3);

            if (!empty($movies)) {
                    foreach ($movies as $movie) {
                        $id = $movie['id'];
                        $nombre = $movie['nombre'];

                        $imageUrl = "imagenes/cartelera-" . $id . ".jpg";
                        $movieUrl = "peli.php?id=" . $id;

                        echo '<article>';
                        echo '<a href="' . $movieUrl . '"><img class="moviesDisplay" src="' . $imageUrl . '" alt="ERROR" onerror="this.onerror=null; this.src=\'imagenes/error.jpg\'" width="265" height="377"></a>';
                        echo '<p><i class="material-icons">info</i>' . $nombre . '</p>';
                        echo '</article>';
                    }
                }
        		?>
		<br>
		<a href="display.php?displaymode=estrenos" class="vertodo">VER TODO</a>
	</section>

	<section class="moviesDisplay">
		<h5 id="cartelera">CARTELERA</h5>
		<?php
            require_once 'database.php';
            $db = new Database();

            // Conectar a la base de datos
            $db->connect();

            $movies = $db->getMoviesdisplay(0,3);

            if (!empty($movies)) {
                    foreach ($movies as $movie) {
                        $id = $movie['id'];
                        $nombre = $movie['nombre'];

                        $imageUrl = "imagenes/cartelera-" . $id . ".jpg";
                        $movieUrl = "peli.php?id=" . $id;

                        echo '<article>';
                        echo '<a href="' . $movieUrl . '"><img class="moviesDisplay" src="' . $imageUrl . '" alt="ERROR" onerror="this.onerror=null; this.src=\'imagenes/error.jpg\'" width="265" height="377"></a>';
                        echo '<p><i class="material-icons">info</i>' . $nombre . '</p>';
                        echo '</article>';
                    }
                }
        ?>
		
		<br>
		<a href="display.php?displaymode=cartelera" class="vertodo">VER TODO</a>
	</section>
</section>