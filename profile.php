<!doctype html>

<html lang="es">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/header-footer.css">
    <link rel="stylesheet" type="text/css" href="css/asidescss/aside.css">

    <link rel="stylesheet" type="text/css" href="css/informationcss.css">
    <link rel="stylesheet" type="text/css" href="css/formcss.css">
    <script type= "text/javascript" src="./scripts/check_modifusuario.js"></script>
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
    $db = new Database();


    // Conectar a la base de datos
    $db->connect();

    // comprobar datos

    $datos = $db->getuserInfo($_SESSION['username']);
    $mail = $datos[0]['correo'];
    $nombre = $datos[0]['nombre'];
    $apellidos = $datos[0]['apellidos'];
    $fecha = $datos[0]['fecha_nacimiento'];
    $genero = $datos[0]['genero'];

    $fav_genres = $datos[0]['fav_genres'];
    $pfp = $datos[0]['pfp'];
    $admin = $datos[0]['administrator'];

  


    ?>

    <section class="information">
        <h2><?php echo $mail;  ?> </h2>

        <h3>Nombre: <?php echo $nombre; ?></h3>
        <h3>Apellidos: <?php echo $apellidos; ?></h3>
        <h3>Género: <?php echo $genero; ?></h3>
        <h3>Fecha de nacimiento: <?php echo $fecha; ?></h3>
        <h3>Géneros favoritos: <?php echo $fav_genres; ?></h3>

        <?php
        if($admin == 1){
            echo '<h3>Tipo de usuario: Administrador</h3>';
        }
        else{
            echo '<h3>Tipo de usuario: Usuario</h3>';
        }
        ?>

        <h2> Modificación de información</h2>

        <p>En esta sección puede modificar su información, solo es necesario rellenar los campos con un *, el resto son todos opcionales,
        rellene simplemente los que quiera modificar.</p>

        <section class="register">
            <form action="form_executions/modifUserInfo.php" method="post" class="register">
                <input type="hidden" name="correo" value="<?php echo $mail; ?>">


                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">

                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos">

                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">

                <label for="genero">Género:</label>
                <select id="genero" name="genero" required>
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                    <option value="otro">Otro</option>
                </select>


                <label for="fotoperfil">Foto de perfil:</label>
                <div class="profile-images">
                    <?php
                    $numImages = 7;
                    for ($i = 1; $i <= $numImages; $i++) {
                        $imagePath = 'imagenes/fotoperfil' . $i . '.jpg';
                        $checked = ($pfp == $i) ? 'checked' : '';
                        echo '<label class="profile-image">';
                        echo '<input type="radio" id="fotoperfil' . $i . '" name="fotoperfil" value="' . $i . '" ' . $checked . '>';
                        echo '<img src="' . $imagePath . '" alt="Foto de perfil ' . $i . '" width="80" height="80">';
                        echo '</label>';
                    }
                    ?>
                </div>



                <label for="password_actual">*Contraseña actual:</label>
                <input type="password" id="password_actual" name="password_actual">

                <label for="password_nueva">Contraseña nueva:</label>
                <input type="password" id="password_nueva" name="password_nueva">

                <label for="confirmar_password">Confirmar contraseña:</label>
                <input type="password" id="confirmar_password" name="confirmar_password">

                <input type="submit" value="Guardar cambios">

                <div id="validationErrors"></div>
            </form>
        </section>









    </section>


</main>

<footer id="pie">
    <?php include('includes/footer.inc.php'); ?>
</footer>
</body>
</html>