<?php
require 'header.php';
?>
<link rel="sylesheet" href="style2.css">
<main>
	<title> ~EDICARE~ </title>
      <div class="wraaper-nuevoEd">
        <section class="section-default">
          <?php
if (isset($_GET['idEd'])) {
	$idEd = $_GET['idEd'];
	$_SESSION['idEd'] = $idEd;
} else {
	$idEd = $_SESSION['idEd'];
}
echo '<center><table class="datosUser">
		<p class="login-titulo">Unidades Funcionales del Edificio</p>
		<br><br>
		<th class = "deptoTabla">Departamento</th><th>Nombre</th><th>E-mail</th><th>Accion</th>';
$sql = "SELECT idUnidad,Descripcion,idUsuario FROM unidadesfuncionales WHERE idEdificio='$idEd';";
$result = mysqli_query($conn, $sql);
//
while ($fila = mysqli_fetch_array($result)) {
	if ($fila[2] != NULL) {
		$sql = "SELECT emailUsuario,nombreApellido FROM usuarios WHERE idUsuario='$fila[2]'";
		$consulta = mysqli_query($conn, $sql);
		while ($rows = mysqli_fetch_array($consulta)) {
			$email = $rows[0];
			$name = $rows[1];
		}
	} else {
		$email = "";
		$name = "";
	}
	echo '<tr><td>' . $fila[1] . '</td><td>' . $name . '</td><td>' . $email . '</td><td>';?>
	<a href="./includes/adminUF.inc.php?idUF=<?php echo $fila[0]; ?>" class="nuevoUF"><button type="button" class="editar-submit">Modificar</button></a>
	<?php
echo '</td></tr>';
}