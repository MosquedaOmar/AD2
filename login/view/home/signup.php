<?php
    require_once("c://xampp/htdocs/login/view/head/head.php");
    if(!empty($_SESSION['usuario'])){
        header("Location:panel_control.php");
    }
?>

<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<style>
    body {
    background-image: url("/library/app/views/img/Abstract-blue-waves_2560x1600.jpg");
    font-family: 'Poppins', sans-serif;
    font-weight: 300;
    line-height: 1.7;
    color: #ffeba7;
    background-color: #1f2029;
    margin: 0;
    padding: 0;
  }
  h4 {
      text-align: center;
  }
  p {
    text-align: center;
  }
  .form-container {
    margin-top: 60px;
    padding: 20px;
    background-color: #2b2e38;
    border-radius: 8px;
  }
  .form-group {
    margin-bottom: 20px;
  }
  .form-group input {
    border: 1px solid #555;
  }
  .form-style {
    padding: 13px 20px;
    height: 48px;
    width: 100%;
    font-weight: 500;
    border-radius: 4px;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0.5px;
    outline: none;
    color: #c4c3ca;
    background-color: #1f2029;
    border: none;
    transition: all 0.2s ease-in-out;
  }
  .form-style:focus,
  .form-style:active {
    border: none;
    outline: none;
  }
  .btn-container {
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .btn-registrar,
  .btn-volver {
    border-radius: 4px;
    height: 48px; /* Misma altura que el input */
    line-height: 48px; /* Para centrar el texto verticalmente */
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    padding: 0 30px;
    letter-spacing: 1px;
    background-color: #ffeba7;
    border: none;
    color: #1f2029;
    transition: all 0.2s ease-in-out;
    margin: 0 10px; /* Espacio entre los botones */
    text-decoration: none; /* Quitar la línea subrayada */
  }
  .btn-registrar:hover,
  .btn-volver:hover {
    background-color: #000000;
    color: #ffeba7;
    box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
  }

  .error {
    color:red;

  }

  .escondido {
    display: none;
  }
</style>
<body>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div id="form-container" class="form-container">
          <p>Por favor, asegúrate de ingresar datos válidos. El uso de información incorrecta o falsa puede resultar en la prohibición de préstamos de libros.</p>
          <form action="store.php" method="post" id="registro-form" autocomplete="off"> 
          <div class="form-group">
            <input type="text" name="nombre" id="nombre" class="form-style" placeholder="Nombre" required>
          </div>  
          <div class="form-group">
            <input type="text" name="apellido" id="apellido" class="form-style" placeholder="Apellido" required>
          </div>
          <div class="form-group">
            <input type="number" name="dni" id="dni" class="form-style" placeholder="DNI" required>
          </div>
          <div class="form-group">
            <input type="number" name="telefono" id="telefono" class="form-style" placeholder="Telefono y/o Celular" required>
          </div>
          <div class="form-group">
            <input type="email" name="correo" id="correo" class="form-style" placeholder="Correo Electronico" required>
          </div>
          <div class="form-group">
            <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-style" placeholder="Fecha de Nacimiento" required>
          </div>
          <div class="form-group">
            <input type="user" name="usuario" id="usuario" class="form-style" placeholder="Usuario" required>
          </div>
          <div class="form-group">
            <input type="password" name="contraseña" id="contraseña" class="form-style" placeholder="Contraseña" required>
          </div>
          <div class="btn-container">
            <a href="login.php" class="btn-volver mt-4" style="text-decoration: none;">Volver a login</a>
            <button class="btn-registrar mt-4">Registrarse</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
    require_once("c://xampp/htdocs/login/view/head/footer.php");
?>