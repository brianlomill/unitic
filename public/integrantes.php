  <?php
  include('../templates/navbarSecciones.php');
  include('../clases/Integrantes.php');

  $integrantes = new Integrantes();

  $listarIntegrantes = $integrantes->obtenerIntegrantes();

  ?>
  </header>
  <main>

    <h4 class="container my-5">INTEGRANTES</h4>
    <?php foreach ($listarIntegrantes as $integrante) : ?>
      <div class="container my-5">
        <div class="card col-md-12 p-3 sombras <?php echo $integrante['estado'] == 2 ? 'card-inactivo' : ''; ?>">
          <div class="row">
            <div class="col-md-3">
              <img class="img-fluid mx-auto d-block" src="../archivos/integrantes/<?php echo $integrante['foto']; ?>">
            </div>
            <div class="col-md-8">
              <div class="card-block">
                <h6 class="card-title"><?php echo $integrante['nombres'] . " " . $integrante['apellidos'] ?></h6>
                <p class="card-subtitulos-integrantes"><i class="bi bi-envelope-fill"></i> Correo:</p>
                <p class="card-subtitulo">
                  <a href="mailto:<?php echo $integrante['email'] ?>"><em><?php echo $integrante['email'] ?></em></a>
                </h6>
                <p class="card-subtitulos-integrantes"><i class="fab fa-linkedin"></i> Linkedln:</p>
                <p class="card-subtitulo"><em><a href="<?php echo $integrante['linkedln']; ?>" target="_blank" title="Linkedln"><?php echo $integrante['linkedln'] ?></a></em></p>
                <p class="card-subtitulos-integrantes"><i class="bi bi-postcard-fill"></i> Cvlac:</p>
                <p class="card-subtitulo"><em><a href="<?php echo $integrante['cvlac']; ?>" target="_blank" title="Linkedln"><?php echo $integrante['cvlac'] ?></a></em></p>
                <p class="card-subtitulos-integrantes"><i class="bi bi-calendar-date-fill"></i> Fecha de ingreso:</p>
                <p class="card-fuente">"<?php echo $integrante['fecha_ingreso'] ?>"</p>
                <p class="card-subtitulos-integrantes"><i class="bi bi-check-circle-fill"></i> Estado: <?php if ($integrante['estado'] == 1) : ?>
                    <span class="badge bg-success">Activo</span>
                  <?php else : ?>
                    <span class="badge bg-danger card-inactivo">Inactivo</span>
                  <?php endif; ?>
                  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
  </main>
  <?php include '../templates/footer.php'; ?>