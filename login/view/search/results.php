<?php
require_once 'c://xampp/htdocs/login/view/content/sesionVerifique.php';
require_once 'c://xampp/htdocs/login/config/db.php'; // Incluye el archivo de la clase db
require_once("c://xampp/htdocs/login/view/head/header.php");

// Resto del código para realizar la búsqueda y obtener los resultados
try {
    // Instanciamos la clase db
    $database = new db();
    
    // Conexión a la base de datos
    $conn = $database->conexion();

    // Verificar si la consulta de búsqueda está presente
    if (isset($_GET['query'])) {
        // Obtener la consulta de búsqueda desde la URL
        $query = '%' . urldecode($_GET['query']) . '%'; // Agregar comodines para buscar coincidencias parciales

        // Consulta SQL para buscar en las tablas especificadas
        $sql = "
        SELECT 
            CASE 
                WHEN t.nombre = 'libro' THEN 'Libro'
                WHEN t.nombre = 'revista' THEN 'Revista'
                ELSE 'Otro' 
            END as tipo,
            l.titulo, 
            a.nombre AS autor, 
            e.nombre AS editorial, 
            g.nombre AS genero
        FROM libros l
        INNER JOIN genero g ON l.id_genero = g.id_genero
        INNER JOIN editorial e ON l.id_editorial = e.id_editorial
        INNER JOIN autor a ON l.id_autor = a.id_autor
        INNER JOIN tipo t ON l.id_tipo = t.id_tipo
        WHERE 
            (LOWER(l.titulo) LIKE LOWER(:query) OR LOWER(a.nombre) LIKE LOWER(:query) OR LOWER(e.nombre) LIKE LOWER(:query) OR LOWER(g.nombre) LIKE LOWER(:query) OR LOWER(l.isbn) LIKE LOWER(:query))
            AND (t.nombre = 'libro' OR t.nombre = 'revista')";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':query', $query);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Si no hay consulta de búsqueda, asignar un valor por defecto o manejar el error
        $resultados = [];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de búsqueda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos CSS para la lista de resultados */
        .container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 800px;
            background-color: #2b2e38;
            padding: 10px;
        }
        h2 {
            color: #ffeba7;
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
            color: #ffeba7;
        }
        tr {
            color: #ffeba7;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        tr:hover {
            background-color: #ffeba7;
            color: #000000;
        }
        h2 {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Resultados de búsqueda para "<?php echo htmlspecialchars($_GET['query']); ?>"</h2>
        <table>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Género</th>
                <th>Tipo</th>
            </tr>
            <?php if (!empty($resultados)): ?>
                <?php foreach ($resultados as $resultado): ?>
                    <tr>
                        <td><?= htmlspecialchars($resultado['titulo']) ?></td>
                        <td><?= htmlspecialchars($resultado['autor']) ?></td>
                        <td><?= htmlspecialchars($resultado['editorial'])?></td>
                        <td><?= htmlspecialchars($resultado['genero'])?></td>
                        <td><?= htmlspecialchars($resultado['tipo'])?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No se encontraron resultados para esta búsqueda.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
