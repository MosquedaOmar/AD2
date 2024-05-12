<?php
// Incluye el archivo de conexión a la base de datos
include 'coneccionBD.php';

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nombre = mysqli_real_escape_string($scon, $_POST['Nombre']);
    $apellido = mysqli_real_escape_string($scon, $_POST['Apellido']);
    $dni = mysqli_real_escape_string($scon, $_POST['DNI']);
    $fechaNacimiento = mysqli_real_escape_string($scon, $_POST['FechaNacimiento']);
    $correo = mysqli_real_escape_string($scon, $_POST['Correo']);
    $telefono = mysqli_real_escape_string($scon, $_POST['Telefono']);
    $usuario = mysqli_real_escape_string($scon, $_POST['user']);
    $password = mysqli_real_escape_string($scon, $_POST['password']);

    // Realiza la inserción en la base de datos
    $sql = "INSERT INTO invitados (nombre, apellido, dni, fecha_nacimiento, correo_electronico, telefono, usuario, contrasena) 
            VALUES ('$nombre', '$apellido', '$dni', '$fechaNacimiento', '$correo', '$telefono', '$usuario', '$password')";

    if (mysqli_query($scon, $sql)) {
        // Si la inserción fue exitosa, redirige al usuario a la página de inicio de sesión
        header("Location: practica.php");
        exit();
    } else {
        // Si ocurrió un error durante la inserción, muestra un mensaje de error
        echo "Error en el registro. Por favor, intenta de nuevo." . mysqli_error($scon);
    }

    // Cierra la conexión a la base de datos
    mysqli_close($scon);
}
?>
