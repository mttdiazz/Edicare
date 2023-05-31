<?php
// chequea si enetro de la manera correcta
if (isset($_POST['login-submit'])) {
  require 'dbh.inc.php';
  $maildni = $_POST['maildni'];
  $password = $_POST['pwd'];

  if (empty($maildni) || empty($password)) {
    header("Location: ../index.php?error=emptyfields=".$maildni);
    exit();
  }
  else {
    $sql = "SELECT * FROM usuarios WHERE dniUsuario=? OR emailUsuario=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ss", $maildni, $maildni);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        // booleano si matchea con la contraesna de la base de datos
        $pwdCheck = password_verify($password, $row['pwdUsuario']);
        // error si no coincide
        if ($pwdCheck == false) {
          // lo devuelve a la signup page
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {

        //creamos la sesion aca para almacenar en variables de sesion
          session_start();
          //creamos las variables de sesion
          $_SESSION['id'] = $row['idUsuario'];
          $_SESSION['dni'] = $row['dniUsuario'];
          $_SESSION['email'] = $row['emailUsuario'];
          // Now the user is registered as logged in and we can now take them back to the front page! :)
          header("Location: ../index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../index.php?error=wrongdnipwd");
        exit();
      }
    }
  }
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../signup.php");
  exit();
}
