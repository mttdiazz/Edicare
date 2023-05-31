<?php
require 'dbh.inc.php';

session_start();

$fecha = $_POST['fecha'];
$sum = $_POST['sum'];
$horario = $_POST['horario'];
$id = $_SESSION['id'];
$idUF = 0;
$sql = "SELECT idUnidad FROM unidadesfuncionales WHERE unidadesfuncionales.idUsuario = '$id'";
$result = mysqli_query($conn, $sql);
while ($rows = mysqli_fetch_array($result)) {
	$idUF = $rows[0];
}
$sql = "SELECT idSum FROM sumxedificio WHERE sumxedificio.Descripcion = '$sum'";
$result = mysqli_query($conn, $sql);
while ($rows = mysqli_fetch_array($result)) {
	$idSum = $rows[0];
}
$usuario = $_SESSION['email'];
$INSERT = "INSERT into reservaxsum(fecha, horario,  idSum, idUnidad) values('$fecha', '$horario', '$idSum', '$idUF');";

$consulta = mysqli_query($conn, $INSERT);
$_SESSION['id'] = $id;
header("Location: ../reserva.php");
exit();
?>