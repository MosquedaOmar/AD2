<style>
            /* Reset de estilos */
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Segoe UI, Roboto, sans-serif;
            background-color: #f5f5f5; /* Color de fondo similar a Windows 11 */
        }

        nav {
            background-color: #ffffff; /* Color de fondo del navbar */
            color: #333333; /* Color del texto */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra similar a la de Windows 11 */
            border-radius: 15px; /* Redondear los bordes */
            width: 80%; /* Ancho del navbar */
            margin: 20px auto; /* Centrar el navbar */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 20px; /* Mayor separación entre elementos */
        }

        nav ul li:last-child {
            margin-right: 0;
        }

        nav ul li a {
            color: #333333; /* Color del texto */
            text-decoration: none;
            transition: background-color 0.3s; /* Transición suave del color de fondo */
            padding: 8px 15px; /* Añadir espaciado interno */
            border-radius: 15px; /* Redondear los bordes de los enlaces */
        }

        nav ul li a:hover {
            background-color: #f0f0f0; /* Color de fondo al pasar el mouse */
        }
</style>
<nav class="nav">
    <ul class="menu">
        <li><a href="Biblioteca.php">Inicio</a></li>
        <li><a href="lista_prestamo.php">Ver lista de prestamo</a></li>
        <li><a href="lista_devolucion.php">Ver lista de devolucion</a></li>
        <li><a href="Lista_libros.php">Ver lista de Libros y Revistas</a></li>
        <li><a href="ingresar_nuevo_libro.php">Ingresar nuevo libro</a></li>
        <li><a href="registrar_prestamo.php">Registro de prestamos</a></li>
        <li><a href="registrar_devolucion.php">Registro de devolucion</a></li>
        <li><a href="/init/view/home/login.php">Cerrar sesión</a></li>
        <!-- Puedes agregar más opciones aquí -->
    </ul>
</nav>