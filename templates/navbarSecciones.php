<!DOCTYPE html>
<html lang="es">

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
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&family=Nunito&family=Ubuntu&display=swap" rel="stylesheet">
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- HOJA DE ESTILOS -->
    <link rel="stylesheet" type="text/css" href="../css/stylesPortafolio.css">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <style>
      .card-inactivo {
        filter: grayscale(100%);
        background-color: #dddddd;
      }
    </style>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo.webp" alt="" width="50" height="50" class="d-inline-block align-text-top">
                    <img src="../img/unitic.webp" alt="" width="150" height="50" class="d-inline-block align-text-top">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav m-auto" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active text-warning" aria-current="page" href="../index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../public/proyectos.php">Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../public/monografias.php">Monografias</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link active text-white dropdown-toggle" href="#" role="button" id="productosDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Productos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="productosDropdown">
                                    <li><a class="dropdown-item" href="../public/ponencias.php">Ponencias</a></li>
                                    <li><a class="dropdown-item" href="../public/posters.php">Posters</a></li>
                                    <li><a class="dropdown-item" href="../public/posters.php">Desarrollo</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../public/integrantes.php">Integrantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Galeria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../index.php#contacto">Contactanos</a>
                        </li>
                    </ul>
                    <a class="btn btn-outline-warning btn_outlines" href="../admin/login.php" role="button">Administrador</a>
                </div>
            </div>
        </nav>