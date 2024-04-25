  <?php
  include('../templates/navbarSecciones.php');
  include('../clases/Proyectos.php');

  $proyectos = new Proyectos();

  $ListarProyectos = $proyectos->obtenerProyectos();
  $listarIntegrantes = $proyectos->obtenerIntegrantes();

  ?>

  </header>

  <main>

    <h5 class="container my-5">PROYECTOS</h5>
    <?php foreach ($ListarProyectos as $proyecto) : ?>
      <div class="container my-5">
        <div class="card col-md-12 p-3">
          <div class="row">
            <div class="col-md-3">
              <a href="../archivos/proyectos/<?php echo $proyecto['archivo']; ?>" target="_blank">
                <img class="img-fluid mx-auto d-block" src="../archivos/proyectos/img_archivos/<?php echo $proyecto['imagen']; ?>">
              </a>
            </div>
            <div class="col-md-8">
              <div class="card-block">
                <a href="../archivos/proyectos/<?php echo $proyecto['archivo']; ?>" target="_blank">
                  <h6 class="card-title h5" style="color:#146C94"><?php echo $proyecto['titulo'] ?></h6>
                </a>
                <h6 style="color: #19A7CE; font-style: italic;"><?php echo $proyecto['programa'] ?></h6>
                <p class="h6 text-dark text-opacity-75">"<?php echo $proyecto['fecha'] ?>"</p>
                <p class="h6 text-dark">Integrantes:</p>
                <?php foreach ($listarIntegrantes as $integrante) {
                  if ($integrante['portafolio_id'] == $proyecto['id']) {
                    echo '<p class="h6 text-dark text-opacity-75"><i class="bi bi-check-all"></i>' . $integrante['integrantes'] . '</p>';
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