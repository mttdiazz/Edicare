<?php
require 'dbh.inc.php';
require '../header.php';
$idAdmin = $_POST['idAdm'];
$query = "DELETE FROM admin WHERE emailAdmin='$idAdmin'";
$consulta = mysqli_query($conn, $query);
header("Location: ../eliminaAdmin.php?status=success");
?>