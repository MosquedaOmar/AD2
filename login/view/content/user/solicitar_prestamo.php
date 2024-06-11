<?php
session_start();
require_once ('c://xampp/htdocs/login/view/content/sesionVerifique.php');
require_once ('c://xampp/htdocs/login/config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['libro_id'])) {
    try {
        // Obtener el id del libro desde la URL
        $libro_id = $_GET['libro_id'];

        // Obtener el ID del usuario desde la sesión
        $usuario_nombre = $_SESSION['usuario']; // Cambiar a tu variable de sesión correspondiente

        // Consultar la base de datos para obtener el ID del usuario
        $database = new db();
        $conn = $database->conexion();
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ?");
        $stmt->bindParam(1, $usuario_nombre, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $usuario_id = $resultado['id'];

        // Verificar el número de solicitudes en los últimos 15 días
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM solicitud_prestamo WHERE id_usuario = ? AND fecha_solicitud >= DATE_SUB(NOW(), INTERVAL 15 DAY)");
        $stmt->bindParam(1, $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $total_solicitudes = $resultado['total'];

        if ($total_solicitudes >= 3) {
            // Redireccionar con un mensaje de error si ya ha alcanzado el límite
            header("Location: libros.php?error=Has alcanzado el límite de 3 solicitudes de préstamo en los últimos 15 días.");
            exit();
        }

        // Guardar la solicitud en la base de datos
        $fecha_solicitud = date('Y-m-d H:i:s');
        $stmt = $conn->prepare("INSERT INTO solicitud_prestamo (id_usuario, id_libro, fecha_solicitud) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $libro_id, PDO::PARAM_INT);
        $stmt->bindParam(3, $fecha_solicitud, PDO::PARAM_STR);
        $stmt->execute();

        // Redireccionar de vuelta a la página de libros con un mensaje de éxito
        header("Location: libros.php?success=Solicitud de préstamo enviada correctamente.");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
