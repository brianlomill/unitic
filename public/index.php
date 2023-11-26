<!doctype html>
<html lang="en">

<head>
  <title>Semillero UNITIC</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- FONT FAMILY -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&family=Nunito&family=Ubuntu&display=swap" rel="stylesheet">
  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <!-- HOJA DE ESTILOS -->
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>
  <header class="header">
    <?php
    include('../templates/navbar.php');

    $url_base = "../archivos/integrantes/";
    include '../clases/Integrantes.php';
    include '../clases/Proyectos.php';

    $proyectos = new Proyectos();

    $proyectosList = $proyectos->obtenerPrimerosProyectos();

    // Instancia de la clase Integrantes
    $integrantes = new Integrantes();

    // Obtener los primeros 3 integrantes
    $integrantesList = $integrantes->obtenerPrimerosIntegrantes();

    ?>

    <!-- SECCION BANNER -->

    <div class="banner">
      <div class="banner-content">
        <img src="../img/uniticestandar2.WEBP" alt="shopping">
        <h2>
          Ingeniería de Sistemas - ISUM - GIRARDOT
        </h2>
        <div class="butt">
          <div class="row">
            <div class="col-lg-3">
              <a href="ponencias.php"><i class="bi bi-soundwave" style="font-size: 2rem; color: #ffc000;"></i></a>
              <p class="fw-normal">Ponencias</p>
            </div>
            <div class="col-lg-3">
              <a href="monografias.php"><i class="bi bi-file-text" style="font-size: 2rem; color: #ffc000;"></i></a>
              <p class="fw-normal">Monografias</p>
            </div>
            <div class="col-lg-3">
              <a href="posters.php"><i class="bi bi-file-earmark-image" style="font-size: 2rem; color: #ffc000;"></i></i></a>
              <p class="fw-normal">Poster</p>
            </div>
            <div class="col-lg-3">
              <a href="#"><i class="bi bi-file-earmark-medical" style="font-size: 2rem; color: #ffc000;"></i></a>
              <p class="fw-normal">Certificados</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container-fluid py-5 bg-success p-2 text-dark bg-opacity-75">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 wow fadeIn" data-wow-delay=".1s">
          <div class="d-flex counter">
            <h1 class="me-3 text-primary counter-value">99</h1>
            <h5 class="text-white mt-1">Estudiantes activos en el semillero</h5>
          </div>
        </div>
        <div class="col-lg-3 wow fadeIn" data-wow-delay=".3s">
          <div class="d-flex counter">
            <h1 class="me-3 text-primary counter-value">25</h1>
            <h5 class="text-white mt-1">Total de proyectos </h5>
          </div>
        </div>
        <div class="col-lg-3 wow fadeIn" data-wow-delay=".5s">
          <div class="d-flex counter">
            <h1 class="me-3 text-primary counter-value">120</h1>
            <h5 class="text-white mt-1">Total de productos elaborados</h5>
          </div>
        </div>
        <div class="col-lg-3 wow fadeIn" data-wow-delay=".7s">
          <div class="d-flex counter">
            <h1 class="me-3 text-primary counter-value">5</h1>
            <h5 class="text-white mt-1">Años en funcionamiento
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SECCION SOBRE NOSOTROS - UNITIC  -->

  <div class="container-fluid py-5">
    <div class="container pt-5">
      <div class="row g-5">

        <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
          <h5 class="about">Acerca de Nosotros</h5>
          <h1 class="mb-4 titulo">UNITIC - Un Espacio Para La Innovación</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus. Etiam gravida justo nec erat vestibulum, et malesuada augue laoreet.</p>
          <p class="mb-4">Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus.</p>
          <a href="" class="btn btn-success rounded-pill px-5 py-3 text-white">More Details</a>
        </div>

        <div class="col-lg-5 col-md-6 col-sm-12">
          <div class="h-100 position-relative">
            <img src="../img/about-1.jpg" class="img-fluid w-75 rounded" alt="" style="margin-bottom: 25%;">
            <div class="position-absolute w-75" style="top: 25%; left: 25%;">
              <img src="../img/about-2.jpg" class="img-fluid w-100 rounded" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <!-- SECCION PROYECTOS  -->

    <div class="container-fluid proyects py-5 mb-5">
      <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
          <h5 class="h5">Proyectos</h5>
          <h1 class="h1">Proyectos UNITIC</h1>
        </div>
        <div class="row g-5 justify-content-center">
        <?php foreach ($proyectosList as $proyecto) : ?>
          <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
            <div class="blog-item position-relative bg-light rounded">
              <img src="../img/blog-1.jpg" class="img-fluid w-100 rounded" alt="">
              <span class="position-absolute px-4 py-3 bg-primary text-white rounded" style="top: -28px; right: 20px;"><?php echo date("Y", strtotime($proyecto['fecha'])); ?></span>
             
              <div class="proyects-content px-3">
                <h5 class="autor"><?php echo strlen($proyecto['titulo']) > 50 ? substr($proyecto['titulo'], 0, 50) . ' ...' : $proyecto['titulo']; ?></h5>
                <p>Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum. Aliquam dolor eget urna ultricies tincidunt libero sit amet</p>
                <span class="programa"><?php echo $proyecto['programa']; ?></span>
              </div>
              <div class="proyects-coment d-flex justify-content-center px-4 py-2 border bg-primary rounded-bottom">
                <a href="proyectos.php" class="text-white"><small><i class="bi bi-eye-fill"></i></i> Ver Más</small></a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- SECCION INTEGRANTES  -->

    <div class="section" id="integrantes">
      <div class="tittle">
        <h2>Integrantes</h2>
      </div>
      <div class="container py-2">
        <div class="row">

          <div class="section-integrantes">
            <?php
            // Genera las cards de Bootstrap para los integrantes obtenidos
            foreach ($integrantesList as $integrante) {
              $nombres = $integrante["nombres"] . ' ' . $integrante["apellidos"];
              $foto = $integrante["foto"];
            ?>
              <div class="integrantes">
                <div class="wrapper">
                  <a href="#">
                    <img src="<?php echo $url_base . $integrante['foto']; ?>" alt="">
                  </a>
                  <div class="text">
                    <h1 class="name">Estudiante</h1>
                    <p class="contenido"><?php echo $nombres ?></p>
                  </div>
                </div>
                <div class="contenido">
                  <p>Frontend developer and <br>
                    Programmer</p>
                </div>
                <ul class="icons">
                  <li><a href="#" target="_blank" title="GitHub"><i class="fab fa-github"></i></a></li>
                  <li><a href="<?php echo $integrante['linkedln']; ?>" target="_blank" title="Linkedln"><i class="fab fa-linkedin"></i></a></li>
                  <li><a href="#" target="_blank" title="Cvlac"><i class="bi bi-person-vcard"></i></a></li>
                </ul>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a name="" id="" class="btn btn-outline-primary me-md-3" href="integrantes.php" role="button">Ver Más</a>
        </div>
      </div>
    </div>
    </div>

    <!-- SECCION CONTACTO  -->



    <!-- FOOTER -->

    <a href="#" class="btn btn-success btn-square rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>

    <?php
    include('../templates/footer.php');
    ?>