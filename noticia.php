<!doctype html>

<html lang="es">
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/header-footer.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/aside.css">
        <link rel="stylesheet" type="text/css" href="css/noticiascss.css">



		<title> Cines Subbética </title>
	</head>

	<body>
		<header>
			<?php include('includes/header.inc.php'); ?>
		</header>

		<main>

			<?php
			include('includes/aside.inc.php');

            $n = isset($_GET['n']) ? $_GET['n'] : '1';
            if ($n === '1') {
                 include('includes/noticias/noticia1.inc.php');
            }
            if ($n === '2') {
                include('includes/noticias/noticia2.inc.php');
            }
            if ($n === '3') {
                include('includes/noticias/noticia3.inc.php');
            }
            if ($n === '4') {
                include('includes/noticias/noticia4.inc.php');
            }
            if ($n === '5') {
                include('includes/noticias/noticia5.inc.php');
            }
            if ($n === '5') {
                include('includes/noticias/noticia5.inc.php');
            }


			?>


		</main>


	    <footer id="pie">
			<?php include('includes/footer.inc.php'); ?>
	    </footer>


	</body>
</html>

