<?php
require_once ('c://xampp/htdocs/login/view/content/sesionAdmin.php');
require_once ('c://xampp/htdocs/login/config/db.php'); // Incluye el archivo de la clase db

try {
    // Instanciamos la clase db
    $database = new db();
    
    // Conexión a la base de datos
    $conn = $database->conexion();

    // Paginación
    $results_per_page = 10; // Número de usuarios por página
    $sql = "SELECT COUNT(*) AS total FROM usuarios"; // Contar total de usuarios
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

    // Consulta SQL para obtener los usuarios por página
    $sql = "SELECT u.*, a.Estado_Afiliacion FROM usuarios u 
            LEFT JOIN Afiliados a ON u.id = a.id 
            LIMIT $start_limit, $results_per_page";
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
            font-size: 18px;
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
    <script>
        function searchUsuarios() {
            var input = document.getElementById('searchInput');
            var filter = input.value.toLowerCase();
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('usuariosTable').innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "buscar_usuarios.php?q=" + filter, true);
            xhttp.send();
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Lista de Usuarios</h2>
            <div class="search-bar">
                <input type="text" id="searchInput" onkeyup="searchUsuarios()" placeholder="Buscar usuarios...">
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Telefono</th>
                    <th>Nombre de Usuario</th>
                    <th>Estado de Afiliado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="usuariosTable">
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['correo'] ?></td>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= $usuario['apellido'] ?></td>
                        <td><?= $usuario['dni'] ?></td>
                        <td><?= $usuario['fecha_nacimiento'] ?></td>
                        <td><?= $usuario['telefono'] ?></td>
                        <td><?= $usuario['usuario'] ?></td>
                        <td><?= $usuario['Estado_Afiliacion'] ?></td>
                        <td>
                            <form action="/login/view/home/afiliado.php" method="post">
                                <input type="hidden" name="id_usuario" value="<?= $usuario['id'] ?>">
                                <select name="estado_afiliacion">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                                <button type="submit">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
