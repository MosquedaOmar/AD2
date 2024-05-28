<?php
require_once 'c://xampp/htdocs/login/config/db.php'; // Incluye el archivo de la clase db

try {
    // Instanciamos la clase db
    $database = new db();
    
    // Conexión a la base de datos
    $conn = $database->conexion();

    // Consulta SQL para obtener todos los géneros distintos
    $sql = "SELECT DISTINCT nombre FROM genero";
    $stmt = $conn->query($sql);
    $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        h2 {
            color: #ffeba7; /* Color de las letras para el encabezado h2 */
            display: inline-block; /* Hace que el título y el botón estén en la misma línea */
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
        }
        .btn-ver-lista:hover {
            background-color: #1f2029; /* Color de fondo del botón al pasar el mouse */
            color: #ffeba7; /* Color de las letras del botón al pasar el mouse */
            text-decoration: none ;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php foreach ($generos as $genero): ?>
            <div>
                <h2><?= htmlspecialchars($genero['nombre']) ?></h2>
                <a href="/login/view/content/publicacionesInfo.php?genero=<?= urlencode($genero['nombre']) ?>" class="btn-ver-lista">Ver Lista Completa</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
