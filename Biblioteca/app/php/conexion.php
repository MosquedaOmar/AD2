<?php

// Establece la conexión a la base de datos (Completa con la información correcta)
$servername = "localhost";
$username = "root";
$password = "";
$database = "database";

$scon = mysqli_connect($servername, $username, $password, $database);

// Verifica la conexión a la base de datos
if (!$scon) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}


?>

