<?php if (session_status() == PHP_SESSION_NONE)
session_start();
if(empty($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != 'admin'){
    header("Location: ../../home/login.php");
    exit();
}
?>