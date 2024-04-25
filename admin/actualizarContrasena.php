<?php
require('../clases/Conexion.php');
?>
<!doctype html>
<html lang="es">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon del sitio -->
  <link rel="icon" href="../img/logo.webp" type="image/x-icon">
  <title>Semillero UNITIC</title>
  <!-- FONT FAMILY -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <!-- HOJA DE ESTILOS -->
  <link rel="stylesheet" type="text/css" href="../css/stylesAdmin.css">
  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>
  <main>
    
    <div id="main-wrapper" class="login">
      <div class="row justify-content-center">
        <div class="col-xl-10">
          <div class="card border-0">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="mb-5">
                      <h2 class="font-weight-bold text-theme">Actualizar Contraseña</h2>
                    </div>
                    <h5 class="mb-0">Bienvenido Administrador!</h5>
                    <p class="text-muted mt-2 mb-5">Ingrese su contraseña actual y su contraseña nueva para la actualización.</p>
                    <div class="login-form">
                      <form method="POST" action="../servidor/actualizarContrasena.php">
                        <div class="mb-3">
                          <label for="passwordAntigua" class="form-label">Contraseña actual</label>
                          <input type="password" class="form-control" name="passwordAntigua" id="passwordAntigua" placeholder="Ingrese contraseña" required>
                        </div>
                        <?php
                          // Mostrar la alerta si hay un error al actualizar la contraseña
                          if (isset($_GET['error']) && $_GET['error'] == 1) {
                              echo '<div id="errorAlert" class="alert alert-danger alert-dismissible fade show mt-3" role="alert">Contraseña actual incorrecta
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                          }
                          ?>
                        <div class="mb-5">
                          <label for="passwordNueva" class="form-label">Contraseña nueva</label>
                          <input type="password" class="form-control" name="passwordNueva" id="passwordNueva" placeholder="Ingrese contraseña" required>
                        </div>
                        <div class="d-grid gap-2 d-md-flex">
                          <button class="btn btn-lg btn-primary btn-login text-uppercase fw-semibold mb-2" type="submit">Actualizar</button>
                          <button class="btn btn-lg btn-danger btn-login text-uppercase fw-semibold mb-2" type="button" onclick="goBack()">Volver</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 d-none d-lg-inline-block">
                  <div class="account-block rounded-end">
                    <div class="overlay rounded-end"></div>
                    <div class="account-testimonial">
                      <h4 class="text-white mb-4">Semillero Unitic</h4>
                      <p class="lead text-white">"Best investment I made for a long time. Can only recommend it for other users."</p>
                      <p>Admin User</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- fin card-body -->
          </div> <!-- fin card -->
        </div> <!-- fin col -->
      </div> <!-- fin Row -->
    </div>
  </main>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

<script>
    function goBack() {
      // Redirigir al index y quitar cualquier parámetro de error en la URL
      window.location.href = 'index.php';
    }

    setTimeout(function() {
      var errorAlert = document.getElementById('errorAlert');
      if (errorAlert) {
        errorAlert.remove();
      }
    }, 3000); // 3000 milisegundos = 3 segundos
  </script>
</body>

</html>