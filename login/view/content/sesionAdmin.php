<?php
session_start();
if(empty($_SESSION['usuario']) || $_SESSION['tipo_usuario'] != 'admin'){
    header("Location:login.php");
    exit();
}
?>