<?php
require 'dbh.inc.php';
session_start();
$mailAd = $_POST['mail'];
$dir = $_POST['direccion'];
$ciu = $_POST['ciudad'];
$SS = $_POST['SUM'];
$idAd = 0;
$idEd = 0;
$sql = "SELECT idAdmin FROM admin WHERE emailAdmin='$mailAd'";
$result = mysqli_query($conn, $sql);
while ($rows = mysqli_fetch_array($result)) {
	$idAd = $rows[0];
}
if ($idAd != 0) {
	$sql = "INSERT INTO edificios(Direccion,Ciudad,idAdmin) VALUES ('$dir','$ciu','$idAd')";
	$consulta = mysqli_query($conn, $sql);
	if ($SS != "") {
		$sql = "SELECT idEdificio FROM edificios WHERE Direccion='$dir' AND Ciudad='$ciu'";
		$result = mysqli_query($conn, $sql);
		while ($rows = mysqli_fetch_array($result)) {
			$idEd = $rows[0];
		}
		echo $idEd;
		$sql = "INSERT INTO sumxedificio(Descripcion,idEdificio) VALUES ('$SS', '$idEd')";
		$consulta = mysqli_query($conn, $sql);
	}
	header("Location: ../nuevoEd.php?status=success");
} else {
	header("Location: ../nuevoEd.php?error=emailnonexistent");
}

?>