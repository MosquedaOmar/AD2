<!doctype html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Public/CSS/style.css">
  <link rel="stylesheet" href="../Public/CSS/fondo.css">
</head>
<body>
  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Invitado </span><span>Admin</span></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3">Bienvenido</h4>
                      <!-- Formulario para el inicio de sesión de invitado -->
                      <form action="" method="post">
                        <div class="form-group">
                          <input type="text" name="usuario_invitado" id="usuario_invitado" class="form-style" placeholder="Usuario" required>
                          <i class="input-icon uil uil-user"></i>
                        </div> 
                        <div class="form-group mt-2">
                          <input type="password" name="contrasena_invitado" id="contrasena_invitado" class="form-style" placeholder="Contraseña" required>
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" class="btn mt-4">Iniciar sesión</button>
                      </form>
                      <a href="../pages/registroinvit.html" class="btn mt-4">Registrarse</a>
                      <p class="mb-0 mt-4 text-center"><a href="" class="link">¿Olvidó su contraseña?</a></p>
                    </div>
                  </div>
                </div>
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-3 pb-3">Bienvenido</h4>
                      <!-- Formulario para el inicio de sesión de administrador -->
                      <form action="" method="post" >
                        <div class="form-group">
                          <input type="text" name="usuario_admin" class="form-style" placeholder="Usuario" required>
                          <i class="input-icon uil uil-user"></i>
                        </div> 
                        <div class="form-group mt-2">
                          <input type="password" name="contrasena_admin" class="form-style" placeholder="Contraseña" required>
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" class="btn mt-4">Iniciar sesión</button>
                      </form>
                      <p class="mb-0 mt-4 text-center"><a href="" class="link">¿Olvido su contraseña?</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
// Manejar el formulario de inicio de sesión de invitado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario_invitado"]) && isset($_POST["contrasena_invitado"])) {
    require_once '/app/php/loginInvitado.php'; // Reemplaza 'tu_archivo_de_autenticacion_invitado.php' con el nombre de tu archivo de autenticación de invitados

    $usuario_invitado = $_POST["usuario_invitado"];
    $contrasena_invitado = $_POST["contrasena_invitado"];

    // Realizar la autenticación de invitado y manejar los datos
    if (validarCredencialesInvitado($usuario_invitado, $contrasena_invitado)) {
        session_start();
        $_SESSION['usuario'] = $usuario_invitado;
        // Redirigir a la página correspondiente
        header("Location: /app/pages/invitado.html");
        exit();
    } else {
        echo "<p>Error: Usuario o contraseña incorrectos para invitado.</p>";
    }
}

// Manejar el formulario de inicio de sesión de administrador
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario_admin"]) && isset($_POST["contrasena_admin"])) {
    require_once 'tu_archivo_de_autenticacion_administrador.php'; // Reemplaza 'tu_archivo_de_autenticacion_administrador.php' con el nombre de tu archivo de autenticación de administradores

    $usuario_admin = $_POST["usuario_admin"];
    $contrasena_admin = $_POST["contrasena_admin"];

    // Realizar la autenticación de administrador y manejar los datos
    if (validarCredencialesAdministrador($usuario_admin, $contrasena_admin)) {
        session_start();
        $_SESSION['usuario'] = $usuario_admin;
        // Redirigir a la página correspondiente
        header("Location: dashboard_admin.php");
        exit();
    } else {
        echo "<p>Error: Usuario o contraseña incorrectos para administrador.</p>";
    }
}
?>
</body>
</html>
