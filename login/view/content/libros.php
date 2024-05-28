<?php
require_once 'c://xampp/htdocs/login/config/db.php'; // Incluye el archivo de la clase db

try {
    // Instanciamos la clase db
    $database = new db();
    
    // Conexión a la base de datos
    $conn = $database->conexion();

    // Consulta SQL para obtener todos los libros con su género, autor y editorial
    $sql = "SELECT l.id_libro, l.titulo, g.nombre AS genero, a.nombre AS autor, e.nombre AS editorial
            FROM libros l
            INNER JOIN genero g ON l.id_genero = g.id_genero
            INNER JOIN autor a ON l.id_autor = a.id_autor
            INNER JOIN editorial e ON l.id_editorial = e.id_editorial
            WHERE l.id_tipo = 1";
    $stmt = $conn->query($sql);
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

require_once("c://xampp/htdocs/login/view/head/header.php");
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
            max-width: 1500px;
            background-color: #2b2e38; /* Color de fondo gris claro */
            padding: 20px; /* Añadido padding para espaciar el contenido del contenedor */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #1f2029;
        }
        tr:hover {
            background-color: #f2f2f2;
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
</body>
</html>
