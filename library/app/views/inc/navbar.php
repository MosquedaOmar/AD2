<?php
// Iniciar la sesión si aún no se ha iniciado
session_start();
?>

<nav>
    <ul>
        <li><a href="/">Inicio</a></li>
        <?php if(isset($_SESSION['id']) && $_SESSION['tipo'] === 'administrador'): ?>
            <li><a href="/cargar-libro">Cargar Libro</a></li>
            <li><a href="/ver-solicitudes">Ver Solicitudes de Préstamos</a></li>
            <li><a href="/lista-prestamos">Lista de Préstamos</a></li>
            <li><a href="/lista-libros">Lista de Libros</a></li>
        <?php endif; ?>
        <?php if(isset($_SESSION['id']) && $_SESSION['tipo'] === 'invitado'): ?>
            <li><a href="/libros">Libros</a></li>
            <a href="#">Genero</a>
				<a href="#">Libros</a>
				<a href="#">Revistas</a>
        <?php endif; ?>
        <a href="http://localhost/library/dashboard/">Inicio</a>
        <li><a href="/logout">Cerrar Sesión</a></li>
    </ul>
</nav>
<style>
.contenedor {
    background-color: #333;
    padding: 10px;
}

nav {
    display: flex;
    justify-content: flex-end; /* Alinea los elementos al final del contenedor */
}

nav a {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
}

nav a.activo {
    background-color: #007bff;
}

nav a:hover {
    background-color: #555;
}

</style>
<div class="contenedor">
			
			<nav>
				<a href="http://localhost/library/dashboard/">Inicio</a>
				<a href="#">Genero</a>
				<a href="#">Libros</a>
				<a href="#">Revistas</a>
				<a href="http://localhost/library/login" class="activo">Iniciar sesion</a>
			</nav>
		</div>
	</header>