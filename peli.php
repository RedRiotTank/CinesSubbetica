<!doctype html>

<html lang="es">
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/header-footer.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/aside.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/peliaside.css">
		<link rel="stylesheet" type="text/css" href="css/pelicss.css">
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
            </section>
		</main>


	    <footer id="pie">
    		<?php include('includes/footer.inc.php'); ?>
	    </footer>

	</body>
</html>