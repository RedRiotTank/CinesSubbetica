<?php

    require_once '../database.php';

    session_start();

    // Recoger los datos del formulario
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];
    $fotoperfil = $_POST['fotoperfil'];
    $password_actual = $_POST['password_actual'];
    $password_nueva = $_POST['password_nueva'];






    // Comprobar que la contraseña actual es correcta
    $db = new Database();
    $db->connect();

    $correct_password = $db->checklogin($_SESSION['username'], $password_actual);

    if($correct_password){
        echo "CORRECTO";

        if($nombre != "")
            $db->updateName($correo, $nombre);

        if($apellidos != "")
            $db->updateSurname($correo, $apellidos);

        if($fecha_nacimiento != "")
            $db->updateBirthdate($correo, $fecha_nacimiento);

        if($genero != "")
            $db->updateGender($correo, $genero);

        if($fotoperfil != "")
            $db->updatePFP($correo, $fotoperfil);

        echo $password_nueva;
        if($password_nueva != "")
            $db->updatePassword($correo, $password_nueva);


        header("Location: ../profile.php");
    } else {
        echo "ERROR";
    }






?>