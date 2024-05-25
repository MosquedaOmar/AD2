<?php
require_once("c://xampp/htdocs/login/controller/homeController.php");
session_start();
$obj = new homeController();
$admin_users = $obj->limpiarcadena($_POST['admin_user']);
$admin_passwords = $obj->limpiarcadena($_POST['admin_password']);
$bandera = $obj->verificarAdmin($admin_users, $admin_passwords);

if ($bandera) {
    $_SESSION['usuario'] = $admin_users;
    $_SESSION['tipo_usuario'] = 'admin'; // Añadimos esto para identificar al administrador
    header("Location:admin.php");
    exit();
} else {
    $error = "<li>Las claves son incorrectas</li>";
    header("Location:login.php?error=".$error);
    exit();
}
?>
