<?php
require_once ('c://xampp/htdocs/login/view/content/sesionAdmin.php');
require_once("c://xampp/htdocs/login/view/head/headerAdmin.php");

// Incluir el archivo de conexión a la base de datos
require_once ('c://xampp/htdocs/login/config/db.php');

// Crear una instancia de la clase db para obtener la conexión PDO
$db = new db();
$conexion = $db->conexion();

// Verificar la conexión a la base de datos
if ($conexion instanceof PDO) {
    // Consulta SQL para obtener autores
    $sql_autores = "SELECT id_autor, nombre FROM autor";
    $result_autores = $conexion->query($sql_autores);

    // Consulta SQL para obtener géneros
    $sql_generos = "SELECT id_genero, nombre FROM genero";
    $result_generos = $conexion->query($sql_generos);

    // Consulta SQL para obtener editoriales
    $sql_editoriales = "SELECT id_editorial, nombre FROM editorial";
    $result_editoriales = $conexion->query($sql_editoriales);
} else {
    // Si la conexión no está establecida, muestra un mensaje de error
    echo "Error: No se pudo conectar a la base de datos.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Carga de Libros</title>
    <style>
        /* Estilos CSS para el formulario */
        .container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 450px;
            background-color: #f2f2f2; /* Color de fondo gris claro */
            padding: 20px; /* Añadido padding para espaciar el contenido del contenedor */
        }

        /* Estilos para el título del formulario */
        .container h2 {
            font-size: 14px; /* Aumentar el tamaño del título */
            margin-bottom: 20px; /* Añadir espacio inferior al título */
        }

        /* Estilos para los campos de entrada */
        .container input[type="text"],
        .container input[type="number"],
        .container select {
            width: 100%; /* Ajustar el ancho de los campos al 100% del contenedor */
            padding: 10px; /* Aumentar el padding para mejorar la apariencia */
            margin-bottom: 15px; /* Añadir espacio inferior a los campos */
            font-size: 12px; /* Tamaño de fuente para los campos de entrada */
            border-radius: 5px; /* Añadir bordes redondeados a los campos */
            border: 1px solid #ddd; /* Añadir borde para los campos */
            box-sizing: border-box; /* Incluir el padding y borde en el ancho del campo */
        }

        /* Estilos para el botón de guardar */
        .container input[type="submit"] {
            background-color: #4CAF50; /* Color de fondo verde */
            color: white; /* Color de texto blanco */
            padding: 10px 20px; /* Aumentar el padding para hacer más grande el botón */
            font-size: 12px; /* Aumentar el tamaño de la fuente del botón */
            border: none; /* Eliminar el borde del botón */
            border-radius: 5px; /* Añadir bordes redondeados al botón */
            cursor: pointer; /* Cambiar el cursor al pasar sobre el botón */
            text-align: center;
        }

        /* Estilos para el botón de guardar al pasar el cursor */
        .container input[type="submit"]:hover {
            background-color: #45a049; /* Cambiar el color de fondo al pasar el cursor */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h2>Formulario de Carga de Libros</h2>
        <form action="procesar_formulario.php" method="POST">
            <input type="text" id="titulo" name="titulo" placeholder="Titulo" required><br>
            <input type="number" id="cantidad" name="cantidad" placeholder="Cantidad" required><br>
            <label for="tipo" style="font-size: 12px;">Tipo:</label><br>
            <select id="tipo" name="tipo" required>
                <option value="1">Libro</option>
                <option value="2">Revista</option>
            </select><br>
            <input type="text" id="isbn" name="isbn" placeholder="Ingrese ISBN (opcional)"><br>
            <select type="text" id="genero" name="genero" placeholder="Genero" required>
                <?php
                // Conexión a la base de datos
                require_once("c://xampp/htdocs/login/config/db.php");
                $db = new db();
                $conexion = $db->conexion();
                // Consulta SQL para obtener géneros
                $sql_generos = "SELECT id_genero, genero FROM genero";
                $result_generos = $conexion->query($sql_generos);
                // Iterar sobre los resultados y mostrar opciones
                while ($row = $result_generos->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['id_genero'] . "'>" . $row['nombre'] . "</option>";
                }
                ?>
            </select><br>
            <select type="text" id="autor" name="autor" placeholder="Autor" required>
                <?php
                // Consulta SQL para obtener autores
                $sql_autores = "SELECT id_autor, nombre FROM autor";
                $result_autores = $conexion->query($sql_autores);
                // Iterar sobre los resultados y mostrar opciones
                while ($row = $result_autores->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['id_autor'] . "'>" . $row['nombre'] . "</option>";
                }
                ?>
            </select><br>
            <select type="text" id="editorial" name="editorial" placeholder="Editorial" required>
                <?php
                // Consulta SQL para obtener editoriales
                $sql_editoriales = "SELECT id_editorial, nombre FROM editorial";
                $result_editoriales = $conexion->query($sql_editoriales);
                // Iterar sobre los resultados y mostrar opciones
                while ($row = $result_editoriales->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['id_editorial'] . "'>" . $row['nombre'] . "</option>";
                }
                ?>
            </select><br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
