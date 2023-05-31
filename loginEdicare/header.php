<?php
//inicio sesion
  session_start();
  // abro el handler de la base de datoss
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Edicare">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
        <!--
        no pedimos nombre de usuario sino DNI, el usuario podra logearse con dni
        o con el mail, como prefiera
        -->
        <?php
        if (!isset($_SESSION['id'])) {
          // en este caso es para logearse
          echo '<div class="header-login">
          <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="img/logo.png" alt="logoEdicare">
        </a>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="contacto.php">Contacto</a></li>
          <li><a href="aboutUs.php">Sobre Edicare</a></li>
          <li><a href="../loginEdicareAdmin/index.php">Iniciar sesion como administrador</a></li>
        </ul>
      </nav>
          <form action="includes/login.inc.php" method="post">
            <input type="text" name="maildni" placeholder="E-mail/DNI">
            <input type="password" name="pwd" placeholder="Contraseña">
            <button type="submit" name="login-submit">Iniciar sesion</button>
          </form>
          <a href="signup.php" class="header-signup">Registrarse</a>
          </div>';
        }
        // si ni esta logeado lo mandamos a la pagina de signup
        else if (isset($_SESSION['id'])) {
          echo '<div class="header-login"> <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="img/logo.png" alt="mmtuts logo">
        </a>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="userMainPage.php"> Propiedades</a> </li>
          <li><a href="accountSettings.php">Mi Cuenta</a></li>
          </ul>
      </nav>
          <form action="includes/logout.inc.php" class="header-salir" method="post">
            <button type="submit" name="login-submit">Cerrar Sesion</button>
          </form>
          </div>';
        }
        ?>
    </header>
