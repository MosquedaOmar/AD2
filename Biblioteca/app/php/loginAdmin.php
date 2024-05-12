<?php

require "conexion.php"

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario_admin"];
    $contrasena = $_POST["contrasena_admin"];

    // Consulta SQL para verificar las credenciales del usuario
    $query = "SELECT * FROM administradores WHERE usuario= '$usuario' AND contraseña = '$contrasena'";
    $result = mysqli_query($scon, $query);
    $num = mysqli_num_rows($result);

    // Verificar si se encontró un usuario válido
    if ($num == 1) {
        // Iniciar la sesión y redirigir al usuario
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: ../app/pages/admin/admin.html");
        exit();
    } else {
        // Usuario o contraseña incorrectos, mostrar un mensaje de error
        session_start();
        $_SESSION["error_message"] = "Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
        header("Location: ../app/pages/login.html");
        exit();
    }
}

// Cerrar la conexión a la base de datos
$scon->close();
?>