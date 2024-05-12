<?php 
session_start();

// Verificar si ya hay una sesión iniciada
if (isset($_SESSION["s_usuario"])) {
    header("Location: /Nueva carpeta/login/vistas/pag_inicio.php"); // Redirigir al usuario a la página de inicio
    exit(); // Finalizar el script para evitar que el formulario se muestre
}

?>
    

<!doctype html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/sweet_alert2/sweetalert2.min.css">
  <link rel="stylesheet" href="/init/css/stylelogin.css">
</head>
<body>
<main>
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
                                            <form id="formLoginInvitado" action="" method="post"  autocomplete="off">
                                                <div class="form-group">
                                                    <input type="text" name="user" id="user" class="form-style" placeholder="Usuario" required>
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" id="password" class="form-style" placeholder="Contraseña" required>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4" name="submit_login">Iniciar sesión</button>
                                                <!-- Agregar el elemento <p> para mostrar el mensaje de error -->
                                                <p id="error-msg" class="error-msg">Por favor complete todos los campos.</p>
                                                <a href="http://localhost/init/view/home/singUp.php" class="btn mt-4">Registrarse</a>
                                                <br>
                                                <br>
                                                <!-- Eliminar el mensaje de error original -->
                                                <!-- <p class="error escondido">X Error al iniciar sesión X</p> -->
                                                <p class="mb-0 mt-4 text-center"><a href="" class="link">¿Olvidó su contraseña?</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-3 pb-3">Bienvenido</h4>
                                            <form id="formLoginInvitado" action="" method="post"  autocomplete="off">
                                                <div class="form-group">
                                                    <input type="text" name="user" id="user" class="form-style" placeholder="Usuario administrador" required>
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" id="password" class="form-style" placeholder="Contraseña administrador" required>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4" name="submit_login">Iniciar sesión</button>
                                                <br>
                                                <!-- Agregar el elemento <p> para mostrar el mensaje de error -->
                                                <p id="error-msg" class="error-msg">Por favor complete todos los campos.</p>
                                                <p class="mb-0 mt-4 text-center"><a href="" class="link">¿Olvidó su contraseña?</a></p>
                                            </form>
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
</main>

</body>
</html>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <script src="plugins/sweet_alert2/sweetalert2.all.min.js"></script>
    <script src="codigo.js"></script>
</body>
</html>