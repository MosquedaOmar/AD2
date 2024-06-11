<?php
require_once 'c://xampp/htdocs/login/config/db.php'; // Incluye el archivo de la clase db

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID de usuario y el nuevo estado de afiliación del formulario
    $id_usuario = $_POST['id_usuario'];
    $estado_afiliacion = $_POST['estado_afiliacion'];

    try {
        // Instanciamos la clase db
        $database = new db();
        
        // Conexión a la base de datos
        $conn = $database->conexion();

        // Consulta SQL para actualizar el estado de afiliación del usuario
        $sql = "UPDATE Afiliados SET Estado_Afiliacion = :estado WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':estado', $estado_afiliacion);
        $stmt->bindParam(':id', $id_usuario);
        $stmt->execute();

        // Redirigir de nuevo a la página de lista de usuarios después de la actualización
        header("Location: /login/view/content/admin/usuarios.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
