  <?php
  include('../templates/navbarSecciones.php');
  include('../clases/Ponencias.php');

  $Ponencias = new Ponencias();

  $listarPonencias = $Ponencias->obtenerPonencias();
  $listarIntegrantes = $Ponencias->obtenerIntegrantes();
  ?>

  </header>

  <main>

    <h4 class="container my-5">PONENCIAS</h4>
    <?php foreach ($listarPonencias as $ponencia) : ?>
      <div class="container my-5">
        <div class="card col-md-12 p-3 sombras">
          <div class="row">
            <div class="col-md-3">
              <img width="100%" src="../img/campus.webp">
            </div>
            <div class="col-md-8">
              <div class="card-block">
                <a href="../archivos/productos/ponencias/<?php echo $ponencia['archivo']; ?>" target="_blank">
                  <h6 class="card-title"><?php echo $ponencia['titulo'] ?></h6>
                </a>
                <p class="card-subtitulo">
                  <?php echo $ponencia['evento']; ?>
                </p>
                <p class="card-fuente"><?php echo $ponencia['fecha'] . " - " . $ponencia['ciudad'];; ?></p>
                <p class="card-integrantes">Ponentes:</p>
                <?php foreach ($listarIntegrantes as $integrante) {
                  if ($integrante['portafolio_id'] == $ponencia['id']) {
                    echo '<p class="card-fuente"><i class="bi bi-check-all"></i>' . $integrante['integrantes'] . '</p>';
                  }
                } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </main>
  <?php include '../templates/footer.php'; ?>