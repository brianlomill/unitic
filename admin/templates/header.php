<?php
$url_base = "http://localhost/unitic/admin/";
$url_styles = "http://localhost/unitic/css/";
$url_img = "http://localhost/unitic/img/";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon del sitio -->
    <link rel="icon" href="../img/logo.webp" type="image/x-icon">
    <title>Semillero UNITIC</title>
    <!-- FONT FAMILY -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- HOJA DE ESTILOS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $url_styles; ?>styles.css">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <!-- DATATABLES JQUERY -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <!-- DATATABLES -->
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo $url_img; ?>logo.webp" alt="logo unitic" width="50" height="50" class="d-inline-block align-text-top text-white">
                    <img src="<?php echo $url_img; ?>unitic.webp" alt="logo unitic" width="150" height="50" class="d-inline-block align-text-top text-white">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav m-auto" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active text-warning" aria-current="page" href="<?php echo $url_base; ?>index.php">Inicio <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo $url_base; ?>modulos/proyectos/">Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo $url_base; ?>modulos/monografias/">Monografias</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="productosDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Productos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="productosDropdown">
                                    <li><a class="dropdown-item" href="<?php echo $url_base; ?>modulos/ponencias/">Ponencias</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $url_base; ?>modulos/posters/">Posters</a></li>
                                    <li><a class="dropdown-item" href="#">Desarrollo</a></li>
                                    <li><a class="dropdown-item" href="#">Articulos</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo $url_base; ?>modulos/integrantes/">Integrantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Galeria</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav user">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="<?php echo $url_base; ?>actualizarContrasena.php">Actualizar Contraseña</a></li>
                                <li><a class="dropdown-item" href="<?php echo $url_base; ?>../servidor/cerrar_sesion.php">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <main class="container"><br>