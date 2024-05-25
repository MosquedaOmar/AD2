<?php
    require_once("c://xampp/htdocs/login/view/head/head.php");
    
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("/login/Abstract-blue-waves_2560x1600.jpg");
            font-family: 'Poppins', sans-serif;
            font-weight: 300;
            line-height: 1.7;
            color: #ffeba7;
            background-color: #1f2029;
        }

        .navbar-dark .navbar-brand {
            color: #ffeba7;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #ffeba7;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #c4c3ca;
        }

        .boton {
            border-radius: 4px;
            height: 44px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 0 30px;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            background-color: #ffeba7;
            color: #000000;
            margin-left: 10px;
            text-decoration: none;
        }

        .boton:hover {
            background-color: #000000;
            color: #ffeba7;
            box-shadow: 0 8px 24px 0 rgba(16, 39, 112, .2);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="fondo_menu">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Inicio</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php if(empty($_SESSION['usuario'])): ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        </ul>
                        <a href="/login/view/home/login"  class="boton">Inicia Sesión</a>
                        <a href="/login/view/home/signup" class="boton">Regístrate</a>
                    </div>
                    <?php else: ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Libros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Revistas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Autor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Géneros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Editar mi perfil</a>
                            </li>
                        </ul>
                        <a href="/login/view/home/logout" class="boton">Cerrar Sesión</a>
                    </div>
                    <?php endif ?>
                </div>
            </nav>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function loadContent(contentType) {
            const content = document.getElementById('content');
            let url = '';

            switch(contentType) {
                case 'libros':
                    url = '/login/view/content/libros.php';
                    break;
                case 'revistas':
                    url = '/login/view/content/revistas.php';
                    break;
                case 'autor':
                    url = '/login/view/content/autor.php';
                    break;
                case 'generos':
                    url = '/login/view/content/generos.php';
                    break;
            }

            fetch(url)
                .then(response => response.text())
                .then(data => content.innerHTML = data)
                .catch(error => console.error('Error cargando el contenido:', error));
        }
    </script>
