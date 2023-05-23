<section class="fullDisplay">
	<section class="moviesDisplay">
		
		<?php
			$displaymode = isset($_GET['displaymode']) ? $_GET['displaymode'] : 'estrenos';
			if ($displaymode === 'estrenos') {
				echo '<h5 id="estsemana">ESTRENOS DE LA SEMANA</h5>';
			} else {
				echo '<h5 id="estsemana">CARTELERA</h5>';
			}

            require_once 'database.php';
			// Crear una instancia de la clase Database
            $db = new Database();

            // Conectar a la base de datos
            $db->connect();

            $movies = $db->getMoviesdisplay(1);

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





		<?php
			$displaymode = isset($_GET['displaymode']) ? $_GET['displaymode'] : 'estrenos';
					
			if ($displaymode === 'cartelera') {

                require_once 'database.php';
                $db = new Database();

                // Conectar a la base de datos
                $db->connect();

                $movies = $db->getMoviesdisplay(0);

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

                // comprobar datos
                if(isset($_SESSION['username'])){
                    $isadmin = $db->getAdmin($_SESSION['username']);
                }else{
                    $isadmin = false;
                }

                if($isadmin){
                    echo
                    '
                        <article>
                            <a href="addpeli.php"><img class="moviesDisplay" src = "imagenes/add_movie.jpg" alt = "ERROR"  width="265" height="377"> </a>
                            <p><i class="material-icons">info</i>Añadir película</p>
                        </article>
                    ';
                }

			} 
		?>

	</section>
</section>