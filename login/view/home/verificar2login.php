<?php
    require_once("c://xampp/htdocs/login/controller/homeController.php");
    session_start();
    $obj = new homeController();

    // Verificar qué formulario se envió
    if(isset($_POST['correo']) && isset($_POST['contraseña'])) {
        // Formulario de invitado
        $correo = $obj->limpiarcorreo($_POST['correo']);
        $contraseña = $obj->limpiarcadena($_POST['contraseña']);
        $bandera = $obj->verificarusuario($correo, $contraseña);
        
        if($bandera) {
            $_SESSION['usuario'] = $correo;
            header("Location: panel_control.php");
        } else {
            $error = "<li>Las claves son incorrectas</li>";
            header("Location: login.php?error=".$error);
        }
    } elseif(isset($_POST['admin_user']) && isset($_POST['admin_password'])) {
        // Formulario de administrador
        $admin_user = $obj->limpiarcorreo($_POST['admin_user']);
        $admin_password = $obj->limpiarcadena($_POST['admin_password']);
        $bandera_admin = $obj->verificarusuario($admin_user, $admin_password); // Suponiendo que tengas una función diferente para verificar administradores
        
        if($bandera_admin) {
            $_SESSION['admin_usuario'] = $admin_user; // Usar una clave diferente para la sesión del administrador si es necesario
            header("Location: panel_control_admin.php");
        } else {
            $error = "<li>Las claves de administrador son incorrectas</li>";
            header("Location: login.php?error=".$error);
        }
    } else {
        // Manejar cualquier otro caso, como si no se envió ningún formulario válido
        echo "Error: formulario no válido";
    }
?>