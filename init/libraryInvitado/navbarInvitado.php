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
            margin-right: 80px; /* Mayor separación entre elementos */
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
        .submenu {
        display: none; /* Ocultar submenús por defecto */
        position: absolute; /* Posición absoluta para colocarlos correctamente */
        background-color: #ffffff; /* Color de fondo */
        border-radius: 0 0 15px 15px; /* Redondear bordes inferiores */
        padding: 10px; /* Espaciado interno */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra similar a la de Windows 11 */
    }

    /* Estilo para los elementos del submenú */
    .submenu li {
        margin: 5px 0; /* Espaciado entre elementos */
    }

    /* Estilo para los enlaces del submenú */
    .submenu a {
        color: #333333; /* Color del texto */
        text-decoration: none;
    }

    /* Estilo para los enlaces del submenú al pasar el mouse */
    .submenu a:hover {
        color: #000000; /* Cambiar color al pasar el mouse */
    }
    
</style>

<script>
    // Script para mostrar/ocultar submenús al pasar el mouse
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener todos los elementos principales del menú
        const items = document.querySelectorAll(".menu > li");

        // Iterar sobre cada elemento principal
        items.forEach(item => {
            // Agregar evento de mouseover para mostrar el submenú
            item.addEventListener("mouseover", function() {
                const submenu = this.querySelector(".submenu");
                if (submenu) {
                    submenu.style.display = "block"; // Mostrar el submenú
                }
            });

            // Agregar evento de mouseout para ocultar el submenú
            item.addEventListener("mouseout", function() {
                const submenu = this.querySelector(".submenu");
                if (submenu) {
                    submenu.style.display = "none"; // Ocultar el submenú
                }
            });
        });
    });
</script>

<nav class="nav">
    <ul class="menu">
        <li><a href="invitadobiblioteca.php">Inicio</a></li>
        <li>
            <a href="#">Libros</a>
            <ul class="submenu">
                <li><a href="#">Ficción</a></li>
                <li><a href="#">No ficción</a></li>
                <li><a href="#">Literatura clásica</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Revistas</a>
            <ul class="submenu">
                <li><a href="#">Tecnología</a></li>
                <li><a href="#">Moda</a></li>
                <li><a href="#">Cocina</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Géneros</a>
            <ul class="submenu">
                <li><a href="#">Novela</a></li>
                <li><a href="#">Poesía</a></li>
                <li><a href="#">Drama</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Autores</a>
            <ul class="submenu">
                <li><a href="#">William Shakespeare</a></li>
                <li><a href="#">Jane Austen</a></li>
                <li><a href="#">Gabriel García Márquez</a></li>
            </ul>
        </li>
        <li><a href="#">Contacto</a></li>
        <a href="/init/view/home/login.php">Cerrar sesión</a>
    </ul>
</nav>
