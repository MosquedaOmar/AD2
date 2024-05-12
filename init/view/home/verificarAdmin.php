<?php
// Incluye el archivo de conexión a la base de datos
require_once("db.php");

// Verifica si se ha enviado el formulario
if (isset($_POST['submit_admin'])) {
    // Recibe los datos del formulario
    $user = $_POST['admin_user'];
    $password = $_POST['admin_password'];

    try {
        // Instancia la clase db
        $db = new db();
        
        // Realiza la conexión a la base de datos
        $pdo = $db->conexion();

        // Realiza la consulta SQL para verificar las credenciales de los administradores
        $query = "SELECT * FROM administradores WHERE usuario = :user";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':user', $user);
        $statement->execute();
        $admin = $statement->fetch();

        if ($admin && password_verify($password, $admin['contraseña'])) {
            // Si las credenciales son correctas, iniciar sesión y redirigir al usuario a la página deseada
            session_start();
            $_SESSION["s_usuario"] = $user;
            header("Location: ../../biblioteca.php");
            exit();
        } else {
            // Si las credenciales son incorrectas, mostrar un mensaje de error y redirigir al formulario de inicio de sesión
            session_start();
            $_SESSION["error_message"] = "Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
            header("Location: login.php");
            exit();
        }
    } catch (PDOException $e) {
        // Manejo de errores de base de datos
        echo "Error de base de datos";
        // Registrar los detalles del error en un archivo de registro
        error_log($e->getMessage(), 0);
    }
}
?>
