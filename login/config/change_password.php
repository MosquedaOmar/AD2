<?php
require_once("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Verificar el token y la expiración
    $stmt = $conexion->prepare("SELECT user_id FROM password_resets WHERE token = ? AND expires >= ?");
    $stmt->bind_param('ss', $token, date('U'));
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['user_id'];

        // Actualizar la contraseña del usuario
        $stmt = $conexion->prepare("UPDATE usuarios SET password = ? WHERE id = ?");
        $stmt->bind_param('si', $new_password, $userId);
        $stmt->execute();

        // Eliminar el token de la base de datos
        $stmt = $conexion->prepare("DELETE FROM password_resets WHERE user_id = ?");
        $stmt->bind_param('i', $userId);
        $stmt->execute();

        echo 'Tu contraseña ha sido restablecida con éxito.';
    } else {
        echo 'El enlace de recuperación es inválido o ha expirado.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablecer Contraseña</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h2>Restablecer Contraseña</h2>
                    <form action="change_password.php" method="post">
                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
                        <div class="form-group">
                            <input type="password" name="new_password" class="form-style" placeholder="Nueva Contraseña" required>
                        </div>
                        <div class="btn-container">
                            <button class="btn-registrar mt-4">Restablecer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
