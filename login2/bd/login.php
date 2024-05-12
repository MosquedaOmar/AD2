<?php


include_once 'conexion.php'; // Asegúrate de tener un archivo 'conexion.php' que contenga la lógica para establecer la conexión a la base de datos
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el formulario   
$usuario = (isset($_POST['user'])) ? $_POST['user'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

// Utilizar sentencias preparadas para evitar inyección SQL
$consulta = "SELECT * FROM Administradores WHERE usuario = :usuario";
$resultado = $conexion->prepare($consulta);
$resultado->bindParam(':usuario', $usuario);
$resultado->execute(); 

$data = null;

if($resultado->rowCount() == 1){ 
    $row = $resultado->fetch(PDO::FETCH_ASSOC);
    $contrasena_bd = $row['contraseña'];
    
    // Verificar si la contraseña proporcionada coincide con la almacenada en la base de datos
    if($password === $contrasena_bd) {
        $_SESSION["s_usuario"] = $usuario;
        $_SESSION["mensaje"] = "Inicio de sesión exitoso";
        // Puedes agregar más variables de sesión según tus necesidades
        // Redirigir al usuario a la página deseada después del inicio de sesión
        header("Location: ../vistas/pag_inicio.php");
        exit();
    } else {
        $_SESSION["s_usuario"] = null;
        $_SESSION["mensaje"] = "Nombre de usuario o contraseña incorrectos";
        // Redirigir de vuelta al formulario de inicio de sesión
        header("Location: index.php");
        exit();
    }
}

// Cerrar la conexión a la base de datos
$conexion=null;
?>
