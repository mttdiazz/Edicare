<?php
require 'dbh.inc.php';

session_start();

$idReserva = $_POST['idReserva'];
$query = "DELETE FROM reservaxsum WHERE idReserva = '$idReserva'";
$consulta = mysqli_query($conn, $query);
header("Location: ../reserva.php");
exit();
?>