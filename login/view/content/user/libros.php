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
            max-width: 1050px;
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
            color: #ffeba7;
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
        .btn-solicitar-prestamo {
    background-color: #ffeba7; /* Color de fondo del botón */
    color: #1f2029; /* Color de las letras del botón */
    padding: 8px 12px; /* Añadido padding para el botón */
    border: none; /* Quita el borde del botón */
    border-radius: 4px; /* Borde redondeado para el botón */
    cursor: pointer; /* Cambia el cursor al pasar por encima del botón */
    float: right; /* Alinea el botón a la derecha */
    text-decoration: none; /* Elimina el subrayado del botón */
    margin-top: 10px; /* Espacio entre el botón y el título */
    font-size: 10px;
}

.btn-solicitar-prestamo:hover {
    background-color: #1f2029; /* Color de fondo del botón al pasar el mouse */
    color: #ffeba7; /* Color de las letras del botón al pasar el mouse */
}

    </style>
</head>
<body>
    <div class="container">
        <!-- Mensajes de alerta de Bootstrap -->
        <div id="alert-container"></div>
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
                    <td><button class="btn-solicitar-prestamo" onclick="solicitarPrestamo(<?= $libro['id_libro'] ?>)">Solicitar Préstamo</button></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="pagination-container">
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" class="<?php if ($i == $page) echo 'active'; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
    </div>
    <!-- Incluir JavaScript de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Función para mostrar alertas de Bootstrap
        function mostrarAlerta(tipo, mensaje) {
            const alertContainer = document.getElementById('alert-container');
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${tipo} alert-dismissible fade show`;
            alertDiv.role = 'alert';
            alertDiv.innerHTML = `
                ${mensaje}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            `;
            alertContainer.appendChild(alertDiv);
        }

        // Mostrar mensajes de éxito o error si existen en la URL
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                mostrarAlerta('success', urlParams.get('success'));
            }
            if (urlParams.has('error')) {
                mostrarAlerta('danger', urlParams.get('error'));
            }
        }

        function solicitarPrestamo(libroId) {
            if (confirm("¿Estás seguro de que deseas solicitar este préstamo?")) {
                window.location.href = `solicitar_prestamo.php?libro_id=${libroId}`;
            }
        }
    </script>
</body>
</html>