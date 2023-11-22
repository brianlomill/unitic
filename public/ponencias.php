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
  <link rel="stylesheet" type="text/css" href="../css/stylesPortafolio.css">

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>

  <header>

    <?php
    include('../templates/navbarSecciones.php');
    include('../clases/Ponencias.php');

    $Ponencias = new Ponencias();

    $listarPonencias = $Ponencias->obtenerPonencias();
    $listarIntegrantes = $Ponencias->obtenerIntegrantes();
    ?>

  </header>

  <main>

    <h5 class="container my-5">PONENCIAS</h5>
    <?php foreach ($listarPonencias as $ponencia) : ?>
      <div class="container my-5">
        <div class="card col-md-12 p-3">
          <div class="row">
            <div class="col-md-3">
              <img width="100%" src="../img/campus.webp">
            </div>
            <div class="col-md-8">
              <div class="card-block">
              <a href="../archivos/productos/<?php echo $ponencia['archivo']; ?>" target="_blank">
                  <h6 class="card-title h5" style="color:#146C94"><?php echo $ponencia['titulo'] ?></h6>
                </a>
                <h6 style="color: #19A7CE; font-style: italic;">
                  <?php echo $ponencia['titulo'] . " - " . $ponencia['ciudad'] . " " . $ponencia['fecha']; ?>
                </h6>
                <p class="h6 text-dark text-opacity-75">"<?php echo $ponencia['evento']; ?>"</p>
                <p class="h6 text-dark">Ponentes:</p>
                <?php foreach ($listarIntegrantes as $integrante) {
                  if ($integrante['portafolio_id'] == $ponencia['id']) {
                    echo '<p class="h6 text-dark text-opacity-75"><i class="bi bi-check-all"></i>' . $integrante['integrantes'] . '</p>';
                  }
                } ?>
                <p class="h6 text-dark">Descripción del evento:</p>
                <p class="h6 text-dark text-opacity-75"><i class="bi bi-check-all"></i><?php echo $ponencia['ciudad']; ?></p>
                <p class="h6 text-dark text-opacity-75"><i class="bi bi-check-all"></i>
                <?php
                  $fecha = $ponencia['fecha']; // Tu fecha completa aquí
                  $ano = date('Y', strtotime($fecha));
                  echo $ano;
                  ?>
                </p>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    endforeach;
    include '../templates/footer.php';
    ?>
  </main>