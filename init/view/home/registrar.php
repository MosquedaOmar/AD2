<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establece la conexión a la base de datos
    require_once("db.php");

    // Recibe los datos del formulario
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $dni = $_POST['DNI'];
    $fechaNacimiento = $_POST['FechaNacimiento'];
    $correo = $_POST['Correo'];
    $telefono = $_POST['Telefono'];
    $direccion = $_POST['Direccion'];
    $usuario = $_POST['user'];
    $password = $_POST['password'];

    // Verificar si el usuario o correo electrónico ya existen en la base de datos
    $query = "SELECT COUNT(*) FROM invitados WHERE nombre_usuario = :usuario OR correo_electronico = :correo";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":usuario", $usuario);
    $statement->bindParam(":correo", $correo);
    $statement->execute();
    $result = $statement->fetchColumn();

    // Si el usuario o correo electrónico ya existen, muestra un mensaje de error
    if ($result > 0) {
        echo "El usuario o correo electrónico ya están registrados. Por favor, elige otro.";
    } else {
        // Prepara la consulta SQL para insertar un nuevo usuario en la tabla invitados
        $query = "INSERT INTO invitados (nombre, apellido, dni, fecha_nacimiento, correo_electronico, telefono, direccion, nombre_usuario, contraseña_usuario) VALUES (:nombre, :apellido, :dni, :fechaNacimiento, :correo, :telefono, :direccion, :usuario, :password)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":apellido", $apellido);
        $statement->bindParam(":dni", $dni);
        $statement->bindParam(":fechaNacimiento", $fechaNacimiento);
        $statement->bindParam(":correo", $correo);
        $statement->bindParam(":telefono", $telefono);
        $statement->bindParam(":direccion", $direccion);
        $statement->bindParam(":usuario", $usuario);
        $statement->bindParam(":password", $password);

        // Ejecuta la consulta
        if ($statement->execute()) {
            // Si la inserción fue exitosa, redirige al usuario a la página de inicio de sesión
            header("Location: login.php");
            exit();
        } else {
            // Si ocurrió un error durante la inserción, muestra un mensaje de error
            echo "Error al registrar el usuario.";
        }
    }
}
?>

