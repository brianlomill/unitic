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
              <img width="100%" src="../archivos/monografias/img_archivos/<?php echo $monografia['imagen']; ?>"">
            </div>
            <div class=" col-md-8">
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
    <?php endforeach; ?>
  </main>
  <?php include '../templates/footer.php'; ?>