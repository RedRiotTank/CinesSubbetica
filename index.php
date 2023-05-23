<!doctype html> 

<html lang="es">
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/header-footer.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/aside.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/indexaside.css">
		<link rel="stylesheet" type="text/css" href="css/moviedisplaycss.css">
		<title> Cinessss Subbética </title>
	</head>
		

	<body>
		<header>
			<?php include('includes/header.inc.php');?>
            <?php
            $logout = isset($_GET['logout']) ? $_GET['logout'] : 'false';
            if ($logout === 'true') {
                echo 'Hola';
                session_destroy();
                header("Location: index.php");
                exit();
            }
            ?>

			<?php
                require_once 'database.php';

                if (!empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
                    // Obtener los datos del formulario
                   $email = $_POST['usuario'];
                   $password = $_POST['contrasena'];

                    // Crear una instancia de la clase Database
                   $db = new Database();

                   // Conectar a la base de datos
                   $db->connect();

                  // comprobar datos
                   if ($db->checklogin($email, $password)) {

                      header("Location: index.php");
                       echo 'sesion iniciado';
                   } else {
                       echo ' error inicio de sesion';
                   }

                } else {
                    // Los datos esperados no están presentes en $_POST

                }

            ?>
		</header>
		
		<main>
			<?php
			include('includes/aside.inc.php');
			include('includes/indexdisplay.inc.php');
			?>
			
		</main>

		
	    <footer id="pie">
    		<?php include('includes/footer.inc.php'); ?>
	    </footer>

	</body>	
</html>