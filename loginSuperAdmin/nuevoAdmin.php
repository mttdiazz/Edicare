<?php
require "header.php";
?>
<!DOCTYPE html>
<main>
	<body>
		<div class="wraaper-NuevoAdmin">
			<section class="section-NuevoAdmin">
				<p class="login-titulo">Agrega una nueva administracion</p>
				<?php
//Errores Posibles:
if (isset($_GET["error"])) {
	if ($_GET["error"] == "invaliddnimail") {
		echo '<p class="signuperror">Mail Invalido!</p>';
	} elseif ($_GET["error"] == "usertaken") {
		echo '<p class="signuperror">Ya existe una administracion con ese E-mail</p>';
	}
}
//mensaje de exito

elseif (isset($_GET["status"])) {
	if ($_GET["status"] == "success") {
		echo '<p class="signupsuccess">El administrador se ha agregado exitosamente!</p>';
	}
}
?>
				<br>
				<form class="form-nuevoAdmin" action="includes/nuevoAdmin.inc.php" method="post">
					<p><input class="nuevoEd" type="text" name="idAdmin" placeholder="Nombre de la Administracion" required></p>
					<p><input class="nuevoEd" type="text" name="emailAdmin" placeholder="Email de la administracion" required></p>
					<p><button type="submit" name="nuevoAdm-submit" class="editar-submit">Confirmar</button>
					<br>
				</form>
			</section>
		</div>
	</body>
</main>