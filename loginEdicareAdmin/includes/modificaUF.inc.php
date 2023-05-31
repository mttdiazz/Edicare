<?php
require 'dbh.inc.php';
session_start();
$idUF = $_GET['idUF'];
if (isset($_POST['adminUF-submit'])) {
	$email = $_POST['idUsuario'];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ./adminUF.inc.php?error=invalidEmail");
		exit();
	}
	$sql = "SELECT idUsuario FROM usuarios WHERE emailUsuario='$email'";
	$result = mysqli_query($conn, $sql);
	while ($fila = mysqli_fetch_array($result)) {
		$idUs = $fila[0];
	}
	if ($idUs == NULL) {
		header("Location: ./adminUF.inc.php?error=usernonexistent");
		exit();
	}
	$sql = "UPDATE unidadesfuncionales SET idUsuario='$idUs' WHERE idUnidad='$idUF'";
	$result = mysqli_query($conn, $sql);
	header("Location: ../adminUF.php");
	exit();
} elseif (isset($_POST['adminUF-delete'])) {
	$sql = "UPDATE unidadesfuncionales SET idUsuario=NULL WHERE idUnidad='$idUF'";
	//$sql = "DELETE FROM unidadesfuncionales WHERE idUnidad='$idUF'";
	$result = mysqli_query($conn, $sql);
	header("Location: ../adminUF.php");
	exit();
}