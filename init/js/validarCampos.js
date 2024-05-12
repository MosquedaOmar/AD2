
    function validarFormulario() {
        // Verificar si se está enviando el formulario de invitado
        if (document.getElementById('submit_login')) {
            // Obtener los valores de los campos de invitado
            var user = document.getElementById('user').value;
            var password = document.getElementById('password').value;
            var errorMsgInvitado = document.getElementById('error-msg-invitado');

            // Verificar si algún campo está vacío para el formulario de invitado
            if (user === '' || password === '') {
                // Mostrar mensaje de error para el formulario de invitado si algún campo está vacío
                errorMsgInvitado.style.display = 'block';
                return false; // Detener el envío del formulario
            } else {
                // Si los campos están completos para el formulario de invitado, ocultar el mensaje de error
                errorMsgInvitado.style.display = 'none';
                return true; // Permitir el envío del formulario
            }
        } else if (document.getElementById('submit_admin')) { // Verificar si se está enviando el formulario de administrador
            // Obtener los valores de los campos de administrador
            var adminUser = document.getElementById('admin_user').value;
            var adminPassword = document.getElementById('admin_password').value;
            var errorMsgAdmin = document.getElementById('error-msg-admin');

            // Verificar si algún campo está vacío para el formulario de administrador
            if (adminUser === '' || adminPassword === '') {
                // Mostrar mensaje de error para el formulario de administrador si algún campo está vacío
                errorMsgAdmin.style.display = 'block';
                return false; // Detener el envío del formulario
            } else {
                // Si los campos están completos para el formulario de administrador, ocultar el mensaje de error
                errorMsgAdmin.style.display = 'none';
                return true; // Permitir el envío del formulario
            }
        }
    }
