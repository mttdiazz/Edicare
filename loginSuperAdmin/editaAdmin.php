<?php
require "header.php";
$_SESSION['idEd'] = $_GET['idEd'];
$idEd = $_SESSION['idEd'];
$sql = "SELECT Direccion, Ciudad FROM edificios WHERE idEdificio='$idEd'";
$query = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($query);
$Dir = $fila[0];
$Ciu = $fila[1];
?>
<main>
	<body>
		<div class="weaaper-NuevoEd">
			<section class="section-NuevoEd">
				<p class="login-titulo">Cambiar Administrador Para:  <?php echo $Dir . '    ' . $Ciu; ?></p>
				<br><br><br>
			<form class="form-nuevoEd" action="./includes/editaAdmin.inc.php" method="post">
				<p><input class="nuevoEd" type="text" name="mail"
					placeholder="E-mail de la nueva administracion" required></p>
				<p><button class="editar-submit" type="submit" name="editaAd-submit" value="<?php echo $idEd; ?>">Confirmar</button></p>
			</form>
		</section>
		<?php
if (isset($_GET['error']) == 'emailInvalid') {
	echo '<p class="error"> El email ingresado es invalido, vuelvelo a intentar</p>';
} elseif (isset($_GET['error']) == 'nonexistentadmin') {
	echo '<p class="error">No existe una administracion con ese E-mail en la base de datos</p>';
}
?>
	</div>
</body>
</main>