<?php
session_start();

// Verificar si el usuario no está autenticado
if(!isset($_SESSION['usuario'])) {
    // Redirigir al usuario a la página de inicio de sesión u otra página
    header("Location: /login/view/home/login.php");
    exit; // Asegura que el script se detenga después de redirigir al usuario
}

?>