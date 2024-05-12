<?php

session_start();

// Verificar si el usuario ha iniciado sesión de manera segura
if (!isset($_SESSION["s_usuario"])) {
    // Si no ha iniciado sesión, redirigir al inicio de sesión
    header("Location: ../index.php");
    exit();
}
 include 'doctoptype.php';

 include 'nav.php' ; ?>

<style>
body {
    background-image: url("/init/fondo.jpeg");
}
</style>
<div class="welcome-message">
          <h1 class="display-4 text-center">¡Bienvenido <?php echo $_SESSION["s_usuario"];?>!</h1>
          <h2 class="text-center"><span class="badge badge-success"></span></h2>    
          <hr class="my-4">          

        </div>
        </div>
    </div>
</div>    

        
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../popper/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../plugins/sweet_alert2/sweetalert2.all.min.js"></script>
<script src="../codigo.js"></script>
</body>
</html>

<script>
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
</script>

</body>
</html>
