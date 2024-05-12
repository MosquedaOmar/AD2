<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo APP_URL; ?>app/views/css/styleregistro.css">
<body>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div id="form-container" class="form-container">
          <h4 class="mb-4 pb-3">Formulario</h4>
          <p>Recuerde rellenar con datos validos.</p>
          <form id="registro-form"> 
          <div class="form-group">
            <input type="text" id="Nombre" class="form-style" placeholder="Nombre" required>
          </div>  
          <div class="form-group">
            <input type="text" id="Apellido" class="form-style" placeholder="Apellido" required>
          </div>  
          <div class="form-group">
            <input type="number" id="DNI" class="form-style" placeholder="DNI" required>
          </div>  
          <div class="form-group">
            <input type="date" id="FechaNacimiento" class="form-style" placeholder="Fecha de nacimiento" required>
          </div>  
          <div class="form-group">
            <input type="email" id="Correo" class="form-style" placeholder="Correo" required>
          </div>  
          <div class="form-group">
            <input type="number" id="Telefono" class="form-style" placeholder="Teléfono" required>
          </div>  
          <div class="form-group">
            <input type="text" id="Direccion" class="form-style" placeholder="Dirección" required>
          </div>  
          <div class="form-group">
            <input type="user" id="user" class="form-style" placeholder="Usuario" required>
          </div>  
          <div class="form-group">
            <input type="password" id="password" class="form-style" placeholder="Contraseña" required>
          </div>
          <div class="btn-container">
            <a href="http://localhost/library/login" class="btn-volver mt-4" style="text-decoration: none;">Volver a login</a>
            <button class="btn-registrar mt-4">Registrarse</button>
            <p class="error escondido">X Error al Registrarse X</p>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>