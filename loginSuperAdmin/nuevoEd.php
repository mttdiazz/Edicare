<?php
require "header.php";
?>
<main>
	<body>
	<div class="wraaper-NuevoEd">
		<section class="section-NuevoEd">
			<p class="login-titulo">Agrega un nuevo Edificio</p>
			<?php
//Errores Posibles:
if (isset($_GET["error"])) {
	if ($_GET['error'] == "invalidEmail") {
		echo '<p class="error">El E-mail ingresado es invalido, intentelo otra vez</p>';
	} elseif ($_GET["error"] == "emailnonexistent") {
		echo '<p class="error">El e-mail no se encuentra en la base de datos</p>';
	}
}
?>
			<form class="form-nuevoEd" action="./includes/nuevoEd.inc.php" method="post">
				<p><input class="nuevoEd" type="text" name="mail" placeholder="E-mail de la Administracion" required></p>
				<p><input class="nuevoEd" type="text" name="direccion" placeholder="Direccion del edificio" required></p>
				<p><input class="nuevoEd" type="text" name="ciudad" placeholder="Ciudad del edificio" required></p>
				<p><input class="nuevoEd" type="text" name="SUM" placeholder="Si tiene SUM ingrese descripcion"></p>
					<br>
				<p><button type="submit" name="nuevoEd-submit" class="editar-submit">Confirmar</button>
					<br></p>
				</form>
			</section>
			<?php
if (isset($_GET["status"])) {
	if ($_GET["status"] == "success") {
		echo '<p class="success">Edificio agregado correctamente!</p>';
	}
}
?>
			<br><br><br>
			<form id="agregarUF" name="agregarUF" action="./UF.php" method="post">
				<div class="custom-select" style="width:50%; margin-left:25%;">
					<select id="idEd" name="idEd">
						<option name="UF" value="" disabled selected>Seleccione un edificio para cargar UF:</option>
						<?php
$sql = ("SELECT idEdificio, Direccion,Ciudad FROM edificios;");
$result = mysqli_query($conn, $sql);
while ($row1 = mysqli_fetch_array($result)): ;
	?>
					<option value="<?php echo $row1[0]; ?>" name="nombreEd">
					<?php
	echo $row1[1] . ' | ' . $row1[2];
	?>
														</option>
													<?php endwhile;?>
					</select>
				</div>
				<script type="text/javascript" src="selectorJs.js"></script>
				<br>
				<button type="submit" id="idEd" name="aceptar" value="agregar UF" class="cancelarReservas-submit">Agregar UF</button>
			</form>
		</div>
	</body>
</main>