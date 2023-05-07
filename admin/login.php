<?php
    require("./bd.php");
?>
<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
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
  <!-- <br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                              <label for="usuario" class="form-label">Usuario</label>
                              <input type="email"
                                class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Correo educativo">
                            </div>

                            <div class="mb-3">
                              <label for="contrasena" class="form-label">Contraseña</label>
                              <input type="password"
                                class="form-control" name="contrasena" id="contrasena" aria-describedby="helpId" placeholder="Contraseña">
                            </div>

                            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Ingresar</a>

                        </form>
                    </div>
                    <div class="card-footer text-muted">
                      
                    </div>
                </div>
            </div>
            
        </div>
    </div> -->
<div class="container-fluid ps-md-0">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                <div class="col-md-8 col-lg-6">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4 text-body bold">Bienvenido Administrador!</h3>
                                        <form method="post" action="">
                                        <div class="form-floating mb-3 text-secondary">
                                            <input type="email" class="form-control" id="floatingInput"  placeholder="name@example.com">
                                            <label for="floatingInput">Correo universitario</label>
                                        </div>
                                    <div class="form-floating mb-3 text-secondary">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <div class="form-check mb-3 text-secondary">
                                        <input class="form-check-input" type="checkbox" value=""    id="rememberPasswordCheck">
                                        <label class="form-check-label" for="rememberPasswordCheck">
                                            <em>Remember password</em>
                                        </label>
                                    </div>

                                    <div class="d-grid">
                                        <!-- <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button> -->
                                         <a name="" id="" class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" href="index.php" role="button">Ingresar</a>
                                        <div class="text-center">
                                            <a class="small" href="#">Olvidó su contraseña ?</a>
                                        </div>
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
</body>

</html>