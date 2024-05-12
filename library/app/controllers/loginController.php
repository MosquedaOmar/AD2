<?php

namespace app\controllers;
use app\models\mainModel;

class loginController {

	

	public function iniciarSesionAdministradorControlador() {
		if(isset($_POST['submit_admin'])) {
			// Obtener los datos del formulario y limpiarlos
			$usuario = $this->limpiarCadena($_POST['admin_user']);
			$clave = $this->limpiarCadena($_POST['admin_password']);
	
			// Consultar la base de datos para verificar el administrador
			$stmt = $this->conectar()->prepare("SELECT * FROM administradores WHERE usuario = ?");
			$stmt->execute([$usuario]);
			$admin = $stmt->fetch();
	
			if($admin && password_verify($clave, $admin['contraseña'])) {
				// Iniciar sesión para el administrador
				$_SESSION['id'] = $admin['id'];
				$_SESSION['nombre'] = $admin['nombre'];
				// Más datos si los necesitas
	
				header("Location: dashboard");
				exit();
			} else {
				// Usuario o contraseña incorrectos para el administrador
				// Puedes manejar el error de forma adecuada aquí
			}
		}
	}
	
	public function iniciarSesionInvitadoControlador() {
		if(isset($_POST['submit_login'])) {
			// Obtener los datos del formulario y limpiarlos
			$usuario = $this->limpiarCadena($_POST['user']);
			$clave = $this->limpiarCadena($_POST['password']);
	
			// Consultar la base de datos para verificar el invitado
			$stmt = $this->conectar()->prepare("SELECT * FROM invitados WHERE nombre_usuario = ?");
			$stmt->execute([$usuario]);
			$invitado = $stmt->fetch();
	
			if($invitado && password_verify($clave, $invitado['contraseña_usuario'])) {
				// Iniciar sesión para el invitado
				$_SESSION['id'] = $invitado['id'];
				$_SESSION['nombre'] = $invitado['nombre_usuario'];
				// Más datos si los necesitas
	
				header("Location: dashboard");
				exit();
			} else {
				// Usuario o contraseña incorrectos para el invitado
				// Puedes manejar el error de forma adecuada aquí
			}
		}
	}
	
	// Función para limpiar cadenas y prevenir la inyección SQL
	public function limpiarCadena($cadena) {
		$cadena = trim($cadena); // Eliminar espacios en blanco al principio y al final
		$cadena = stripslashes($cadena); // Eliminar barras invertidas añadidas por la función addslashes()
		$cadena = htmlspecialchars($cadena); // Convertir caracteres especiales en entidades HTML
		return $cadena;
	}
	
	

    /*----------  Controlador cerrar sesion  ----------*/
    public function cerrarSesionControlador(){

        session_destroy();

        // Redireccionar a la página de inicio de sesión después de cerrar sesión
        if(!headers_sent()){
            header("Location: ".APP_URL."login/");
            exit();
        } else {
            echo "<script> window.location.href='".APP_URL."login/'; </script>";
            exit();
        }
    }

}
