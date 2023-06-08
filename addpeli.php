<!doctype html>

<html lang="es">
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/header-footer.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/aside.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/altausuarioaside.css">
		<link rel="stylesheet" type="text/css" href="css/formcss.css">
        <script type= "text/javascript" src="./scripts/check_addpeli.js"></script>
		<title> Cinessss Subbética </title>
	</head>

	<body>
		<header>
			<?php include('includes/header.inc.php');?>

		</header>

		<main>
			<?php
                include('includes/aside.inc.php');

                require_once 'database.php';
                $db = new Database();

                // Conectar a la base de datos
                $db->connect();

                // comprobar datos
                if(isset($_SESSION['username'])){
                    $isadmin = $db->getAdmin($_SESSION['username']);
                }else{
                    $isadmin = false;
                }

                if($isadmin){
                    include('includes/addpeli.inc.php');
                } else {
                    echo 'Usted no es administrador y no tiene acceso a esta página, si piensa que es un error, contacte con el administrador';
                }

			?>

		</main>


	    <footer id="pie">
    		<?php include('includes/footer.inc.php'); ?>
	    </footer>

	</body>
</html>