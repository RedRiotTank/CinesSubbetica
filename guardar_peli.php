<?php

    require_once 'database.php';

    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $anio = $_POST['anio'];
    $director = $_POST['director'];
    $interpretes = $_POST['interpretes'];
    $tematicas = $_POST['tematicas'];
    $valoracion = $_POST['valoracion'];
    $sinopsis = $_POST['sinopsis'];
    $trailer = $_POST['trailer'];
    if(isset($_POST["estreno"]))
        $estreno = 1;
     else
        $estreno = 0;

    // Crear una instancia de la clase Database
    $db = new Database();

    // Conectar a la base de datos
    $db->connect();

    // Insertar los datos del formulario en la base de datos
    if ($db->insertMovieData($nombre, $anio, $director, $interpretes, $tematicas, $valoracion, $sinopsis, $estreno, $trailer)) {
        header("Location: display.php?displaymode=cartelera");
        exit();
    } else {
        echo "Error al insertar datos. Póngase en contacto con el administrador por favor.";
    }


?>