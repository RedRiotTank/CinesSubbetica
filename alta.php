<!doctype html> 

<html lang="es">
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/header-footer.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/aside.css">
		<link rel="stylesheet" type="text/css" href="css/asidescss/altaaside.css">
		<link rel="stylesheet" type="text/css" href="css/altacss.css">

		<title> Cines Subbética </title>
	</head>

	<body>
		<header>
			<?php include('includes/header.inc.php'); ?>
		</header>
		
		<main>
			
			<?php
			include('includes/aside.inc.php');

			require_once 'database.php';
            // Recoger los datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $genero = $_POST['genero'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];

            $generosSeleccionados = '';

            if (isset($_POST['generos']) && is_array($_POST['generos'])) {
                $generosSeleccionados = implode(', ', $_POST['generos']);
            }

            $correo_electronico = $_POST['email'];
            $contrasena = $_POST['password'];

            // Crear una instancia de la clase Database
            $db = new Database();

            // Conectar a la base de datos
            $db->connect();

            // Insertar los datos del formulario en la base de datos
            if ($db->insertUserData($nombre, $apellido, $genero, $fecha_nacimiento, $generosSeleccionados, $correo_electronico, $contrasena)) {
                include('includes/alta.inc.php');
            } else {
                echo "Error al insertar datos.";
            }
			?>




		</main>

		
	    <footer id="pie">
			<?php include('includes/footer.inc.php'); ?>  
	    </footer>
      

	</body>	
</html>