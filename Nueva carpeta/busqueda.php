<?php

include 'coneccionBD.php';

if (!$scon) {
    die("Conexión fallida: " .mysqli_connect_error());
}

// Procesar la búsqueda
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Consulta SQL para buscar libros y revistas
    $query = "SELECT * FROM Libros2 WHERE Titulo LIKE '%$search%'
            UNION
            SELECT * FROM Revistas WHERE Titulo LIKE '%$search%'";

    $result = mysqli_query($scon,$query);
    $num = mysqli_num_rows($result);

    if ($result->num_rows > 0) {
        // Mostrar resultados
        while ($row = $result->fetch_assoc()) {
            echo "Título: " . $row["Titulo"] . "<br>";
            // Mostrar otros campos relevantes aquí
        }
    } else {
        echo "No se encontraron resultados.";
    }

    $scon->close();
}
?>
