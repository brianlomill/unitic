<?php
session_start();
include("../../templates/header.php");
include("../../../clases/Monografias.php");

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
// Instancia de la clase Monografias
$monografias = new Monografias();

$id = $_GET['id'];
$listarMonografias = $monografias->obtenerMonografias();

// Buscar el proyecto por ID en el array
$monografia = null;
foreach ($listarMonografias as $item) {
  if ($item['id'] == $id) {
    $monografia = $item;
    break;
  }
}

if ($monografia === null) {
  // El proyecto no se encontró en la lista
  header("Location: index.php");
  exit();
}

$listarIntegrantes = $monografias->obtenerIntegrantes();
// Buscar el proyecto por ID en el array

?>
<div class="titulo">
  <h3>Proyectos</h3>
</div><br>

<div class="card">
  <div class="card-header fs-3 mb-3 bg-warning text-dark">
    <h5><?php echo $monografia['titulo'] ?></h5>
  </div>
  <div class="card-body">
    <form class="row g-3 form-crear" method="POST" action="../../../servidor/monografias/editar_monografias.php">
      <div class="col-md-6">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" class="form-control" id="id" value="<?php echo $monografia['id'] ?>" readonly>
      </div>
      <div class="col-md-6">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Ingrese titulo" value="<?php echo $monografia['titulo'] ?>">
      </div>
      <!-- <div class="col-md-6">
        <label for="apellidos" class="form-label">Archivo Existente</label>
        <input type="text" name="archivo_existente" id="archivo_existente" class="form-control" value="<!?php echo $proyecto['archivo'] ?>">
      </div> -->
      <div class="col-md-6">
        <label for="programa" class="form-label">Programa</label>
        <input type="text" name="programa" class="form-control" id="programa" placeholder="Ingrese programa" value="<?php echo $monografia['programa'] ?>">
      </div>
      <div class="col-md-6">
        <label for="fecha" class="form-label">Fecha del proyecto</label>
        <input type="date" id="fecha" name="fecha" class="form-control" value="<?php echo $monografia['fecha'] ?>" max="<?php echo date("Y-m-d"); ?>" required>
      </div>
      <div class="col-md-6">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Ingrese descripción" value="<?php echo $monografia['descripcion'] ?>">
      </div>
      <div class="col-md-6">
        <label for="integrantes" class="form-label">Integrantes</label>
        
        <?php foreach ($listarIntegrantes as $integrante) {
        if ($integrante['portafolio_id'] == $monografia['id']) {
            echo '<input type="text" name="integrantes[]" class="form-control" id="integrantes" value="' . $integrante['integrantes'] . '" placeholder="Ingrese integrantes"> <br>';
        }
    } ?>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-lg btn-primary btn-login text-uppercase fw-semibold mb-2">Actualizar</button>
        <a href="index.php" class="btn btn-lg btn-danger btn-login text-uppercase fw-semibold mb-2">Volver</a>
      </div>
    </form>
  </div>
</div>
<?php include("../../templates/footer.php") ?>