function validarInvitado() {
    var usuario = document.getElementById("usuario_invitado").value;
    var contrasena = document.getElementById("contrasena_invitado").value;
  
    if (usuario === "" || contrasena === "") {
      alert("Por favor, complete todos los campos.");
    } else {
      // Enviar datos del formulario al servidor
      fetch("../php/loginInvitado.php", {
        method: 'POST',
        body: new FormData(document.getElementById("formInvitado"))
      })
      .then(response => {
        if (response.ok) {
          // Redirigir al usuario si la respuesta del servidor es exitosa
          window.location.href = "/biblioteca/app/pages/invitado/invitado.html";
        } else {
          throw new Error('Error al enviar los datos al servidor.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    }
  }

  function validarAdmin() {
    var usuario = document.getElementById("usuario_admin").value;
    var contrasena = document.getElementById("contrasena_admin").value;
  
    if (usuario === "" || contrasena === "") {
      alert("Por favor, complete todos los campos.");
    } else {
      // Enviar datos del formulario al servidor
      fetch("../php/loginAdmin.php", {
        method: 'POST',
        body: new FormData(document.getElementById("formAdmin"))
      })
      .then(response => {
        if (response.ok) {
          // Redirigir al usuario si la respuesta del servidor es exitosa
          window.location.href = "/biblioteca/app/pages/admin/admin.html";
        } else {
          throw new Error('Error al enviar los datos al servidor.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    }
  }