<!doctype html>

<html lang="es">
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/header-footer.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/aside.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/peliaside.css">
		<link rel="stylesheet" type="text/css" href="css/pelicss.css">
        <script type= "text/javascript" src="./scripts/check_comment.js"></script>
		<title> Cinessss Subbética </title>
	</head>


	<body>
		<header>
			<?php include('includes/header.inc.php'); ?>
		</header>

		<main>
			<?php
                include('includes/aside.inc.php');
                 $id = isset($_GET['id']) ? $_GET['id'] : '1';

                require_once 'database.php';

                $db = new Database();

                // Conectar a la base de datos
                $db->connect();

                $info = $db->getMovieInfo($id);

                $nombre = $info[0]['nombre'];
                $anio = $info[0]['anio'];
                $director = $info[0]['director'];
                $interpretes = $info[0]['interpretes'];
                $tematicas = $info[0]['tematicas'];
                $valoracion = $info[0]['valoracion'];
                $sinopsis = $info[0]['sinopsis'];
                $enlace = $info[0]['enlaces'];
			?>

            <section class="pelidisplay">
                <a href="<?php echo $enlace; ?>">
                    <img class="cartelera" src="imagenes/cartelera-<?php echo $id; ?>.jpg" alt="ERROR" onerror="this.onerror=null; this.src='./imagenes/error.jpg'" width="265" height="377.5" />
                </a>

                <h1 class="titulo"><?php echo "$nombre"?></h1>

                <ul class="paragraph">
                    <li><strong>Año:</strong> <?php echo "$anio"?>.</li>
                    <li><strong>Director:</strong> <?php echo "$director"?>.</li>
                    <li><strong>Intérpretes:</strong> <?php echo "$interpretes"?>.</li>
                    <li><strong>Temáticas</strong> <?php echo "$tematicas"?>.</li>
                    <li><strong>Valoración media:</strong>
                        <?php
                        for($i=0; $i< $valoracion; $i++)
                            echo '<i class="material-icons">star</i>';
                        ?>
                    </li>

                </ul>

                <h2 class="sinopsis">SINOPSIS</h2>

                <p class="paragraph"> <?php echo "$sinopsis"?>.</p>

                <section id="imagenes">
                    <img src = "imagenes/1img-<?php echo $id; ?>.jpg" alt = "ERROR" onerror="this.onerror=null; this.src='./imagenes/errorimg.jpg'" width="350" height="250" />
                    <img src = "imagenes/2img-<?php echo $id; ?>.jpg" alt = "ERROR" onerror="this.onerror=null; this.src='./imagenes/errorimg.jpg'" width="350" height="250"/>
                    <img src = "imagenes/3img-<?php echo $id; ?>.jpg" alt = "ERROR" width="350" onerror="this.onerror=null; this.src='./imagenes/errorimg.jpg'"height="250"/>
                    <img src = "imagenes/4img-<?php echo $id; ?>.jpg" alt = "ERROR" onerror="this.onerror=null; this.src='./imagenes/errorimg.jpg'" width="350" height="250"/>
                </section>


                <h2 class="comentariostitulo">SECCIÓN DE COMENTARIOS</h2>

                <ul class="comentarios">
                    <?php
                    require_once 'database.php';
                    // Crear una instancia de la clase Database
                    $db = new Database();

                    // Conectar a la base de datos
                    $db->connect();

                    $comentarios = $db->getComments($id);

                    if (!empty($comentarios)){
                        foreach ($comentarios as $comentario) {
                            $correo = $comentario['correo'];
                            $pfp = $db->getPFPNumber($correo);
                            $valoracion = $comentario['valoracion'];
                            $maximo_estrellas = 5;
                            $comentario_texto = $comentario['comentario'];





                            echo '<li>';

                            echo '<img src="imagenes/fotoperfil' . $pfp . '.jpg" alt="Foto de perfil de Juan" width="80" height="80">';
                            echo '<article>';
                            echo '<h3>' . $correo . '</h3>';
                            echo '<p>';

                            for ($i = 1; $i <= $maximo_estrellas; $i++) {
                                if ($i <= $valoracion) {
                                    echo '<i class="material-icons">star</i>';
                                } else {
                                    echo '<i class="material-icons">star_border</i>';
                                }
                            }

                            echo '</p>';
                            echo '<p>' . $comentario_texto . '</p>';


                            echo '</article>';
                            echo '</li>';
                        }
                    }
                    ?>
                </ul>


                <?php
                    if(isset($_SESSION['loggedin'])){
                        ?>
                        <form class="ponercomentario" method="post" action="form_executions/movie_comment_save.php">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">

                            <label for="stars">¿Cuántas estrellas le das?</label>
                            <input type="range" id="stars" name="stars" min="1" max="5" step="1" class="input-field">
                            <div class="estrellas">
                                <span>1</span>
                                <span>2</span>
                                <span>3</span>
                                <span>4</span>
                                <span>5</span>
                            </div>

                            <label for="comment">Da tu opinión:</label>
                            <textarea id="comment" name="comment" rows="5" class="input-field"></textarea>

                            <input type="submit" value="Enviar" class="submit-button">
                            <div class="error"> </div>
                        </form>
                        <?php
                    }


                    else
                        echo '<h2 class="comentariostitulo">INICIA SESIÓN PARA DEJAR TU COMENTARIO</h2>';

                ?>




            </section>
		</main>


	    <footer id="pie">
    		<?php include('includes/footer.inc.php'); ?>
	    </footer>

	</body>
</html>