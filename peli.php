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

            include('includes/pelicontent.inc.php');
			?>

		</main>


	    <footer id="pie">
    		<?php include('includes/footer.inc.php'); ?>
	    </footer>

	</body>
</html>