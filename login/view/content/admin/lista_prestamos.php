<?php
// Establece la conexión a la base de datos
require_once('c://xampp/htdocs/login/config/db.php');

$database = new db();
$conn = $database->conexion();

try {
    // Consulta los datos de la tabla prestamos con los nombres de usuario y los títulos de los libros
    $sql = "SELECT prestamos.*, usuarios.usuario AS nombre_usuario, libros.titulo AS titulo_libro
            FROM prestamos
            INNER JOIN usuarios ON prestamos.id_usuario = usuarios.id
            INNER JOIN libros ON prestamos.id_libro = libros.id_libro";

    // Ejecuta la consulta
    $stmt = $conn->query($sql);
    $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    // En caso de error, asegúrate de que $prestamos esté definido
    $prestamos = array();
}

require_once("c://xampp/htdocs/login/view/head/headerAdmin.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Préstamos</title>
    <style>
        /* Estilos CSS para la lista de préstamos */
        .container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 1000px;
            background-color: #f2f2f2;
            padding: 20px;
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
            border-right: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            border-right: 1px solid #ddd;
        }
        th:last-child, td:last-child {
            border-right: none;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        h2 {
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Lista de Préstamos</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre Usuario</th>
                <th>Título del Libro</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Estado</th>
                <th>Tiempo para devolucion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prestamos as $prestamo): ?>
                <tr>
                    <td><?= $prestamo['nombre_usuario'] ?></td>
                    <td><?= $prestamo['titulo_libro'] ?></td>
                    <td><?= $prestamo['fecha_prestamo'] ?></td>
                    <td><?= $prestamo['fecha_devolucion'] ?></td>
                    <td id="estado_<?= $prestamo['id_prestamo'] ?>"><?= $prestamo['estado'] ?></td>
                    <td id="cuenta_regresiva_<?= $prestamo['id_prestamo'] ?>"></div></td>
                    <td>
                        <!-- Botón para detener la cuenta regresiva -->
                        <button onclick="detenerCuenta(<?= $prestamo['id_prestamo'] ?>)">Detener Cuenta</button>
                        <!-- Div para mostrar la cuenta regresiva -->
                        <div id="cuenta_regresiva_<?= $prestamo['id_prestamo'] ?>"></div>
                    </td>
                </tr>
                <script>
                    // Función para iniciar la cuenta regresiva para cada préstamo
                    function iniciarCuentaRegresiva_<?= $prestamo['id_prestamo'] ?>() {
                        var tiempoRestante_<?= $prestamo['id_prestamo'] ?> = 345600; // 96 horas en segundos

                        // Inicia la cuenta regresiva
                        var cuentaRegresiva_<?= $prestamo['id_prestamo'] ?> = setInterval(function() {
                            tiempoRestante_<?= $prestamo['id_prestamo'] ?>--;
                            var horas = Math.floor(tiempoRestante_<?= $prestamo['id_prestamo'] ?> / 3600);
                            var minutos = Math.floor((tiempoRestante_<?= $prestamo['id_prestamo'] ?> % 3600) / 60);
                            var segundos = tiempoRestante_<?= $prestamo['id_prestamo'] ?> % 60;

                            // Muestra el tiempo restante en la página
                            document.getElementById('cuenta_regresiva_<?= $prestamo['id_prestamo'] ?>').textContent = horas + ':' + minutos + ':' + segundos;

                            // Si se detiene el tiempo, actualiza el estado a "devuelto" y detiene la cuenta regresiva
                            if (tiempoRestante_<?= $prestamo['id_prestamo'] ?> <= 0) {
                                clearInterval(cuentaRegresiva_<?= $prestamo['id_prestamo'] ?>);
                                document.getElementById('estado_<?= $prestamo['id_prestamo'] ?>').textContent = 'devuelto';
                                
                                // Envía una solicitud al servidor para actualizar la fecha de devolución y el estado en la base de datos
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        // Respuesta del servidor
                                        console.log(this.responseText);
                                    }
                                };
                                xhttp.open("GET", "actualizar_prestamo.php?id=<?= $prestamo['id_prestamo'] ?>&estado=devuelto", true);
                                xhttp.send();
                            }
                        }, 1000);
                    }

                    // Llama a la función para iniciar la cuenta regresiva para cada préstamo
                    iniciarCuentaRegresiva_<?= $prestamo['id_prestamo'] ?>();
                </script>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
