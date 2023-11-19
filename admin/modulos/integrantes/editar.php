<?php
session_start();
include("../../templates/header.php");
include("../../../clases/Integrantes.php");
include("../../../clases/Estados.php");

// Mostrar mensaje de error si existe
if (isset($_SESSION['error_message'])) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
  echo $_SESSION['error_message'];
  echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
  echo '</div>';
  unset($_SESSION['error_message']); // Limpiar el mensaje de error almacenado en la sesión
}

// Mostrar mensaje de éxito si existe
if (isset($_SESSION['success_message'])) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
  echo $_SESSION['success_message'];
  echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
  echo '</div>';
  unset($_SESSION['success_message']); // Limpiar el mensaje de éxito almacenado en la sesión
}

if (!isset($_SESSION['administrador'])) {
  header("location: ../../index.php");
  exit();
}
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit();
}

// Instancia de la clase Integrantes
$integrantes = new Integrantes();

// Obtener los integrantes
$conn = $integrantes->obtenerIntegrantes();

$id = $_GET['id'];
$listaIntegrantes = $integrantes->obtenerIntegrantes();

// Buscar el integrante por ID en el array
$integrante = null;
foreach ($listaIntegrantes as $item) {
  if ($item['id'] == $id) {
    $integrante = $item;
    break;
  }
}

if ($integrante === null) {
  // El integrante no se encontró en la lista
  header("Location: index.php");
  exit();
}

?>
<div class="titulo">
  <h3>Integrantes</h3>
</div><br>

<div class="card">
  <div class="card-header fs-3 mb-3 bg-warning text-dark">
    <h5><?php echo $integrante['nombres'] . ' ' . $integrante['apellidos'] ?></h5>
  </div>
  <div class="card-body">
    <form class="row g-3" method="POST" action="../../../servidor/integrantes/editar_integrantes.php">
      <div class="col-md-6">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" class="form-control" id="id" value="<?php echo $integrante['id'] ?>" readonly>
      </div>
      <div class="col-md-6">
        <label for="nombres" class="form-label">Nombres</label>
        <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Ingrese nombres" value="<?php echo $integrante['nombres'] ?>">
      </div>
      <div class="col-md-6">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingrese apellidos" value="<?php echo $integrante['apellidos'] ?>">
      </div>
      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese correo" value="<?php echo $integrante['email'] ?>">
      </div>
      <div class="col-md-6">
        <label for="cvlac" class="form-label">Link Cvlac</label>
        <input type="text" class="form-control" id="cvlac" name="cvlac" placeholder="Ingrese link de cvlac" value="<?php echo $integrante['cvlac'] ?>">
      </div>
      <div class="col-md-6">
        <label for="linkedln" class="form-label">Linkedln</label>
        <input type="text" class="form-control" id="linkedln" name="linkedin" placeholder="Ingrese link de linkedln" value="<?php echo $integrante['linkedln'] ?>">
      </div>
      <div class="col-md-6">
        <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control" value="<?php echo $integrante['fecha_ingreso'] ?>" max="<?php echo date("Y-m-d"); ?>" required>
      </div>
      <div class="col-md-6">
        <label for="fecha_retiro" class="form-label">Fecha de retiro</label>
        <input type="date" id="fecha_retiro" name="fecha_retiro" class="form-control" max="<?php echo date("Y-m-d"); ?>">
      </div>
      <div class="col-md-6">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" class="form-select" name="estado">
          <?php
          $estado = new Estado();
          $estados = $estado->obtenerEstados();

          foreach ($estados as $estado) {
            $id = $estado['id'];
            $nombre = $estado['estado'];

            $selected = ($id == $fila['estado']) ? 'selected' : '';

            echo '<option value="' . $id . '" ' . $selected . '>' . $nombre . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-danger">Volver</a>
      </div>
    </form>
  </div>
</div>
<?php include("../../templates/footer.php"); ?>