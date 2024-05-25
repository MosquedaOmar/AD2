<?php
session_start();
// Verificar si el usuario está logueado y si el array $_SESSION está definido
if(isset($_SESSION['usuario'])) {
    // Verificar si el usuario es un administrador y redirigirlo si es necesario
    if(isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'admin') {
        header("Location: admin.php");
        exit(); // Asegurarse de que el script se detenga después de la redirección
    }

    // Si el usuario no es un administrador, mostrar la página normal
    require_once("c://xampp/htdocs/login/view/head/header.php");
    $usuario = $_SESSION['usuario'];
?>
    <h1 class="text-center mt-4">Bienvenido <?= $usuario ?></h1>
    <p class="text-center mt-4">Seleccione una opción del menú para ver el contenido.</p>
    <P class="text-center mt-4">Debe hacer click en la opción deseada y se despliega el contenido.</P>
<?php
    require_once("c://xampp/htdocs/login/view/head/footer.php");
} else {
    // Si el usuario no está logueado, redirigirlo a la página de login
    header("Location: login.php");
    exit(); // Asegurarse de que el script se detenga después de la redirección
}
?>
