<?php
require "../header.php";
$idEd = $_SESSION['idEd'];
$mailN = $_POST['mail'];
if (!filter_var($mailN, FILTER_VALIDATE_EMAIL)) {
	header("Location: ../editaAdmin.php?error=emailInvalid");
	exit();
}
$sql = "SELECT idAdmin FROM admin WHERE emailAdmin='$mailN';";
$query = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($query);
echo $fila[0];
if ($fila[0] != 0) {
	$sql = "UPDATE edificios SET idAdmin='$fila[0]' WHERE idEdificio='$idEd';";
	$query = mysqli_query($conn, $sql);
	header("Location: ../index.php");
	exit();
} else {
	header("Location: ../editaAdmin.php?error=nonexistentadmin");
	exit();
}
?>