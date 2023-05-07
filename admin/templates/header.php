<?php 
$url_base ="http://localhost/unitic/admin/"
 ?>
<!doctype html>
<html lang="en">

<head>
  <title>Administrador</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- FONT FAMILY -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&family=Nunito&family=Ubuntu&display=swap" rel="stylesheet">
  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="#">Administrador</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-warning" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo $url_base;?>modulos/proyectos/">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo $url_base;?>modulos/productos/">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo $url_base;?>modulos/integrantes/">Integrantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo $url_base;?>modulos/desarrollo/">Desarrollo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo $url_base;?>modulos/articulos/">Articulos</a>
                    </li>
                </ul>
                <a href="<?php echo $url_base;?>login.php">
                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Cerrar sesion</button>
                </a>
                    
            </div>
      </div>
    </nav>
    
    <!-- <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../img/logo2.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
                <img src="../img/unitic-estandar.png" alt="" width="150" height="50" class="d-inline-block align-text-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav m-auto" style="--bs-scroll-height: 100px;">
                  <li class="nav-item">
                      <a class="nav-link active text-black" aria-current="page" href="#">Inicio</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active text-black" aria-current="page" href="./modulos/articulos/index.php">Proyectos</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active text-black" aria-current="page" href="./modulos/productos/index.php">Productos</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active text-black" aria-current="page" href="./modulos/integrantes/index.php">Integrantes</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active text-black" aria-current="page" href="./modulos/desarrollo/index.php">Desarrollo</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active text-black" aria-current="page" href="./modulos/articulos/index.php">Articulos</a>
                  </li>
              </ul>
              <button class="btn btn-outline-warning text-black" type="submit" data-bs-toggle="modal" data-bs-target="#login">Cerrar sesion</button>
          </div>
        </div>
      </nav> -->
  </header>
  <main class="container">