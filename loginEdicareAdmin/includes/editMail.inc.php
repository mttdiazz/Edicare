<?php
require '../header.php';
$emailVie = $_SESSION['email'];
$emailNuev = $_POST['mail-Edit'];
$sql = "UPDATE admin SET emailAdmin='$emailNuev' WHERE emailAdmin='$emailVie'";
$query = mysqli_query($conn, $sql);
$_SESSION['email'] = $emailNuev;
header("Location: ../accountSettings.php");
exit();