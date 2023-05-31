<?php
//separo header de lo que contenga el medio de la pantalla
require "./header.php";
?>
<link rel="stylesheet" href="style.css">
<main>
      <title> ~EDICARE~ </title>
      <div class="contenedor-main">
        <section class="section-default">
          <?php
if (!isset($_SESSION['id'])) {
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "wrongpwd") {
			echo '<p class="login-error">Error! Contraseña incorrecta</p>';
		} else if ($_GET["error"] == "wrongdnipwd") {
			echo '<p class="login-error">Error! Mail o DNI no registrado o erroneo!</p>';
		}
	} else {
		echo '<p class="login-titulo">Login para SuperAdministradores</p>';
	}
} else if (isset($_SESSION['id'])) {
	echo '<p class="login-status">Sesion iniciada con exito!</p>
  </section>
  </div>
  <div class="listaEdificios">
    <table class="datosUser">
      <tr>
        <th>Direccion del Edificio</th>
        <th>Ciudad</th>
        <th>E-mail del administrador</th>
        <th>Editar</th>
      </tr>';
	//Falta la parte de la tabla que muestra los datos que me esta fallando  cunaod lo arregle lo pongo
	$sql = ("SELECT idEdificio, Direccion, Ciudad, idAdmin FROM edificios");
	$result = mysqli_query($conn, $sql);

	while ($fila = mysqli_fetch_array($result)) {
		if ($fila[3] != NULL) {
			$sql = "SELECT emailAdmin FROM admin WHERE idAdmin='$fila[3]'";
			$consulta = mysqli_query($conn, $sql);
			while ($rows = mysqli_fetch_array($consulta)) {
				$email = $rows[0];
			}
		} else {
			$email = "";
		}
		echo '<tr><td>' . $fila[1] . '</td><td>' . $fila[2] . '</td><td>' . $email . '</td></td>';
		?>
    <td><a href="./editaAdmin.php?idEd=<?php echo $fila[0]; ?>"><button type="button" name="idEdif" class="editarAdmin-submit"> Editar administracion</button></a></td></tr><br>
    <?php
}
	echo '</table>';

}
?>
        </section>
      </div>
    </body>
    </main>