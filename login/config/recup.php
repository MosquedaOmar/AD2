<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
require_once("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['correo'];

    // Crear una instancia de la clase db para establecer la conexión con la base de datos
    $db = new db();
    $conexion = $db->conexion();

    if($conexion instanceof PDO) {
        // Verificar que el correo exista en la base de datos y que esté activo
        $stmt = $conexion->prepare("SELECT id, correo FROM usuarios WHERE correo = :correo");
        $stmt->bindParam(':correo', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            $userId = $result['id'];

            // Generar un token único y una fecha de expiración
            $token = bin2hex(random_bytes(50));
            $expires = date('U') + 1800; // 30 minutos desde ahora

            // Insertar el token en la base de datos
            $stmt = $conexion->prepare("INSERT INTO password_resets (user_id, token, expires) VALUES (:userId, :token, :expires)");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':expires', $expires);
            $stmt->execute();

            // Configurar PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp-mail.outlook.com';
                $mail->SMTPAuth = true;
                $mail->Username = '';
                $mail->Password = '';
                $mail->Port = 80;

                $mail->setFrom('', '');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Recuperación de contraseña';
                $mail->Body = 'Hola, este es un correo generado para solicitar tu recuperación de contraseña. Por favor, visita la página de <a href="http://localhost/login/config/change_password.php?token=' . $token . '">Recuperación de contraseña</a>';

                $mail->send();
                header("Location: ../view/login.php?message=ok");
                exit(); // Salir del script después de redirigir
            } catch (Exception $e) {
                echo 'Error al enviar el correo electrónico: ', $mail->ErrorInfo;
                header("Location: ../index.php?message=error");
                exit(); // Salir del script después de redirigir
            }
        } else {
            header("Location: ../index.php?message=not_found");
            exit(); // Salir del script después de redirigir
        }
    } else {
        echo "Error al conectar a la base de datos: " . $conexion;
    }
} else {
    header("Location: ../index.php"); // Redirigir si no es una solicitud POST
    exit(); // Salir del script después de redirigir
}

?>
