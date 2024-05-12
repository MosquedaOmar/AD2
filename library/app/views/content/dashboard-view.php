<?php
// Iniciar la sesión si aún no se ha iniciado
session_start();

// Verificar si el usuario no está autenticado o no es un invitado
if (!isset($_SESSION['id']) || $_SESSION['tipo'] !== 'invitado') {
    // Redirigir a la página de inicio de sesión
    header("Location: login");
    exit; // Finalizar el script para prevenir cualquier salida adicional
}

// Si el usuario está autenticado como invitado, puedes continuar mostrando la página
?>
    <?php require_once "./app/views/inc/navbar.php"; ?>

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 300;
            line-height: 1.7;
            color: #ffffff; /* Cambiado a blanco */
            background-color: #1f2029;
        }

        .conteiner {
            background-image: url('/library/app/views/img/fondo.jpeg');
            /* Cambia 'tu_imagen.jpg' por la ruta de tu imagen de fondo */
            background-size: cover;
            background-position: center;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .contenido {
            background-color: rgba(0, 0, 0, 0.8); /* Tonalidad negro transparente */
            padding: 30px;
            border-radius: 10px; /* Bordes redondeados */
            max-width: 600px; /* Ancho máximo del cuadro */
            width: 100%; /* Ocupar todo el ancho disponible */
        }

        .titulo {
            font-size: 28px; /* Aumentamos el tamaño del título */
            color: #ffffff; /* Cambiado a blanco */
            margin-bottom: 20px; /* Agregamos un margen inferior para separar del texto */
        }

        .descripcion {
            color: #ffffff; /* Cambiado a blanco */
            font-size: 20px; /* Aumentamos el tamaño del texto */
            margin-top: 20px;
            text-align: left; /* Alinear texto a la izquierda */
            line-height: 1.8; /* Aumentamos el espacio entre líneas */
        }
    </style>
</head>
<body>

<div class="conteiner">
    <div class="contenido">
        <h3 class="titulo">¡Bienvenido a nuestra biblioteca en línea!</h3>
        <div class="colums is flex is-justify-content-center">
            <p class="descripcion">
                Explora nuestra extensa colección de libros que abarca una amplia variedad de géneros, autores y editoriales. Desde clásicos atemporales hasta las últimas novedades, tenemos algo para todos los gustos e intereses.
                <br><br>
                Para acceder a nuestra colección completa y comenzar a disfrutar de nuestros servicios, te invitamos a iniciar sesión como invitado. Si aún no tienes una cuenta, ¡no te preocupes! Puedes crear una de forma gratuita haciendo clic en el botón de inicio de sesión y seleccionando la opción de registro.
                <br><br>
                Una vez que hayas iniciado sesión, podrás explorar todos los libros disponibles, leer reseñas, y solicitar préstamos de aquellos que te interesen. ¡Es así de fácil comenzar tu viaje de lectura con nosotros!
                <br><br>
                ¡Esperamos verte pronto en nuestra biblioteca virtual!
            </p>
        </div>
    </div>
</div>