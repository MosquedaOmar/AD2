<?php
    require_once("c://xampp/htdocs/login/controller/homeController.php");
    $obj = new homeController();

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $confirmarContraseña = $_POST['confirmarContraseña'];
    $error = "";

    if (empty($correo) || empty($contraseña) || empty($confirmarContraseña) || empty($nombre) || empty($apellido) || empty($dni) || empty($telefono) || empty($fechaNacimiento) || empty($usuario)) {
        $error .= "<li>Completa todos los campos</li>";
        header("Location:signup.php?error=");
    } else {
        if ($contraseña == $confirmarContraseña) {
            if ($obj->guardarUsuario($correo, $contraseña, $nombre, $apellido, $dni, $telefono, $fechaNacimiento, $usuario) == false) {
                $error .= "<li>El correo ya está registrado</li>";
                header("Location:signup.php?error=");
            } else {
                header("Location:login.php");
            }
        } else {
            $error .= "<li>Las contraseñas son diferentes</li>";
            header("Location:signup.php?error=");
        }
    }
?>
