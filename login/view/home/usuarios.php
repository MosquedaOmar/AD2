<?php
require_once 'c://xampp/htdocs/login/config/db.php'; // Incluye el archivo de la clase db

try {
    // Instanciamos la clase db
    $database = new db();
    
    // Conexión a la base de datos
    $conn = $database->conexion();

    // Consulta SQL para obtener todos los usuarios
    $sql = "SELECT * FROM usuarios";
    $stmt = $conn->query($sql);
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

require_once("c://xampp/htdocs/login/view/head/headerAdmin.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        /* Estilos CSS para la lista de usuarios */
        .container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
            background-color: #f2f2f2; /* Color de fondo gris claro */
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
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lista de Usuarios</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Correo</th>
                <th>Password</th>
            </tr>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['correo'] ?></td>
                    <td><?= $usuario['password'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>

