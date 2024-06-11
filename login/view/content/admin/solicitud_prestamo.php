<?php
require_once('c://xampp/htdocs/login/view/content/sesionAdmin.php');
require_once('c://xampp/htdocs/login/config/db.php');

try {
    // Instanciamos la clase db
    $database = new db();

    // Conexión a la base de datos
    $conn = $database->conexion();

    // Eliminar solicitudes antiguas (más de 48 horas sin aceptar o rechazar)
    $fecha_limite = date('Y-m-d H:i:s', strtotime('-48 hours'));
    $stmt = $conn->prepare("DELETE FROM solicitud_prestamo WHERE fecha_solicitud < ? AND estado = 'pendiente'");
    $stmt->bindParam(1, $fecha_limite, PDO::PARAM_STR);
    $stmt->execute();

    // Paginación
    $results_per_page = 10; // Número de solicitudes por página
    $sql = "SELECT COUNT(*) AS total FROM solicitud_prestamo"; // Contar total de solicitudes
    $stmt = $conn->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_results = $row['total'];
    $total_pages = ceil($total_results / $results_per_page); // Total de páginas

    // Obtiene la página actual
    if (!isset($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] < 1) {
        $page = 1;
    } else if ($_GET['page'] > $total_pages) {
        $page = $total_pages;
    } else {
        $page = $_GET['page'];
    }

    // Calcula el inicio del resultado de la consulta
    $start_limit = ($page - 1) * $results_per_page;

    // Consulta SQL para obtener las solicitudes por página
    $sql = "SELECT sp.*, u.usuario, l.titulo AS nombre_libro FROM solicitud_prestamo sp
            INNER JOIN usuarios u ON sp.id_usuario = u.id
            INNER JOIN libros l ON sp.id_libro = l.id_libro
            LIMIT $start_limit, $results_per_page";
    $stmt = $conn->query($sql);
    $solicitudes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    // Agrega una salida para asegurarte de que $solicitudes esté definido incluso en caso de error
    $solicitudes = array();
}

require_once("c://xampp/htdocs/login/view/head/headerAdmin.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Solicitudes de Préstamos</title>
    <!-- Estilos CSS -->
    <style>
        /* Estilos CSS para la lista de usuarios */
        .container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 1000px;
            background-color: #f2f2f2; /* Color de fondo gris claro */
            padding: 20px; /* Añadido padding para espaciar el contenido del contenedor */
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-bar input {
            padding: 5px 10px; /* Reducir el padding para hacer más pequeño el campo */
            font-size: 14px; /* Reducir el tamaño de la fuente */
            width: 200px; /* Definir un ancho fijo para el campo de entrada */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 12px;
            border-right: 1px solid #ddd; /* Agregar borde derecho para separar las columnas */
        }
        th {
            background-color: #f2f2f2;
            border-right: 1px solid #ddd; /* Agregar borde derecho para separar las columnas */
        }
        th:last-child, td:last-child {
            border-right: none; /* Eliminar el borde derecho para la última columna */
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        h2 {
            font-size: 14px;
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }
        .pagination a:hover:not(.active) {
            background-color: #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Lista de Solicitudes de Préstamos</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Libro</th>
                    <th>Usuario</th>
                    <th>Fecha de Solicitud</th>
                    <th>Fecha de Aceptación</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($solicitudes as $solicitud): ?>
                    <tr>
                        <td><?= $solicitud['nombre_libro'] ?></td>
                        <td><?= $solicitud['usuario'] ?></td>
                        <td><?= $solicitud['fecha_solicitud'] ?></td>
                        <td><?= $solicitud['fecha_aceptacion'] ?></td>
                        <td><?= $solicitud['estado'] ?></td>
                        <td>
                            <!-- Formulario para aceptar o rechazar la solicitud de préstamo -->
                            <form action="aceptar_rechazar_prestamo.php" method="post" style="display: inline-block;">
                                <input type="hidden" name="id_solicitud" value="<?= $solicitud['id_solicitud'] ?>">
                                <select name="accion">
                                    <option value="aceptar">Aceptar</option>
                                    <option value="rechazar">Rechazar</option>
                                </select>
                                <button type="submit">Enviar</button>
                            </form>
                            <!-- Formulario para cargar el préstamo -->
                            <?php if ($solicitud['estado'] == 'aceptada'): ?>
                                <form action="insertar_prestamo.php" method="post" style="display: inline-block;">
                                        <input type="hidden" name="id_solicitud" value="<?= $solicitud['id_solicitud'] ?>">
                                        <input type="hidden" name="id_libro" value="<?= $solicitud['id_libro'] ?>">
                                        <input type="hidden" name="id_usuario" value="<?= $solicitud['id_usuario'] ?>">
                                        <input type="hidden" name="fecha_solicitud" value="<?= $solicitud['fecha_solicitud'] ?>">
                                        <button type="submit">Cargar Préstamo</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Paginación -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>">«</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?= $page + 1 ?>">»</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
