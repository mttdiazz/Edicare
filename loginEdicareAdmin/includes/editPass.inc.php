<?php
require '../header.php';
$contraVieja= $_POST['contraVieja'];
$contraNueva = $_POST['contraNueva'];
$idAdmin =$_SESSION['id'];
$query="SELECT admin.pwdAdmin FROM admin WHERE admin.idAdmin = $idAdmin";
$result = mysqli_query($conn, $query);
$row1 = mysqli_fetch_array($result);
$password = $row1['pwdAdmin'];

if ($password = $contraVieja)
$sql = "UPDATE admin SET pwdAdmin = '$contraNueva' WHERE idAdmin='$idAdmin'";
$query = mysqli_query($conn, $sql);
header("Location: ../accountSettings.php");
exit();