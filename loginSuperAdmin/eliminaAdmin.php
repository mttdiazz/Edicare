<?php
require 'header.php';
?>
<main>
	<body>
		<center>
			<div class="wraaper-EliminaAd">
				<section class="section-EliminaAd">
					<p class="login-titulo">Eliminar un administrador</p>
					<br><br>
					<form class="form-eliminaAdmin" action="./includes/eliminaAdmin.inc.php" method="post">
						<p><input class="nuevoEd" type="text" name="idAdm" placeholder="E-mail de la Administracion" required></p>
						<br><br>
						<p><button type="submit" class="confirmarEliminacionAdmin" name="eliminaAdm-submit">Confirmar</button>
							<br><br>
						</p>
					</form>
					<?php
if (isset($_GET["status"])) {
	if ($_GET["status"] == "success") {
		echo '<br><p class="succress">El administrador se ha eliminado exitosamente!</p>';
	}
}
?>
				</section>
			</div>
			<br><br><br>
</center>
<?php
echo '<table class="datosUser">
		<tr><th> Administraciones Cargadas en el Sistema:</th></tr>';
$sql = ("SELECT uidAdmin, emailAdmin FROM admin;");
$result = mysqli_query($conn, $sql);
while ($fila = mysqli_fetch_array($result)) {
	echo '<tr><td>' . $fila[0] . ' | ' . $fila[1] . '</td></tr><br>';
}
echo '</table>';
?>
</body>
</main>