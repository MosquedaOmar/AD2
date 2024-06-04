<?php
require_once ('c://xampp/htdocs/login/view/content/sesionVerifique.php');
require_once ('c://xampp/htdocs/login/config/db.php'); // Incluye el archivo de la clase db
require_once("c://xampp/htdocs/login/view/head/header.php");

try {
    // Instanciamos la clase db
    $database = new db();
    
    // Conexión a la base de datos
    $conn = $database->conexion();

    // Paginación
    $results_per_page = 10; // Número de libros por página
    $sql = "SELECT COUNT(*) AS total FROM libros WHERE id_tipo = 1"; // Contar total de libros
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

    // Consulta SQL para obtener los libros por página
    $sql = "SELECT l.id_libro, l.titulo, g.nombre AS genero, a.nombre AS autor, e.nombre AS editorial
            FROM libros l
            INNER JOIN genero g ON l.id_genero = g.id_genero
            INNER JOIN autor a ON l.id_autor = a.id_autor
            INNER JOIN editorial e ON l.id_editorial = e.id_editorial
            WHERE l.id_tipo = 1
            LIMIT $start_limit, $results_per_page";
    $stmt = $conn->query($sql);
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
    <style>
        /* Estilos CSS para la lista de libros */
        .container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 1000px;
            background-color: #2b2e38; /* Color de fondo gris claro */
            padding: 10px; /* Añadido padding para espaciar el contenido del contenedor */
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
        }
        th {
            background-color: #1f2029;
        }
        tr:hover {
            background-color: #ffeba7; /* Color del texto inicial */
            color: #000000; /* Color del texto al pasar el mouse */
        }
        h2{
            font-size: 18px;
        }
        /* Estilos CSS para la paginación */
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination-container {
            display: flex;
            justify-content: center;
        }
        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            border: 1px solid #ddd;
            color: #fff;
            background-color: #1f2029;
            text-decoration: none;
            border-radius: 3px;
        }
        .pagination a.active {
            background-color: #ffeba7;
            color: #1f2029;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lista de Libros</h2>
        <table>
            <tr>
                <th>Título</th>
                <th>Género</th>
                <th>Autor</th>
                <th>Editorial</th>
            </tr>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?= $libro['titulo'] ?></td>
                    <td><?= $libro['genero'] ?></td>
                    <td><?= $libro['autor'] ?></td>
                    <td><?= $libro['editorial'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
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
