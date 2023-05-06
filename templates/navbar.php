<!doctype html>
<html lang="en">

<head>
  <!-- ESTILOS -->
  <link rel="stylesheet" type="text/css" href="../css/navbar.css">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../img/logo2.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
            <img src="../img/unitic-estandar.png" alt="" width="150" height="50" class="d-inline-block align-text-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav m-auto" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#container-info">Quienes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#proyectos">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#">Galeria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#integrantes">Integrantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#">Contactenos</a>
                </li>
            </ul>
            <button class="btn btn-outline-warning text-white" type="submit" data-bs-toggle="modal" data-bs-target="#login">Administrador</button>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Administrador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="../login.php">
            <div class="mb-3 text-black">
                <label for="email" class="form-label">Correo universitario</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Usuario">
            </div>
            <div class="mb-3 text-black">
                <label for="InputPassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="contraseña">
            </div>
            <div class="mb-3 form-check text-black">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Recordar contraseña</label>
            </div>
            <button type="submit" class="btn btn-success" name="login">Iniciar sesión</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- End of Page Navbar --> 
  <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script> Alert("esto es una alerta");</script>
</body>

</html>