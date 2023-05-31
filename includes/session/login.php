<?php


    require_once '../../database.php';

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
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $email;
            header("Location: ../../index.php");
        } else {
            header("Location: ../../index.php?error_session=true");
        }

    }

?>