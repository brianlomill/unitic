  <!DOCTYPE html>
  <html lang="es">

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
    <link rel="stylesheet" type="text/css" href="../css/stylesPortafolio.css">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

  </head>

  <body>
    <header>

      <?php
      include('../templates/navbarSecciones.php');
      include('../clases/Posters.php');

      $Posters = new Posters();

      $listarPosters = $Posters->obtenerPosters();
      $integrantes = $Posters->obtenerIntegrantes();
      ?>

    </header>

    <main>

      <section class="home-blog bg-sand">
        <div class="container">
          <!-- TITULO POSTERS -->
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8">
              <div class="section-title">
                <h5>POSTERS</h5>
              </div>
            </div>
          </div>
          <!-- FINALIZA TITULO -->

          <div class="row">
            <!-- Aquí comienza el bucle para mostrar los posters -->
            <?php foreach ($listarPosters as $poster) : ?>
              <div class="col-md-6 mb-4">
                <div class="media blog-media">
                  <a href="../archivos/productos/posters/<?php echo $poster['archivo']; ?>" target="_blank">
                    <img class="d-flex" src="../archivos/productos/posters/<?php echo $poster['imagen']; ?>" alt="poster UNITIC" loading="lazy" style="width: 250px; height: 380px;" width="250" height="380">
                  </a>

                  <div class="media-body">
                    <div class="circle">
                      <h5 class="day">
                        <?php
                        $fecha = $poster['fecha']; // Tu fecha completa aquí
                        $ano = date('Y', strtotime($fecha));
                        echo $ano;
                        ?>
                      </h5>
                    </div>
                    <a href="../archivos/productos/posters/<?php echo $poster['archivo']; ?>" target="_blank">
                      <h5 class="mt-2"><?php echo $poster['titulo'] ?>.</h5>
                    </a>
                    <h5>
                      <?php echo $poster['ciudad']; ?>
                    </h5>
                    <ul>
                      <li>
                        <?php
                        foreach ($integrantes as $integrante) {
                          if ($integrante['portafolio_id'] == $poster['id']) {
                            echo 'Hecho por: ' . $integrante['integrantes'];
                          }
                        }
                        ?>
                      </li>
                    </ul>
                    <span class="badge bg-success">Ver</span>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- Fin del bucle -->
          </div>
        </div>
      </section>
    </main>
    <?php
    include '../templates/footer.php';
    ?>