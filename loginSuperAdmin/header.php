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
    <link rel="stylesheet" href="./style.css">
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
	echo '<nav class="nav-header-main">
        <a class="header-logo" href="./index.php">
          <img src="./img/logo.png">
        </a>
        <ul class="menu">
          <li><a href="../loginEdicare/index.php">volver a la pagina principal</a></li>
        </ul>
      </nav>
          <div class="header-login"><form action="./includes/login.inc.php" method="post">
            <input type="text" name="mail" placeholder="E-mail" require>
            <input type="password" name="pwd" placeholder="Contraseña" require>
            <button type="submit" name="login-submit">Iniciar sesion</button>
          </form>
          </div>';
} else if (isset($_SESSION['id'])) {
	echo '<div class="header-login"> <nav class="nav-header-main">
        <a class="header-logo" href="./index.php">
          <img src="./img/logo.png" alt="mmtuts logo">
        </a>
        <ul>
          <li><a href="./index.php">Inicio</a></li>
          <li><a href="./nuevoEd.php">Añadir Edificio</a></li>
          <li><a href="./nuevoAdmin.php">Añadir Administrador</a></li>
          <li><a href="./eliminaAdmin.php">Eliminar Administrador</a></li>
          </ul>
      </nav>
          <form action="./includes/logout.inc.php" class="header-salir" method="post">
            <button type="submit" name="login-submit">Cerrar Sesion</button>
          </form>
          </div>';
}
?>
    </header>
