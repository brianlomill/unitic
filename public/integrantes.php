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
    include('../clases/Integrantes.php');

    $integrantes = new Integrantes();

    $listarIntegrantes = $integrantes->obtenerIntegrantes();

    ?>
    <h5 class="container my-5 h5">INTEGRANTES</h5>
    <?php foreach ($listarIntegrantes as $integrante) : ?>
      <div class="container my-5">
          <div class="card col-md-12 p-3">
            <div class="row">
              <div class="col-md-3">
                <img class="img-fluid mx-auto d-block" src="../archivos/integrantes/<?php echo $integrante['foto']; ?>">
              </div>
              <div class="col-md-8">
                <div class="card-block">
                  <h6 class="card-title h5" style="color:#146C94"><?php echo $integrante['nombres'] . " " . $integrante['apellidos'] ?></h6>
                  <h6><i class="bi bi-envelope-at"></i> Correo:</h6>
                  <h6 style="color:#19A7CE">
                    <a href="mailto:<?php echo $integrante['email'] ?>"><em><?php echo $integrante['email'] ?></em></a>
                  </h6>
                  <h6><i class="fab fa-linkedin"></i> Linkedln:</h6>
                  <h6 style="color:#19A7CE"><em><a href="<?php echo $integrante['linkedln']; ?>" target="_blank" title="Linkedln"><?php echo $integrante['linkedln'] ?></a></em></h6>
                  <h6><i class="bi bi-person-vcard"></i> Cvlac:</h6>
                  <h6 style="color:#19A7CE"><em><a href="<?php echo $integrante['cvlac']; ?>" target="_blank" title="Linkedln"><?php echo $integrante['cvlac'] ?></a></em></h6>
                  <h6><i class="bi bi-calendar-date"></i> Fecha de ingreso:</h6>
                  <p class="h6 text-dark text-opacity-75">"<?php echo $integrante['fecha_ingreso'] ?>"</p>
                  <h6><i class="bi bi-eye"></i> Estado: <?php if ($integrante['estado'] == 1) : ?>
                      <span class="badge bg-success">Activo</span>
                    <?php else : ?>
                      <span class="badge bg-danger">Inactivo</span>
                    <?php endif; ?>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </body>