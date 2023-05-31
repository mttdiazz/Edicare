<?php
require '../../loginEdicareAdmin/header.php';
$idUF = $_GET['idUF'];
?>
<main>
	<link rel="stylesheet" href="../style.css">
	<body>
		<center>
			<div class="section-UF">
				<section class="section-UF">
					<p class="login-titulo">Unidades Funcionales del Edificio</p>
					<br><br>
					<form class="form-UF" action="./modificaUF.inc.php?idUF=<?php echo $idUF; ?>" method="post">
						<p><input type="text" name="idUsuario" class="nuevoEd" placeholder="Ingrese el email del nuevo propietatio"></p>
						<br><br>
						<p><button type="submit" class="adminUF-submit" name="adminUF-submit">Confirmar</button>
							<button type="submit" class="adminUF-submit" name="adminUF-delete">Liberar UF</button>
						</p>
					</form>
					<?php
if (isset($_GET["status"])) {
	if ($_GET["status"] == "modifySuccess") {
		echo '<br><p class="success">Se ha modificado correctamente</p>';
	} elseif ($_GET["status"] == "deleteSuccess") {
		echo '<br><p class="success">Se ha liberado a la UF correctamente</p>';
	}
} elseif (isset($_GET["error"])) {
	if ($_GET["error"] == "invalidEmail") {
		echo '<br><p class="error">El E-mail ingresado es invalido, pruebelo otra vez</p>';
	} elseif ($_GET["error"] == "usernonexistent") {
		echo '<br><p class="error">No existe un usuario con ese E-mail</p>';
	}
}
?>
				</section>
			</div>
		</center>
	</body>
</main>