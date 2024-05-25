<?php
session_start();
if(empty($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != 'admin'){
    header("Location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
body {
    background-image: url("/login/fondo.jpeg");  
    background-size: 100% auto; /* Estira la imagen horizontalmente para cubrir el ancho */
    background-repeat: no-repeat; /* Evita la repetición de la imagen */
    background-position: top left; /* Muestra la imagen desde la parte superior izquierda */
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}


        header {
            background-color: #f2f2f2;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding-top: 0px; /* Ajuste: separación superior */
            margin-bottom: 20px; /* Ajuste: separación entre header y main */
        }

        .navbar {
            display: flex;
            justify-content: center; /* Centrar horizontalmente las opciones */
            align-items: center;
            padding: 10px 20px;
            border-radius: 10px; /* Ajuste: redondear los bordes */
            background-color: #f2f2f2; /* Ajuste: color de fondo */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-links {
            flex-grow: 1; /* Permite que el div se expanda para que los elementos se centren */
            display: flex;
            justify-content: center; /* Centrar horizontalmente las opciones */
        }

        .navbar-links a {
            color: #333;
            text-decoration: none;
            margin-right: 60px; /* Ajuste: espacio entre las opciones de navegación */
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            z-index: 1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .boton {
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .boton:hover {
            background-color: #cccccc; /* Gris claro */
            color: white;
        }

        .navbar-user {
    display: flex;
    align-items: center;
    margin-right: 20px; /* Separación del borde derecho */
    margin-top: 10px; /* Ajuste: separación superior */
}

.navbar-user span {
    margin-right: 10px; /* Ajuste: separación entre texto y icono de usuario */
}

.navbar-user i {
    color: #333;
    font-size: 24px;
    margin-right: 10px; /* Separación del borde derecho */
}

        .navbar-user .dropdown {
            position: relative;
        }

        .navbar-user .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            z-index: 1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            right: 0; /* Alinea el menú desplegable a la derecha */
        }

        .navbar-user .dropdown-toggle {
            cursor: pointer;
        }

        .navbar-user .dropdown:hover .dropdown-content {
            display: block;
        }

    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-links">
                <a href="#">Inicio</a>
                <div class="dropdown">
                    <a href="#" class="dropbtn">Cargar <i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="#">Libros</a>
                        <a href="#">Revistas</a>
                    </div>
                </div>
                <a href="#">Usuarios registrados</a>
                <a href="#">Lista de préstamos</a>
                <a href="#">Lista de devoluciones</a>
            </div>
            <div class="navbar-user">
                <span>Bienvenido Administrador <?= $_SESSION['usuario']?></span>
                <div class="dropdown">
                    <i class="fas fa-user-circle dropdown-toggle"></i>
                    <div class="dropdown-content">
                        <a href="#" class="boton">Datos de la cuenta</a>
                        <a href="/login/view/home/logout" class="boton">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <!-- Aquí va el contenido exclusivo para administradores -->
    </main>
</body>
</html>