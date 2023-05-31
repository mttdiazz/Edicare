<?php
  //separo header de lo que contenga el medio de la pantalla
  require "header.php";
?>
    <main>
      <title> ~EDICARE~ </title>
      <div class="contenedor-main">
        <section class="section-default">
          <?php
          if (!isset($_SESSION['id'])) {
            if(isset($_GET["error"])){
              if($_GET["error"]=="wrongpwd"){
                echo '<p class="login-error">Error! Contraseña incorrecta</p>';
              }
              else if($_GET["error"]=="emptyfields="){
                echo '<p class="login-error">Error! Debes llenar los campos!</p>';
              }
              else if($_GET["error"]=="wrongdnipwd"){
                echo '<p class="login-error">Error! Mail o DNI no registrado o erroneo!</p>';
              }
          }
          else{
            echo '<p class="login-titulo">Bienvenido a Edicare!</p><p class="login-subtitulo">Administracion Online</p>
                </section>
                <a href ="../loginSuperAdmin" class="linkBoton">
                  <button type="button" class="botonSuperAdmin">Iniciar Sesion como Super Admin</button>';
          }
        }
        else if (isset($_SESSION['id'])) {
          echo '<p class="login-status">Sesion iniciada con exito!</p>';
        }
        ?>
        </section>
        </a>
      </div>
    </main>