<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "login";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];
$isbn = $_POST['isbn'];
$genero = $_POST['genero'];
$autor = $_POST['autor'];
$editorial = $_POST['editorial'];
$cantidad = $_POST['cantidad'];

// Insertar datos en la base de datos
$sql = "INSERT INTO libros (titulo, cantidad, id_tipo, isbn, id_genero, id_autor, id_editorial)
        VALUES ('$titulo', $cantidad, (SELECT id_tipo FROM tipo WHERE nombre = '$tipo'), '$isbn',
        (SELECT id_genero FROM genero WHERE nombre = '$genero'),
        (SELECT id_autor FROM autor WHERE nombre = '$autor'),
        (SELECT id_editorial FROM editorial WHERE nombre = '$editorial'))";

if ($conn->query($sql) === TRUE) {
    echo "Libro/Revista cargado correctamente";
} else {
    echo "Error: " . $sql . "<
