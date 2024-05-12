<?php
// Establecer la conexión a la base de datos
include 'conexion.php';

// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$correo_electronico = $_POST['correo_electronico'];
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$nombre_usuario = $_POST['nombre_usuario'];
$id_nacionalidad = $_POST['id_nacionalidad'];

// Verificar si el DNI, correo electrónico y nombre de usuario no están repetidos en la base de datos
$sql = "SELECT * FROM Invitados WHERE dni = '$dni' OR correo_electronico = '$correo_electronico' OR nombre_usuario = '$nombre_usuario'";
$result = mysqli_query($scon, $sql);

if (mysqli_num_rows($result) > 0) {
    // Si se encuentran registros con el mismo DNI, correo electrónico o nombre de usuario, mostrar un mensaje de error
    echo "El DNI, el correo electrónico o el nombre de usuario ya están registrados";
} else {
    // Insertar los datos en la tabla Invitados
    $sql_insert = "INSERT INTO Invitados (nombre, apellido, dni, telefono, correo_electronico, direccion, fecha_nacimiento, nombre_usuario, id_nacionalidad) VALUES ('$nombre', '$apellido', '$dni', '$telefono', '$correo_electronico', '$direccion', '$fecha_nacimiento', '$nombre_usuario', '$id_nacionalidad')";

    if (mysqli_query($scon, $sql_insert)) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar registro: " . mysqli_error($scon);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($scon);
?>
