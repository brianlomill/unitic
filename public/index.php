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

  <!-- SECCION SOBRE NOSOTROS - UNITIC  -->

  <div class="container-info" id="container-info">
    <div class="section p-5 mb-4 rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Quienes Somos </h1>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas labore ut omnis sed nostrum voluptatibus earum beatae quisquam odit deserunt, qui quaerat nobis ex consequatur tenetur hic! Quisquam, ullam eius.</p>
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-black">
          <h2>Misión</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, placeat fugit nobis autem nam numquam mollitia dolor? Laborum dolore odit similique possimus, qui maxime error optio commodi, sunt impedit pariatur nisi, modi repudiandae eius consectetur. Molestias accusantium aperiam cumque dolores!</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5">
          <h2>Visión</h2>
          <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure
            to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both
            column's content for equal-height.</p>
        </div>
      </div>
    </div>
  </div>

   <!-- SECCION PROYECTOS  -->

  <div class="section" id="proyectos">
    <div class="tittle">
      <h2>Proyectos</h2>
    </div>
    <div class="container py-2">
      <div class="row">
        <?php foreach ($proyectosList as $proyecto) : ?>
          <div class="col-sm-4 col-md-4 py-4">
            <div class="card h-100">
              <div class="card-body">
                <a href="#">
                  <img src="../img/pdf.webp" alt="pdf">
                </a>
                <br>
                <br>
                <h3 class="card-title">
                  <?php echo date("Y", strtotime($proyecto['fecha'])); ?>
                </h3>
                <h6 class="card-text" title="<?php echo $proyecto['titulo']; ?>">
                  <?php echo strlen($proyecto['titulo']) > 150 ? substr($proyecto['titulo'], 0, 150) . '...' : $proyecto['titulo']; ?>
                </h6>
                <h6 style="color: #ffc000; font-style: italic; font-weight: bold;">
                  <?php echo $proyecto['programa']; ?>
                </h6>
                <br>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a name="" id="" class="btn btn-outline-primary me-md-.5" href="proyectos.php" role="button">Ver Más</a>
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

  <?php
  include('../templates/footer.php');
  ?>