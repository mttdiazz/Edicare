<?php


$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "baseedicare";

// Crea conexion
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// chequea q la conexion se creo correctamente
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}