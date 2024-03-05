<?php
require('../clases/Conexion.php');
?>
<!doctype html>
<html lang="en">

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
  <link rel="stylesheet" type="text/css" href="../css/stylesNuevo.css">
  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
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
                      <h2 class="font-weight-bold text-theme">Login</h2>
                    </div>
                    <h5 class="mb-0">Bienvenido Administrador!</h5>
                    <p class="text-muted mt-2 mb-5">Ingrese su correo institucional y contraseña para acceder al panel de administración.</p>
                    <div class="login-form">
                      <form method="POST" action="../servidor/logear.php">
                        <div class="mb-3">
                          <label for="admin" class="form-label">Correo universitario</label>
                          <input type="email" class="form-control" id="admin" name="admin" placeholder="name@uniminuto.edu.co" required>
                        </div>
                        <div class="mb-5">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <?php
                        if (isset($_GET['error']) && $_GET['error'] == 1) {
                          echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            Usuario o contraseña incorrectos
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }
                        ?>
                        <!-- <button type="submit" class="btn btn-theme">Login</button>
                        <a href="#l" class="forgot-link float-end text-primary">Forgot password?</a> -->
                        <div class="d-grid gap-2 d-md-flex">
                          <button class="btn btn-lg btn-primary btn-login text-uppercase fw-semibold mb-2" type="submit">Iniciar sesion</button>
                          <button class="btn btn-lg btn-danger btn-login text-uppercase fw-semibold mb-2" type="return" onclick="history.back()">Volver</button>
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

            </div>
            <!-- end card-body -->
          </div>
          <!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- Row -->
    </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
    // Ejemplo de JavaScript inicial para deshabilitar el envío de formularios si hay campos no válidos
    (function() {
      'use strict'

      // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
      var forms = document.querySelectorAll('.needs-validation')

      // Bucle sobre ellos y evitar el envío
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>
</body>

</html>