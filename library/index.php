<?php
// Incluye el archivo de configuración de la aplicación
require_once "./config/app.php";

// Incluye el archivo de autoloading para cargar las clases automáticamente
require_once "./autoload.php";

// Incluye el archivo que inicia la sesión
require_once "./app/views/inc/session_start.php";

// Verifica si se ha proporcionado un parámetro 'views' en la URL
if(isset($_GET['views'])){
    // Si existe, toma el valor directamente
    $vista = $_GET['views'];
}else{
    // Si no existe, establece la URL predeterminada como "dashboard"
    $vista = "login";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php
    // Incluye el archivo de cabecera HTML
    require_once "./app/views/inc/head.php";
  ?>
</head>
<body>

<?php
// Importa el controlador de vistas
use app\controllers\viewsController;

// Crea una instancia del controlador de vistas
$viewsController = new viewsController();
    
// Obtiene la vista correspondiente según la URL proporcionada
$vista = $viewsController->obtenerVistasControlador($vista);

// Verifica si la vista es "login" o "404" o "register"
if($vista == "login" || $vista == "404" || $vista == "register"){
    // Si es "login" o "404" o "register", incluye la vista correspondiente
    require_once "./app/views/content/".$vista."-view.php";
}else{
    // Si no es "login" ni "404", incluye la barra de navegación y la vista obtenida
    require_once $vista;
}

// Incluye el archivo de scripts JavaScript
require_once "./app/views/inc/script.php";
?>

</body>
</html>
