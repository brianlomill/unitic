<?php
    require('../clases/Conexion.php');
?>
<!doctype html>
<html lang="en">

<head>
  <title>Actualizar Contraseña</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link href="../css/styles.css" rel="stylesheet">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image">
            </div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4 text-body bold">Actualizar Contraseña</h3>
                                <form method="post" action="../servidor/actualizarContrasena.php" class="needs-validation" novalidate>
                                    <div class="form-floating mb-3 text-secondary">
                                        <input type="password" class="form-control" name="passwordAntigua" id="contrasena" placeholder="Password" required>
                                        <label for="contrasena">Contraseña actual</label>
                                        <div class="invalid-feedback">
                                          Escriba la contraseña
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3 text-secondary">
                                        <input type="password" class="form-control" name="passwordNueva" id="contrasena" placeholder="Password" required>
                                        <label for="contrasena">Nueva Contraseña</label>
                                        <div class="invalid-feedback">
                                          Escriba la contraseña
                                        </div>
                                    </div>
                                    <?php
                                        if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
                                        {
                                            echo "<div style='color:red'>Usuario o contraseña invalido </div> <br/>";
                                        }
                                    ?>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Actualizar</button>
                                        <button class="btn btn-lg btn-danger btn-login text-uppercase fw-bold mb-2" type="return" onclick="history.back()">Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
  // Ejemplo de JavaScript inicial para deshabilitar el envío de formularios si hay campos no válidos
(function () {
  'use strict'

  // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
  var forms = document.querySelectorAll('.needs-validation')

  // Bucle sobre ellos y evitar el envío
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
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