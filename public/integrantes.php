  <?php
  include('../templates/navbarSecciones.php');
  include('../clases/Integrantes.php');

  $integrantes = new Integrantes();

  $listarIntegrantes = $integrantes->obtenerIntegrantes();

  ?>
  </header>
  <main>

    <h5 class="container my-5 h5">INTEGRANTES</h5>
    <?php foreach ($listarIntegrantes as $integrante) : ?>
      <div class="container my-5">
        <div class="card col-md-12 p-3 <?php echo $integrante['estado'] == 2 ? 'card-inactivo' : ''; ?>">
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
                    <span class="badge bg-danger card-inactivo">Inactivo</span>
                  <?php endif; ?>
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
  </main>
  <?php include '../templates/footer.php'; ?>