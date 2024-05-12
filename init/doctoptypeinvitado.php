<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style_list_libros.css">
    <link rel="stylesheet" type="text/css" href="style_list_devolucion.css">
    <link rel="stylesheet" type="text/css" href="style_list_prestamos.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Bibliotecadigital</title>
    <meta charset="UTF8">
    <style>

.edit-btn,
        .delete-btn {
            padding: 5px 10px;
            margin-left: 10px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
        }

th,
td {
    border-bottom: 1px solid #ccc; /* Agrega bordes inferiores */
    padding: 4px; /* Ajusta el espaciado interno */
    font-size: 12px;
    text-align: center;
}
th:not(:last-child),
td:not(:last-child) {
    border-right: 1px solid #ccc; /* Línea vertical para separar columnas, excepto en el último elemento */
}
/* Estilos para la sección de búsqueda */
.search {
    float: right;
    margin-right: 50px;
    margin-top: 20px;
}

.search input[type="text"],
.search input[type="submit"] {
    padding: 8px;
    font-size: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 5px;
}

.search input[type="submit"] {
    background-color: #4c7faf;
    color: #fff; /* Cambiado a blanco para el texto */
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 8px 15px;
    transition: background-color 0.3s ease; /* Agregado efecto de transición */
}

/* Estilo cuando el cursor está sobre el botón */
.search input[type="submit"]:hover {
    background-color: #2c4676;
}
.welcome-message {
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    margin: 20px auto;
    max-width: 1000px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.welcome-message h1 {
    color: #00355f;
    font-size: 50px;
    margin-bottom: 10px;
}

.welcome-message p {
    font-size: 15px;
    line-height: 1.5;
    color: #333;
}
/* Animación de latido */
@keyframes beat {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.welcome-message {
    /* Estilos anteriores... */
    animation: beat 2s infinite; /* Aplicar la animación */
}
    </style>
</head>
<body>



<!-- Cabecera de la página -->
<header style="position: relative;">
    <!-- Logo de la empresa con una anchura reducida -->
   
    <!-- Título y redes sociales -->
    
    <!-- Barra de búsqueda y cerrar sesión -->
    <div class="search" style="float: right; margin-right: 50px; margin-top: 20px;">
        <form action="busqueda.php" method="get">
            <input type="text" placeholder="Buscar...">
            <input type="submit" value="Buscar">
        </form>
    </div>
    
    <!-- Botón de Cerrar Sesión -->
    <div class="close" style="position: absolute; top: 100px; right: 20px; ">
       <a href="cerrar_sesion.php" class="custom-button" style="font-size: 13px; padding: 8px 15px; margin: 0;">Cerrar Sesión</a>
    </div>
</header>