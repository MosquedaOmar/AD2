<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo APP_URL; ?>app/views/css/style.css">
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
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <input type="text" name="user" id="user" class="form-style" placeholder="Usuario" require>
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" id="password" class="form-style" placeholder="Contraseña" require>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4" name="submit_login">Iniciar sesión</button>
                                                <a href="http://localhost/library/register" class="btn mt-4">Registrarse</a>
                                                <br>
                                                <br>
                                                <p class="error escondido">X Error al iniciar sesión X</p>
                                                <p class="mb-0 mt-4 text-center"><a href="" class="link">¿Olvidó su contraseña?</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-3 pb-3">Bienvenido</h4>
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <input type="text" name="admin_user" id="admin_user" class="form-style" placeholder="Usuario administrador" require>
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="admin_password" id="admin_password" class="form-style" placeholder="Contraseña administrador" require>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4" name="submit_admin">Iniciar sesión</button>
                                                <br>
                                                <br>
                                                <p class="error escondido">X Error al iniciar sesión X</p>
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

<?php
// Asegúrate de incluir el archivo donde está definida la clase loginController
require  './app/controllers/loginController.php';

// Crear una instancia de loginController
$insLogin = new loginController();

    if(isset($_POST['submit_login'])) {
        // Procesar el inicio de sesión del invitado
        if(isset($_POST['user']) && isset($_POST['password'])){
            $insLogin->iniciarSesionInvitadoControlador();
        }
    }

    if(isset($_POST['submit_admin'])) {
        // Procesar el inicio de sesión del administrador
        if(isset($_POST['admin_user']) && isset($_POST['admin_password'])){
            $insLogin->iniciarSesionControlador();
        }
    }
?>

</body>
</html>
