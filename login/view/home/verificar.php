<?php
    require_once("c://xampp/htdocs/login/controller/homeController.php");
    session_start();
    $obj = new homeController();
    $usuario = $obj->limpiarcadena($_POST['user']);
    $contraseña = $obj->limpiarcadena($_POST['contraseña']);
    $bandera = $obj->verificarusuario($usuario,$contraseña);
    if($bandera){
        $_SESSION['usuario'] = $usuario;
        header("Location:panel_control");
    }else{
        $error = "<li>Las claves son incorrectas</li>";
        header("Location:login.php?error=".$error);
    }
?>