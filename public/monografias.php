  <?php
  include('../templates/navbarSecciones.php');
  include_once('../clases/Monografias.php');

  $Monografias = new Monografias();

  $listarMonografias = $Monografias->obtenerMonografias();
  $Integrantes = $Monografias->obtenerIntegrantes();
  ?>
  </header>
  <main>
    <h4 class="container my-5">MONOGRAFIAS</h4>
    <?php foreach ($listarMonografias as $monografia) : ?>
      <div class="container my-5">
        <div class="card col-md-12 p-3 sombras">
          <div class="row">
            <div class="col-md-3">
              <img width="100%" src="../archivos/monografias/img_archivos/<?php echo $monografia['imagen']; ?>"">
            </div>
            <div class=" col-md-8">
              <div class="card-block">
                <a href="../archivos/monografias/<?php echo $monografia['archivo']; ?>" target="_blank">
                  <h6 class="card-title"><?php echo $monografia['titulo'] ?></h6>
                </a>
                <p class="card-subtitulo"><?php echo $monografia['programa']; ?></p>
                <p class="card-fuente"><?php echo $monografia['fecha']; ?></p>
                <p class="card-integrantes">Graduados:</p>
                <?php foreach ($Integrantes as $integrante) {
                  if ($integrante['portafolio_id'] == $monografia['id']) {
                    echo '<p class="card-fuente"><i class="bi bi-check-all"></i>' . $integrante['integrantes'] . '</p>';
                  }
                } ?>
                </p>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </main>
  <?php include '../templates/footer.php'; ?>