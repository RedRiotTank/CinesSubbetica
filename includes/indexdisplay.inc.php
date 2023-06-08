<?php
require_once 'database.php';
$db = new Database();
$db->connect();
$estrenos = $db->getMoviesdisplay(1, 3);
$cartelera = $db->getMoviesdisplay(0, 3);
?>

<section class="fullDisplay">
    <section class="moviesDisplay">
        <h5 id="estsemana">ESTRENOS DE LA SEMANA</h5>
        <?php
        if (!empty($estrenos)) {
            foreach ($estrenos as $estreno) {
                $id = $estreno['id'];
                $nombre = $estreno['nombre'];

                $imageUrl = "imagenes/cartelera-" . $id . ".jpg";
                $movieUrl = "peli.php?id=" . $id;

                echo '<article>';
                echo '<a href="' . $movieUrl . '"><div class="image-container">';
                echo '<img class="moviesDisplay" src="' . $imageUrl . '" alt="ERROR" onerror="this.onerror=null; this.src=\'imagenes/error.jpg\'" width="265" height="377">';
                echo '<span class="overlay-text">' . $nombre . '<br>' . $estreno['anio'] . '<br>' . 'Estreno' . '</span>';
                echo '</div></a>';

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
        if (!empty($cartelera)) {
            foreach ($cartelera as $pelicula) {
                $id = $pelicula['id'];
                $nombre = $pelicula['nombre'];

                $imageUrl = "imagenes/cartelera-" . $id . ".jpg";
                $movieUrl = "peli.php?id=" . $id;

                echo '<article>';
                echo '<a href="' . $movieUrl . '"><div class="image-container">';
                echo '<img class="moviesDisplay" src="' . $imageUrl . '" alt="ERROR" onerror="this.onerror=null; this.src=\'imagenes/error.jpg\'" width="265" height="377">';
                echo '<span class="overlay-text">' . $nombre . '<br>' . $estreno['anio'] . '<br>' . 'Cartelera' . '</span>';
                echo '</div></a>';

                echo '<p><i class="material-icons">info</i>' . $nombre . '</p>';
                echo '</article>';
            }
        }
        ?>
        <br>
        <a href="display.php?displaymode=cartelera" class="vertodo">VER TODO</a>
    </section>
</section>

<script type= "text/javascript" src="./scripts/overmovie.js"></script>

