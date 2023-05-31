<?php
require 'dbh.inc.php';
require '../header.php';
$descripcion = $_POST['descrip'];
$idEd = $_POST['nuevauf-submit'];
$sql = "INSERT INTO unidadesfuncionales(Descripcion,idEdificio) VALUES ('$descripcion','$idEd');";
$consulta = mysqli_query($conn, $sql);
header("Location:../UF.php?status=success&idEd=" . $idEd);
?>