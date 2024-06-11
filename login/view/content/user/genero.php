<?php
require_once ('c://xampp/htdocs/login/view/content/sesionVerifique.php');
require_once ('c://xampp/htdocs/login/config/db.php'); // Incluye el archivo de la clase db
require_once("c://xampp/htdocs/login/view/head/header.php");

// Establecer el número de resultados por página
$results_per_page = 8;

try {
    // Instanciamos la clase db
    $database = new db();
    
    // Conexión a la base de datos
    $conn = $database->conexion();

    // Consulta SQL para obtener todos los géneros distintos
    $sql_count = "SELECT COUNT(DISTINCT nombre) AS total FROM genero";
    $stmt_count = $conn->query($sql_count);
    $row_count = $stmt_count->fetch(PDO::FETCH_ASSOC);
    $total_rows = $row_count['total'];

    // Calcular el número total de páginas
    $total_pages = ceil($total_rows / $results_per_page);

    // Determinar la página actual
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    // Calcular el inicio del conjunto de resultados
    $start = ($page - 1) * $results_per_page;

    // Consulta SQL para obtener los géneros de la página actual
    $sql = "SELECT DISTINCT nombre FROM genero LIMIT $start, $results_per_page";
    $stmt = $conn->query($sql);
    $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de géneros</title>
    <style>
        /* Estilos CSS para la lista de géneros */
        .container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 700px;
            background-color: #2b2e38; /* Color de fondo gris claro */
            padding: 20px; /* Añadido padding para espaciar el contenido del contenedor */
        }
        .genero {
            border-bottom: 1px solid #555; /* Línea de separación entre géneros */
            padding-bottom: 10px; /* Espacio entre géneros */
            margin-bottom: 10px; /* Espacio entre géneros */
            overflow: hidden; /* Para que los elementos floten correctamente */
        }
        h2 {
            color: #ffeba7; /* Color de las letras para el encabezado h2 */
            display: inline-block; /* Hace que el título y el botón estén en la misma línea */
            font-size: 14px;
            margin-top: 20px;
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
        <?php foreach ($generos as $genero): ?>
            <div class="genero">
                <h2><?= htmlspecialchars($genero['nombre']) ?></h2>
                <a href="/login/view/content/user/publicacionesInfo.php?genero=<?= urlencode($genero['nombre']) ?>" class="btn-ver-lista" style="font-size: 10px;">Ver Lista Completa</a>
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
