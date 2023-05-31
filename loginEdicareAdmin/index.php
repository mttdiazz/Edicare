<?php
//INDEX DE ADMIN
//separo header de lo que contenga el medio de la pantalla
require "header.php";
?>
    <main>
      <title> ~EDICARE~ </title>
      <div class="contenedor-main">
        <section class="section-default">
          <?php
if (!isset($_SESSION['id'])) {
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "wrongpwd") {
			echo '<p class="login-error">Error! Contraseña incorrecta</p>';
		} else if ($_GET["error"] == "emptyfields=") {
			echo '<p class="login-error">Error! Debes llenar los campos!</p>';
		} else if ($_GET["error"] == "wrongdnipwd") {
			echo '<p class="login-error">Error! Mail o DNI no registrado o erroneo!</p>';
		}
	} else {
		echo '<p class="login-titulo">Bienvenido a la seccion para Administradores de Edicare!</p>';
	}
} else if (isset($_SESSION['id'])) {
	echo '<p class="login-status">Sesion iniciada con exito!</p>';
	echo '</table></center>';
}
?>
        </section>
      </div>
    </main>