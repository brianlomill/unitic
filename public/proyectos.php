  <?php
  include('../templates/navbarSecciones.php');
  include('../clases/Proyectos.php');

  $proyectos = new Proyectos();

  $ListarProyectos = $proyectos->obtenerProyectos();
  $listarIntegrantes = $proyectos->obtenerIntegrantes();

  ?>

  </header>

  <main>

    <h4 class="container my-5">PROYECTOS</h4>
    <?php foreach ($ListarProyectos as $proyecto) : ?>
      <div class="container my-5">
        <div class="card col-md-12 p-3 sombras">
          <div class="row">
            <div class="col-md-3">
              <a href="../archivos/proyectos/<?php echo $proyecto['archivo']; ?>" target="_blank">
                <img class="img-fluid mx-auto d-block" src="../archivos/proyectos/img_archivos/<?php echo $proyecto['imagen']; ?>">
              </a>
            </div>
            <div class="col-md-8">
              <div class="card-block">
                <a href="../archivos/proyectos/<?php echo $proyecto['archivo']; ?>" target="_blank">
                  <h6 class="card-title"><?php echo $proyecto['titulo'] ?></h6>
                </a>
                <p class="card-subtitulo"><?php echo $proyecto['programa'] ?></p>
                <p class="card-fuente"><?php echo $proyecto['fecha'] ?></p>
                <p class="card-integrantes">Integrantes:</p>
                <?php foreach ($listarIntegrantes as $integrante) {
                  if ($integrante['portafolio_id'] == $proyecto['id']) {
                    echo '<p class="card-fuente"><i class="bi bi-check-all"></i>' . $integrante['integrantes'] . '</p>';
                  }
                } ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </main>
  <?php include '../templates/footer.php'; ?>