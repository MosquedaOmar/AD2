<?php
require_once('c://xampp/htdocs/login/config/db.php');

try {
    // Instanciar la clase db
    $database = new db();

    // Conexión a la base de datos
    $conn = $database->conexion();

    // Calcular la fecha y hora límite (48 horas antes de ahora)
    $fecha_limite = date('Y-m-d H:i:s', strtotime('-48 hours'));

    // Eliminar solicitudes que tienen más de 48 horas
    $stmt = $conn->prepare("DELETE FROM solicitud_prestamo WHERE fecha_solicitud < ? AND estado = 'pendiente'");
    $stmt->bindParam(1, $fecha_limite, PDO::PARAM_STR);
    $stmt->execute();

    echo "Solicitudes antiguas eliminadas correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
