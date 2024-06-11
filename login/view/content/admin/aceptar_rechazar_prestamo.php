<?php
require_once('c://xampp/htdocs/login/config/db.php');

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id_solicitud = $_POST['id_solicitud'];
    $accion = $_POST['accion'];

    // Definir el estado y la fecha según la acción seleccionada
    if ($accion === 'aceptar') {
        $estado = 'aceptada';
        $fecha_cambio = date('Y-m-d H:i:s'); // Fecha de aceptación
    } elseif ($accion === 'rechazar') {
        $estado = 'rechazada';
        $fecha_cambio = date('Y-m-d H:i:s'); // Fecha de rechazo
    } else {
        // Manejar una acción no esperada
        echo "Acción no válida.";
        exit();
    }

    try {
        // Instancia la clase db
        $database = new db();

        // Conexión a la base de datos
        $conn = $database->conexion();

        // Actualiza el estado y la fecha de la solicitud según la acción seleccionada
        if ($accion === 'aceptar') {
            $sql = "UPDATE solicitud_prestamo SET estado = :estado, fecha_aceptacion = :fecha_cambio WHERE id_solicitud = :id_solicitud";
        } elseif ($accion === 'rechazar') {
            $sql = "UPDATE solicitud_prestamo SET estado = :estado, fecha_aceptacion = :fecha_cambio WHERE id_solicitud = :id_solicitud";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_solicitud', $id_solicitud);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':fecha_cambio', $fecha_cambio);

        // Ejecuta la consulta
        $stmt->execute();

        // Redirecciona a la página anterior
        header("Location: solicitud_prestamo.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Si se intenta acceder directamente a este archivo sin enviar el formulario, redirecciona a la página de inicio
    header("Location: /login/index.php");
    exit();
}
?>
