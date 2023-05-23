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
    <img src="imagenes/fotoperfil<?php echo $pfpnumber; ?>.jpg" alt="ERROR" width="80" height="80">
    <article>
      <?php echo "<h3> " . $_SESSION['username'] . "</h3>";
       if($admin){
        echo "<h4>Administrador</h4>";
       } else{
        echo "<h4>Usuario</h4>";
       }?>

      <a href="index.php?logout=true">Cerrar sesión</a>
    </article>
</section>
