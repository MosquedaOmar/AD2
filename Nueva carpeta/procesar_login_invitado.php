<?php

include 'coneccionBD.php';

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["user"];
    $contrasena = $_POST["pass"];

    // Consulta SQL para verificar las credenciales del usuario
    $query = "SELECT * FROM invitados WHERE usuario= '$usuario' AND contrasena = '$contrasena'";
    $result = mysqli_query($scon, $query);
    $num = mysqli_num_rows($result);

    // Verificar si se encontró un usuario válido
    if ($num == 1) {
        // Iniciar la sesión y redirigir al usuario
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: Biblioteca.php");
        exit();
    } else {
        // Usuario o contraseña incorrectos, mostrar un mensaje de error
        session_start();
        $_SESSION["error_message"] = "Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
        header("Location: practica.php");
        exit();
    }
}

// Cerrar la conexión a la base de datos
$scon->close();
?>