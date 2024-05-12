<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/init/css/styleregistro.css">
<body>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div id="form-container" class="form-container">
          <h4 class="mb-4 pb-3">Formulario</h4>
          <p>Recuerde rellenar con datos validos.</p>
          <form action="registrar.php" method="post" id="registro-form" autocomplete="off"> 
          <div class="form-group">
            <input type="text" name="Nombre" id="Nombre" class="form-style" placeholder="Nombre" required>
          </div>  
          <div class="form-group">
            <input type="text" name="Apellido" id="Apellido" class="form-style" placeholder="Apellido" required>
          </div>  
          <div class="form-group">
            <input type="number" name="DNI" id="DNI" class="form-style" placeholder="DNI" required>
          </div>  
          <div class="form-group">
            <input type="date" name="FechaNacimiento" id="FechaNacimiento" class="form-style" placeholder="Fecha de nacimiento" required>
          </div>  
          <div class="form-group">
            <input type="email" name="Correo" id="Correo" class="form-style" placeholder="Correo" required>
          </div>  
          <div class="form-group">
            <input type="number" name="Telefono" id="Telefono" class="form-style" placeholder="Teléfono" required>
          </div>  
          <div class="form-group">
            <input type="user" name="user" id="user" class="form-style" placeholder="Usuario" required>
          </div>  
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-style" placeholder="Contraseña" required>
          </div>
          <div class="btn-container">
            <a href="practica.php" class="btn-volver mt-4" style="text-decoration: none;">Volver a login</a>
            <button class="btn-registrar mt-4">Registrarse</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
