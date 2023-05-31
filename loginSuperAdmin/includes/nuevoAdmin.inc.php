<?php
require 'dbh.inc.php';
session_start();
$nombreAdm = $_POST['idAdmin'];
$mail = $_POST['emailAdmin'];
$sql = "SELECT idAdmin FROM admin WHERE emailAdmin='$mail'";
$query = mysqli_query($conn, $sql);
while ($fila = mysqli_fetch_array($query)) {
	$idAdminE = $fila[0];
}
if ($idAdminE != 0) {
	header("Location: ../nuevoAdmin.php?error=usertaken");
	exit();
} else {
	$sql = "INSERT INTO admin (uidAdmin,emailAdmin,pwdAdmin) VALUES ('$nombreAdm','$mail','password');";
	$consulta = mysqli_query($conn, $sql);
	header("Location: ../nuevoAdmin.php?status=success");
	exit();
}
//	echo "<center>Se ha creado la administracion $nombreAdm bajo el mail $mail. Puede eliminar esta administracion en la pestaña correspondiente.</center> <br></br> <br></br> <br></br> <br></br> <center> Si desea agregar otra administracion, o para volver a la pagina anterior, haga <a href='../nuevoAdmin.php'>click aquí</a> </center>";
?>