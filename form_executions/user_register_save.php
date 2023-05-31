<?php
    require_once '../database.php';
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
        header("Location: ../alta.php");
        exit();
    } else {
        echo "Error al insertar datos. Póngase en contacto con el administrador por favor.";
    }
?>