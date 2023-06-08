<?php
   require_once 'database.php';
   $db = new Database();

   // Conectar a la base de datos
   $db->connect();

  // comprobar datos
   $pfpnumber = $db->getPFPNumber($_SESSION['username']);
   $admin = $db->getAdmin($_SESSION['username']);
?>
<section>
    <a href="profile.php"> <img src="imagenes/fotoperfil<?php echo $pfpnumber; ?>.jpg" alt="ERROR" width="80" height="80"></a>
    <article>
      <?php echo "<h3> " . $_SESSION['username'] . "</h3>";
       if($admin){
        echo "<h4>Administrador</h4>";
       } else{
        echo "<h4>Usuario</h4>";
       }?>

      <a href="includes/session/logout.php">Cerrar sesión</a>
    </article>
</section>
