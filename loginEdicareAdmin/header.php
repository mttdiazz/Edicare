<?php
  session_start();
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
        <?php
        if (!isset($_SESSION['id'])) {
          // en este caso es para logearse adentro
          echo '<nav class="nav-header-main">
            <a class="header-logo" href="index.php">
            <img src="img/logo.png" alt="logo Edicare">
             </a>
             <ul class = "menu">
            <li><a href="../loginEdicare/index.php">Volver a la pagina principal</a></li>
            </ul>
            </nav>
            <div class="header-login"><form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<div class="header-login"> <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="img/logo.png" alt="mmtuts logo">
        </a>
        <ul>
          <li><a href="../../loginEdicareAdmin/index.php">Inicio</a></li>
          <li><a href="../../loginEdicareAdmin/edificiosAdmin.php"> Edificios</a> </li>
          <li><a href="../../loginEdicareAdmin/accountSettings.php"> Mi Cuenta</a> </li>
          </ul>
      </nav>
          <form action="../../loginEdicareAdmin/includes/logout.inc.php" class="header-salir" method="post">
            <button type="submit" name="login-submit">Cerrar Sesion</button>
          </form>
          </div>';
        }
        ?>
      </div>
    </header>