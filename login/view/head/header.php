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
            font
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #c4c3ca;
        }

        .navbar-dark .navbar-nav .nav-item {
        margin-right: 5px; /* Aumenta esta cantidad para más separación */
        margin-left: 20px;
        }
        .navbar-nav .nav-link {
        font-size: 12px; /* Ajusta el tamaño de la fuente según tus preferencias */
        }


        .boton {
            border-radius: 4px;
            height: 30px;
            font-size: 10px;
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
        #searchInput {
            margin-left: 60px;
            background-color: #333333;
             color: #ffffff;
             border-color: #666666; /* Cambia este color según tus preferencias */
            width: 300px; /* Ajusta este valor según tus necesidades */
        }
        .navbar-brand {
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="fondo_menu">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/login/view/home/panel_control">Inicio</a>
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
                                <a class="nav-link active" aria-current="page" href="/login/view/content/user/libros.php">Libros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/login/view/content/user/revistas.php">Revistas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/login/view/content/user/autor.php">Autor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/login/view/content/user/genero.php">Géneros</a>
                            </li>
                            <form class="d-flex" action="/login/view/search/results.php" method="GET">
                                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" id="searchInput" name="query">
                            </form>
                        </ul>
                        
                        <a class="nav-link" style="font-size: 12px;" href="/login/view/perfiles/perfil.php">Datos de mi perfil</a>
 
                        <a href="/login/view/home/logout" class="boton">Cerrar Sesión</a>
                    </div>
                    <?php endif ?>
                </div>
            </nav>
        </div>
    </div>

