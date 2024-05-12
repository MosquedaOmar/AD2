<?php
session_start();
session_destroy(); // Destruye la sesión actual

// Redirige al usuario al inicio de sesión
header("Location: /init/view/home/login.php");
exit(); // Asegúrate de que el script se detenga después de la redirección
?>