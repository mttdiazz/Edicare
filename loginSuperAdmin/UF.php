<?php
require 'header.php';
if (isset($_POST['aceptar'])) {
	$idEd = $_POST['idEd'];
	$_SESSION['idEd'] = $idEd;
} else {
	$idEd = $_SESSION['idEd'];

}
?>
<body>
	<div class="wraaper-nuevoEd">
		<section class="section-nuevoEd">
			<form class="form-nuevoEd" action="./includes/UF.inc.php" method="post">
				<p><input type="text" class="nuevoEd" placeholder="Piso y Departamento" name="descrip" required></p>
				<br>
				<p><button type="submit" name="nuevauf-submit" class= "editar-submit" value="<?php echo $idEd; ?>">Confirmar</button>
					<br>
				</p>
			</form>
<?php
if (isset($_GET["status"])) {
	if ($_GET['status'] == 'success') {
		$idEd = $_GET['idEd'];
		echo '<br><p class="signupsuccess">Se ha  cargado la UF exitosamente</p>';
	}
}
echo '<table class="datosUser">
		<th>Unidades Funcionales del edificio:</th>';
$sql = ("SELECT Descripcion FROM unidadesfuncionales WHERE idEdificio='$idEd';");
$result = mysqli_query($conn, $sql);
while ($fila = mysqli_fetch_array($result)) {
	echo '<tr><td>' . $fila[0];
}
echo '</table></body></main>';
?>
