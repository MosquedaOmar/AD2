<?php
require_once ('c://xampp/htdocs/login/config/db.php'); // Incluye el archivo de la clase db

try {
    // Instanciamos la clase db
    $database = new db();
    
    // Conexión a la base de datos
    $conn = $database->conexion();

    // Verificar si la sesión está iniciada y obtener el correo electrónico del usuario
    session_start();
    if (!isset($_SESSION['usuario'])) {
        // Redirigir al usuario a la página de inicio de sesión si no está autenticado
        header("Location: login.php");
        exit;
    }
    $correo_usuario = $_SESSION['usuario'];

    // Consulta SQL para obtener los datos del usuario actual
    $sql = "SELECT * FROM usuarios WHERE correo = :correo";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':correo', $correo_usuario);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <title>Datos del Usuario</title>
    <style>
        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #2b2e38;
            color: #fff;
        }
        .container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #ffeba7; /* Cambiar color del texto del h2 */
            font-size: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            font-size: 12px;
            text-align: left;
            color: #ffeba7;
        }
        th {
            background-color: #2b2e38;
        }
        .edit-input {
            display: none;
        }
        .edit-btn {
            display: block;
            margin-bottom: 20px;
            padding: 10px 20px;
            font-size: 12px;
            background-color: #ffeba7;
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 auto;
        }
        .edit-btn:hover {
            background-color: #000;
            color: #ffeba7;
        }
        .save-btn, .cancel-btn {
            display: none;
            margin-bottom: 20px;
            padding: 10px 20px;
            font-size: 12px;
            background-color: #ffeba7;
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 auto;
        }
        .save-btn:hover, .cancel-btn:hover {
            background-color: #000;
            color: #ffeba7;
        }
    </style>
    <script>
        function toggleEdit() {
            var editFields = document.getElementsByClassName("edit-input");
            var viewFields = document.getElementsByClassName("view-field");
            var editBtn = document.getElementById("editBtn");
            var saveBtn = document.getElementById("saveBtn");
            var cancelBtn = document.getElementById("cancelBtn");

            if (editBtn.style.display === "none") {
                // Ocultar campos de edición y mostrar campos de vista
                for (var i = 0; i < editFields.length; i++) {
                    editFields[i].style.display = "none";
                }
                for (var i = 0; i < viewFields.length; i++) {
                    viewFields[i].style.display = "block";
                }
                // Mostrar botón de editar y ocultar botones de guardar y cancelar
                editBtn.style.display = "block";
                saveBtn.style.display = "none";
                cancelBtn.style.display = "none";
            } else {
                // Mostrar campos de edición y ocultar campos de vista
                for (var i = 0; i < editFields.length; i++) {
                    editFields[i].style.display = "block";
                }
                for (var i = 0; i < viewFields.length; i++) {
                    viewFields[i].style.display = "none";
                }
                // Ocultar botón de editar y mostrar botones de guardar y cancelar
                editBtn.style.display = "none";
                saveBtn.style.display = "block";
                cancelBtn.style.display = "block";
            }
        }
    </script>
</head>
<body>
<div class="container">
        <h2>Datos del Usuario</h2>
        <form id="editForm" action="actualizarUsuario.php" method="post">
            <table>
                <tr>
                    <th>Nombre</th>
                    <td>
                        <span class="view-field"><?= $usuario['nombre'] ?></span>
                        <input type="text" name="nombre" class="edit-input" value="<?= $usuario['nombre'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Apellido</th>
                    <td>
                        <span class="view-field"><?= $usuario['apellido'] ?></span>
                        <input type="text" name="apellido" class="edit-input" value="<?= $usuario['apellido'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>DNI</th>
                    <td>
                        <span class="view-field"><?= $usuario['dni'] ?></span>
                        <input type="text" name="dni" class="edit-input" value="<?= $usuario['dni'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Fecha de Nacimiento</th>
                    <td>
                        <span class="view-field"><?= $usuario['fecha_nacimiento'] ?></span>
                        <input type="date" name="fecha_nacimiento" class="edit-input" value="<?= $usuario['fecha_nacimiento'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Teléfono</th>
                    <td>
                        <span class="view-field"><?= $usuario['telefono'] ?></span>
                        <input type="text" name="telefono" class="edit-input" value="<?= $usuario['telefono'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Nombre de Usuario</th>
                    <td>
                        <span class="view-field"><?= $usuario['usuario'] ?></span>
                        <input type="text" name="usuario" class="edit-input" value="<?= $usuario['usuario'] ?>">
                    </td>
                </tr>
            </table>
            <br>
            <button id="editBtn" type="button" class="edit-btn" onclick="toggleEdit()">Editar</button>
            <button id="saveBtn" type="submit" class="save-btn">Guardar Cambios</button>
            <br>
            <button id="cancelBtn" type="button" class="cancel-btn" onclick="toggleEdit()">Cancelar</button>
        </form>
    </div>
</body>
</html>
