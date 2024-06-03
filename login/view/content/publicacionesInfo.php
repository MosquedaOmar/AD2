<?php
require_once 'sesionVerifique.php';
require_once ('c://xampp/htdocs/login/config/db.php');// Incluye el archivo de la clase db
require_once("c://xampp/htdocs/login/view/head/header.php");

try {
    // Instanciamos la clase db
    $database = new db();
    
    // Conexión a la base de datos
    $conn = $database->conexion();

    // Verificar si la clave 'genero' está presente en la URL
    if (isset($_GET['genero'])) {
        // Obtener el nombre del género desde la URL
        $genero_nombre = urldecode($_GET['genero']);

        // Consulta SQL para obtener todas las publicaciones (libros y revistas) del género
        $sql = "SELECT l.titulo, a.nombre AS autor, e.nombre AS editorial
                FROM libros l
                INNER JOIN genero g ON l.id_genero = g.id_genero
                INNER JOIN editorial e ON l.id_editorial = e.id_editorial
                INNER JOIN autor a ON l.id_autor = a.id_autor
                WHERE g.nombre = :nombre";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $genero_nombre);
        $stmt->execute();
        $publicaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Si 'genero' no está presente, asignar un valor por defecto o manejar el error
        $genero_nombre = "Desconocido";
        $publicaciones = [];
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
    <title>Publicaciones de género: <?= htmlspecialchars($genero_nombre) ?></title>
    <style>
        /* Estilos CSS para la lista de publicaciones */
        .container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 800px;
            background-color: #2b2e38; /* Color de fondo gris claro */
            padding: 10px; /* Añadido padding para espaciar el contenido del contenedor */
        }
        h2 {
            color: #ffeba7; /* Color de las letras para el encabezado h2 */
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
            transition: background-color 0.3s ease, color 0.3s ease; /* Añadido transición para suavizar el cambio de color */
        }
        tr:hover {
            background-color: #ffeba7; /* Color del texto inicial */
            color: #000000; /* Color del texto al pasar el mouse */
        }
        h2 {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Publicaciones de género: <?= htmlspecialchars($genero_nombre) ?></h2>
        <table>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Editorial</th>
            </tr>
            <?php if (!empty($publicaciones)): ?>
                <?php foreach ($publicaciones as $publicacion): ?>
                    <tr>
                        <td><?= htmlspecialchars($publicacion['titulo']) ?></td>
                        <td><?= htmlspecialchars($publicacion['autor']) ?></td>
                        <td><?= htmlspecialchars($publicacion['editorial']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No se encontraron publicaciones para este género.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
