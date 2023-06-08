<?php

    require_once '../database.php';

    session_start();

    // Recoger los datos del formulario
    $stars = $_POST['stars'];
    $comment = $_POST['comment'];
    $id = $_POST['id'];



     $db = new Database();

    // Conectar a la base de datos
    $db->connect();

    // Insertar los datos del formulario en la base de datos

    if ($db->insertComment($_SESSION['username'], $id, $comment, $stars)) {

        header("Location: ../peli.php?id=$id");
        exit();
    } else {
        echo "Error al insertar datos. Póngase en contacto con el administrador por favor.";
    }
 ?>