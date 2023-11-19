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
  <link rel="stylesheet" type="text/css" href="../css/navbar.css">

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>
  <header>
    <?php
    include('../templates/navbarSecciones.php');
    include_once('../clases/Monografias.php');

    $Monografias = new Monografias();

    $listarMonografias = $Monografias->obtenerMonografias();
    $Integrantes = $Monografias->obtenerIntegrantes();
    ?>
  </header>
  <main>
    <h5 class="container my-5">MONOGRAFIAS</h5>
    <?php foreach ($listarMonografias as $monografia) : ?>
      <div class="container my-5">
        <div class="card col-md-12 p-3">
          <div class="row">
            <div class="col-md-3">
              <img width="100%" src="../img/uniminuto.jpg">
            </div>
            <div class="col-md-8">
              <div class="card-block">
              <a href="../archivos/monografias/<?php echo $monografia['archivo']; ?>" target="_blank">
                  <h6 class="card-title h5" style="color:#146C94"><?php echo $monografia['titulo'] ?></h6>
                </a>
                <h6 style="color: #19A7CE; font-style: italic;"><?php echo $monografia['programa']; ?></h6>
                <p class="h6 text-dark text-opacity-75">"<?php echo $monografia['fecha']; ?>"</p>
                <p class="h6 text-dark">Graduados:</p>
                <?php foreach ($Integrantes as $integrante) {
                  if ($integrante['portafolio_id'] == $monografia['id']) {
                    echo '<p class="h6 text-dark text-opacity-75"><i class="bi bi-check-all"></i>' . $integrante['integrantes'] . '</p>';
                  }
                } ?>
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