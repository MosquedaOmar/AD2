<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!empty($_SESSION['usuario'])) {
    header("Location: /login/view/home/panel_control.php");
    exit();
}
    require_once("c://xampp/htdocs/login/view/head/header.php");
?>
<style>
    /* Estilo específico para el cartel de bienvenida */
.container-welcome {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
}

.welcome-banner {
    text-align: center;
    background-color: #fff;
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.welcome-banner h1 {
    font-size: 20px;
    margin-bottom: 20px;
    color: #333;
}

.welcome-banner p {
    font-size: 12px;
    color: #666;
}
</style>
<body class="fondo">
<?php if(empty($_SESSION['usuario'])): ?>
    <div class="container-welcome">
        <div class="welcome-banner">
            <h1>Bienvenido a la Biblioteca UPCN Seccional Formosa</h1>
              <p>Estamos encantados de tenerte aquí. Disfruta de tu visita.</p>
              <p>¡Explora nuestro catálogo de libros y revistas para encontrar recursos educativos y de entretenimiento!</p>
              <p>Para poder ver los libros disponibles es necesario registrarse, Si ya tiene una cuenta solo inicia sesion </p>
        </div>
    </div>
    <?php endif; ?>
</body>

<?php
    require_once("c://xampp/htdocs/login/view/head/footer.php");
?>