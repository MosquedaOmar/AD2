<?php

session_start();

// Verificar si el usuario ha iniciado sesión de manera segura
if (!isset($_SESSION["s_usuario"])) {
    // Si no ha iniciado sesión, redirigir al inicio de sesión
    header("Location: ./init/view/home/login.php");
    exit();
}

 include 'doctoptype.php';

 include 'nav.php' ; ?>

<style>
body {
    background-image: url("/init/fondo.jpeg");
}
</style>
<div class="welcome-message">
    <h1>Bienvenido Administrador</h1>
    <p>¡Explora nuestro catálogo de libros y revistas para encontrar recursos educativos y de entretenimiento!</p>
    <p>Puedes hacer la busqueda manual ingresando a ver lista de libros y revistas</p>
</div>

<script>
function mostrarSeccion(idSeccion) {
    // Ocultar todas las secciones
    var secciones = document.getElementsByClassName('seccion');
    for (var i = 0; i < secciones.length; i++) {
        secciones[i].style.display = 'none';
    }

    // Mostrar la sección deseada
    var seccionMostrar = document.getElementById(idSeccion);
    if (seccionMostrar) {
        seccionMostrar.style.display = 'block';
    }
}
</script>

</body>
</html>
