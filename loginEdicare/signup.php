<?php
  require "header.php";
?>

    <main>
      <div class="wrapper-main">
        <section class="section-registro">
          <h1>Registro</h1>
          <?php
          // errores a nivel php
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
              echo '<p class="signuperror">Complete todos los campos!</p>';
            }
            else if ($_GET["error"] == "invaliddnimail") {
              echo '<p class="signuperror">Mail y DNI invalidos!</p>';
            }
            else if ($_GET["error"] == "invaliddni") {
              echo '<p class="signuperror">DNI invalido!</p>';
            }
            else if ($_GET["error"] == "invalidmail") {
              echo '<p class="signuperror">E-mail invalido!</p>';
            }
            else if ($_GET["error"] == "passwordcheck") {
              echo '<p class="signuperror">Las contraseñas no coinciden!</p>';
            }
            else if ($_GET["error"] == "usertaken") {
              echo '<p class="signuperror"> DNI ya registrado!</p>';
            }
            else if ($_GET["error"] == "emailtaken") {
              echo '<p class="signuperror"> Mail ya registrado!</p>';
            }
          }
          // mensaje de exito 
          else if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
              echo '<p class="signupsuccess">Registrado correctamente! Ya puede iniciar sesion</p>';
            }
          }
          ?>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
            <?php
            // probamos si el usuario ya quiso poner data

            // chequeo DNI.
            if (!empty($_GET["dni"])) {
              echo '<input type="text" name="dni" placeholder="DNI" value="'.$_GET["dni"].'">';
            }
            else {
              echo '<input type="text" name="dni" placeholder="DNI">';
            }

            // chequeamos email
            if (!empty($_GET["mail"])) {
              echo '<input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'">';
            }
            else {
              echo '<input type="text" name="mail" placeholder="E-mail">';
            }
            ?>
            <input type="text" name="name" placeholder="Nombre y Apellido">
            <input type="password" name="pwd" placeholder="Contraseña">
            <input type="password" name="pwd-repeat" placeholder="Repita contraseña">
            <button type="submit" name="signup-submit">Registrarse</button>
          </form>
        </section>
      </div>
    </main>
