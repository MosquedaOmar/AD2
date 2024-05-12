                // Ejemplo de agregar eventos a los botones de editar y eliminar
                document.querySelectorAll('.edit-btn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        // Lógica para editar el préstamo
                        // Puedes abrir un formulario de edición aquí
                        console.log('Editar préstamo');
                    });
                });
        
                document.querySelectorAll('.delete-btn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        // Lógica para eliminar el préstamo
                        // Puedes confirmar la eliminación y realizar una llamada a una función de eliminación aquí
                        console.log('Eliminar préstamo');
                    });
                });
        function mostrarSeccion(idSeccion) {
            // Ocultar todas las secciones
            var secciones = document.getElementsByClassName('seccion');
            for (var i = 0; i < secciones.length; i++) {
                secciones[i].style.display = 'none';
            }
        
            // Mostrar la sección deseada
            var seccionMostrar = document.getElementById(idSeccion);
            if (seccionMostrar) {
                seccionMostrar.style.display = 'block';
            }
        }