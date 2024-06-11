<?php
session_start();
require_once('c://xampp/htdocs/login/view/content/sesionVerifique.php');
require_once('c://xampp/htdocs/login/config/db.php');
require_once("c://xampp/htdocs/login/view/head/header.php");

try {
    // Obtener el ID del usuario desde la sesión
    $usuario_nombre = $_SESSION['usuario']; // Cambiar a tu variable de sesión correspondiente

    // Consultar la base de datos para obtener el ID del usuario
    $database = new db();
    $conn = $database->conexion();
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ?");
    $stmt->bindParam(1, $usuario_nombre, PDO::PARAM_STR);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    $usuario_id = $resultado['id'];

    // Consultar las solicitudes de préstamo del usuario
    $stmt = $conn->prepare("SELECT sp.id_solicitud, sp.id_libro, sp.estado, sp.fecha_solicitud, sp.fecha_aceptacion, l.titulo
                            FROM solicitud_prestamo sp
                            INNER JOIN libros l ON sp.id_libro = l.id_libro
                            WHERE sp.id_usuario = ?");
    $stmt->bindParam(1, $usuario_id, PDO::PARAM_INT);
    $stmt->execute();
    $solicitudes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de Préstamo</title>
    <style>
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
            color: #ffeba7;
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
    <h2>Solicitudes de Préstamo</h2>
    <table>
        <tr>
            <th>Libro</th>
            <th>Fecha de solicitud </th>
            <th>Fecha Respuesta</th>
            
            <th>Mensaje</th>
            <th>Estado</th>
        </tr>
        <?php foreach ($solicitudes as $solicitud): ?>
            <tr class="solicitud-<?= $solicitud['id_solicitud'] ?>">
                <td><?= $solicitud['titulo'] ?></td>
                <td><?= $solicitud['fecha_solicitud'] ?></td>
                <td><?= $solicitud['fecha_aceptacion'] ?></td>
                
                <td id="mensaje-<?= $solicitud['id_solicitud'] ?>"></td>
                <td><?= $solicitud['estado'] ?></td>
                <script>
                    var estado = "<?= $solicitud['estado'] ?>";
                    if (estado == "aceptada") {
                        document.getElementById('mensaje-<?= $solicitud['id_solicitud'] ?>').textContent = "El administrador se comunicará con usted mediante tel y/o correo.";
                        clearInterval(intervalo<?= $solicitud['id_solicitud'] ?>);
                    } else if (estado == "rechazada") {
                        document.getElementById('mensaje-<?= $solicitud['id_solicitud'] ?>').textContent = "Perdone, pero hubo un inconveniente. Puede volver a solicitarlo dentro de las 48 horas.";
                        clearInterval(intervalo<?= $solicitud['id_solicitud'] ?>);
                    } else {
                        var fechaSolicitud<?= $solicitud['id_solicitud'] ?> = new Date('<?= $solicitud['fecha_solicitud'] ?>');
                        var cuentaRegresivaElement<?= $solicitud['id_solicitud'] ?> = document.getElementById('mensaje-<?= $solicitud['id_solicitud'] ?>');
                        var intervalo<?= $solicitud['id_solicitud'] ?>;
                        intervalo<?= $solicitud['id_solicitud'] ?> = setInterval(actualizarCuentaRegresiva<?= $solicitud['id_solicitud'] ?>, 1000);
                    }

                    function actualizarCuentaRegresiva<?= $solicitud['id_solicitud'] ?>() {
                        var ahora = new Date();
                        var diferencia = (fechaSolicitud<?= $solicitud['id_solicitud'] ?>.getTime() + (48 * 3600 * 1000)) - ahora.getTime();

                        if (diferencia <= 0) {
                            cuentaRegresivaElement<?= $solicitud['id_solicitud'] ?>.textContent = "Se terminó el tiempo. Debes volver a solicitar el libro.";
                            clearInterval(intervalo<?= $solicitud['id_solicitud'] ?>); // Detener el intervalo
                        } else {
                            var horas = Math.floor(diferencia / (3600 * 1000));
                            var minutos = Math.floor((diferencia % (3600 * 1000)) / (60 * 1000));
                            var segundos = Math.floor((diferencia % (60 * 1000)) / 1000);
                            cuentaRegresivaElement<?= $solicitud['id_solicitud'] ?>.textContent = horas + " horas, " + minutos + " minutos, " + segundos + " segundos";
                        }
                    }
                </script>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
