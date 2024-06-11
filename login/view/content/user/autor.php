<?php
require_once ('c://xampp/htdocs/login/view/content/sesionVerifique.php');
require_once 'c://xampp/htdocs/login/config/db.php';
require_once 'c://xampp/htdocs/login/view/head/header.php';

try {
    $database = new db();
    $conn = $database->conexion();
    
    // Paginación
    $results_per_page = 8; // Número de resultados por página
    $sql = "SELECT COUNT(DISTINCT nombre) AS total FROM autor";
    $stmt = $conn->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_results = $row['total'];
    $total_pages = ceil($total_results / $results_per_page); // Total de páginas

    // Obtiene la página actual
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    // Calcula el inicio del resultado de la consulta
    $start_limit = ($page - 1) * $results_per_page;

    // Consulta SQL para obtener los autores por página
    $sql = "SELECT DISTINCT nombre FROM autor LIMIT $start_limit, $results_per_page";
    $stmt = $conn->query($sql);
    $autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <style>
        /* Estilos CSS para la lista de autores y la paginación */
        .container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 700px;
            background-color: #2b2e38; /* Color de fondo gris claro */
            padding: 20px; /* Añadido padding para espaciar el contenido del contenedor */
        }
        .autor {
            border-bottom: 1px solid #555; /* Línea de separación entre autores */
            padding-bottom: 10px; /* Espacio entre autores */
            margin-bottom: 10px; /* Espacio entre autores */
            overflow: hidden; /* Para que los elementos floten correctamente */
        }
        h2 {
            color: #ffeba7; /* Color de las letras para el encabezado h2 */
            float: left; /* Alinear a la izquierda */
            margin-top: 20px; /* Elimina el espacio superior del título */
            font-size: 14px;
        }
        .btn-ver-lista {
            background-color: #ffeba7; /* Color de fondo del botón */
            color: #1f2029; /* Color de las letras del botón */
            padding: 8px 12px; /* Añadido padding para el botón */
            border: none; /* Quita el borde del botón */
            border-radius: 4px; /* Borde redondeado para el botón */
            cursor: pointer; /* Cambia el cursor al pasar por encima del botón */
            float: right; /* Alinea el botón a la derecha */
            text-decoration: none; /* Elimina el subrayado del botón */
            margin-top: 10px; /* Espacio entre el botón y el título */
        }
        .btn-ver-lista:hover {
            background-color: #1f2029; /* Color de fondo del botón al pasar el mouse */
            color: #ffeba7; /* Color de las letras del botón al pasar el mouse */
            text-decoration: none ;
        }
        .pagination {
            text-align: center; /* Centra los elementos de la paginación */
            margin-top: 20px; /* Espacio entre la lista de autores y la paginación */
            max-width: 400px; /* Ancho máximo del contenedor de paginación */
            margin-left: auto; /* Margen izquierdo automático */
            margin-right: auto; /* Margen derecho automático */
        }
        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #ffeba7;
            background-color: #1f2029;
            border-radius: 5px;
            margin-right: 5px;
        }
        .pagination a.active {
            background-color: #ffeba7;
            color: #1f2029;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php foreach ($autores as $autor): ?>
            <div class="autor">
                <h2><?= htmlspecialchars($autor['nombre']) ?></h2>
                <a href="/login/view/content/user/publicaciones.php?autor=<?= urlencode($autor['nombre']) ?>" class="btn-ver-lista" style="font-size: 10px;" >Ver Lista Completa</a>
                <div style="clear:both;"></div> <!-- Limpiar flotantes -->
            </div>
        <?php endforeach; ?>
    </div>
     <!-- Paginación -->
     <div class="pagination-container">
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" class="<?php if ($i == $page) echo 'active'; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>
