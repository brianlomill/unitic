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
    <!-- <link rel="stylesheet" type="text/css" href="../css/styles.css"> -->

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

  </head>

  <body>
    <?php
    include('../templates/navbarSecciones.php');
    include('../clases/Proyectos.php');

    $proyectos = new Proyectos();

    $ListarProyectos = $proyectos->obtenerProyectos();
    $listarIntegrantes = $proyectos->obtenerIntegrantes();

    ?>
    <h2 class="container my-5 h4">PROYECTOS</h2>
    <?php foreach ($ListarProyectos as $proyecto) : ?>
      <div class="container my-5">
        <div class="row">
          <div class="card col-md-12 p-3">
            <div class="row">
              <div class="col-md-3">
                <!-- <img width="100%" src="../img/uniminuto.jpg"> -->
                <a href="../archivos/proyectos/<?php echo $proyecto['archivo']; ?>" target="_blank">
                  <img class="img-fluid mx-auto d-block" src="../archivos/proyectos/img_archivos/<?php echo $proyecto['imagen']; ?>">
                </a>
              </div>
              <div class="col-md-8">
                <div class="card-block">
                  <a href="../archivos/proyectos/<?php echo $proyecto['archivo']; ?>" target="_blank">
                    <h6 class="card-title h5" style="color:#146C94"><?php echo $proyecto['titulo'] ?></h6>
                  </a>
                  <p style="color:#19A7CE"><em><?php echo $proyecto['programa'] ?></em></p>
                  <p class="h6 text-dark text-opacity-75">"<?php echo $proyecto['fecha'] ?>"</p>
                  <p><small>Integrantes: </small>
                    <?php foreach ($listarIntegrantes as $integrante) {
                      if ($integrante['portafolio_id'] == $proyecto['id']) {
                        echo '<p class="h6 text-dark"><i class="bi bi-check-all"></i>' . $integrante['integrantes'] . '</p>';
                      }
                    } ?>

                    <!-- <p class="h6 text-dark"><i class="bi bi-check-all"></i>edwin</p> -->
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </body>