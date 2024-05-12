function validarFormulario() {
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var dni = document.getElementById('dni').value;
    var fechaNacimiento = document.getElementById('fechaNacimiento').value;
    var correo = document.getElementById('correo').value;
    var telefono = document.getElementById('telefono').value;
    var direccion = document.getElementById('direccion').value;
    var usuario = document.getElementById('usuario').value;
    var contraseña = document.getElementById('contraseña').value;

    if (nombre == "" || apellido == "" || dni == "" || fechaNacimiento == "" || correo == "" || telefono == "" || direccion == "" || usuario == "" || contraseña == "") {
      alert("Por favor complete todos los campos.");
      return false;
    }
    return true;
  }