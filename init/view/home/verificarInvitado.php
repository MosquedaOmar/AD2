<?php
session_start();
// Incluye el archivo de conexión a la base de datos
require_once("db.php");

// Verifica si se ha enviado el formulario
if (isset($_POST['submit_login'])) {
    // Recibe los datos del formulario
    $user = $_POST['user'];
    $password = $_POST['password'];

    try {
        // Instancia la clase db
        $db = new db();
        
        // Realiza la conexión a la base de datos
        $pdo = $db->conexion();

        // Realiza la consulta SQL para verificar las credenciales de invitados
        $query = "SELECT * FROM invitados WHERE nombre_usuario = :user";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':user', $user);
        $statement->execute();
        $invitado = $statement->fetch();

        if ($invitado) {
            // Define la variable de sesión para el usuario que ha iniciado sesión
            $_SESSION["s_usuario"] = $user;
            
            // Redirige a la página principal de invitados
            header("Location: ../../invitadobiblioteca.php");
            exit();
        } else {
            // Si no se encontró, muestra un mensaje de error o redirige de vuelta al formulario de inicio de sesión
            echo "Usuario o contraseña incorrectos";
        }
    } catch (PDOException $e) {
        // Manejo de errores de base de datos
        echo "Error de base de datos: " . $e->getMessage();
    }
}
?>

