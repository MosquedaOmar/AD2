<?php
session_start();

// Verificar si el usuario ha iniciado sesión de manera segura
if (!isset($_SESSION["usuario"])) {
    // Si no ha iniciado sesión, redirigir al inicio de sesión
    header("Location: practica.php");
    exit();
}
?>
