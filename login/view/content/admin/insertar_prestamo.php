<?php
// Verifica si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se recibieron todos los datos necesarios
    if (isset($_POST['id_solicitud'], $_POST['id_libro'], $_POST['id_usuario'], $_POST['fecha_solicitud'])) {
        // Establece la conexión a la base de datos
        require_once('c://xampp/htdocs/login/config/db.php');
        $database = new db();
        $conn = $database->conexion();

        // Obtiene los datos del formulario
        $id_solicitud = $_POST['id_solicitud'];
        $id_libro = $_POST['id_libro'];
        $id_usuario = $_POST['id_usuario'];
        $fecha_solicitud = $_POST['fecha_solicitud'];

        // Prepara la consulta para insertar en la tabla prestamos
        $stmt = $conn->prepare("INSERT INTO prestamos (id_usuario, id_libro, fecha_prestamo, id_solicitud, fecha_solicitud, estado) 
                                VALUES (:id_usuario, :id_libro, NOW(), :id_solicitud, :fecha_solicitud, 'pendiente')");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_libro', $id_libro);
        $stmt->bindParam(':id_solicitud', $id_solicitud);
        $stmt->bindParam(':fecha_solicitud', $fecha_solicitud);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // Redirige de vuelta a la página solicitud_prestamo.php
            header("Location: solicitud_prestamo.php");
            exit();
        } else {
            echo "Error al cargar el préstamo.";
        }
    } else {
        echo "No se recibieron todos los datos necesarios para cargar el préstamo.";
    }
} else {
    echo "Acceso denegado.";
}
?>
