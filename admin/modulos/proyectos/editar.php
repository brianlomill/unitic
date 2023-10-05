<?php
session_start();
include("../../templates/header.php");
include("../../../clases/Proyectos.php");

if (isset($_SESSION['error_message'])) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
  echo $_SESSION['error_message'];
  echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
  echo '</div>';
  unset($_SESSION['error_message']); // Limpiar el mensaje de error almacenado en la sesión
}

if (!isset($_SESSION['administrador'])) {
  header("location: ../../index.php");
  exit();
}
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit();
}

// Instancia de la clase Proyectos
$proyectos = new Proyectos();

// Obtener los proyectos
$conn = $proyectos->obtenerProyectos();

$id = $_GET['id'];
$listarProyectos = $proyectos->obtenerProyectos();

// Buscar el proyecto por ID en el array
$proyecto = null;
foreach ($listarProyectos as $item) {
  if ($item['id'] == $id) {
    $proyecto = $item;
    break;
  }
}

if ($proyecto === null) {
  // El proyecto no se encontró en la lista
  header("Location: index.php");
  exit();
}

$listarIntegrantes = $proyectos->obtenerIntegrantes();
// Buscar el proyecto por ID en el array

?>
<div class="titulo">
  <h3>Proyectos</h3>
</div><br>

<div class="card">
  <div class="card-header fs-3 mb-3 bg-warning text-dark">
    <h5><?php echo $proyecto['titulo'] ?></h5>
  </div>
  <div class="card-body">
    <form class="row g-3" method="post" action="../../../servidor/proyectos/editar_proyectos.php">
      <div class="col-md-6">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" class="form-control" id="id" value="<?php echo $proyecto['id'] ?>" readonly>
      </div>
      <div class="col-md-6">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Ingrese titulo" value="<?php echo $proyecto['titulo'] ?>">
      </div>
      <div class="col-md-6">
        <label for="apellidos" class="form-label">Archivo Existente</label>
        <input type="text" name="archivo_existente" id="archivo_existente" class="form-control" value="<?php echo $proyecto['archivo'] ?>">
      </div>
      <div class="col-md-6">
        <label for="apellidos" class="form-label">Archivo Nuevo</label>
        <input type="file" name="archivo_nuevo" id="archivo_nuevo" class="form-control" value="<?php echo $proyecto['archivo'] ?>">
      </div>
      <div class="col-md-6">
        <label for="programa" class="form-label">Programa</label>
        <input type="text" name="programa" class="form-control" id="programa" placeholder="Ingrese programa" value="<?php echo $proyecto['programa'] ?>">
      </div>
      <div class="col-md-6">
        <label for="fecha" class="form-label">Fecha del proyecto</label>
        <input type="date" id="fecha" name="fecha" class="form-control" value="<?php echo $proyecto['fecha'] ?>" max="<?php echo date("Y-m-d"); ?>" required>
      </div>
      <div class="col-md-6">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" name="descripcion" class="form-control" id="programa" placeholder="Ingrese descripción" value="<?php echo $proyecto['descripcion'] ?>">
      </div>
      <div class="col-md-6">
        <label for="integrantes" class="form-label">Integrantes</label>
        
        <?php foreach ($listarIntegrantes as $integrante) {
        if ($integrante['portafolio_id'] == $proyecto['id']) {
            echo '<input type="text" name="integrantes[]" class="form-control" id="integrantes" value="' . $integrante['integrantes'] . '" placeholder="Ingrese integrantes"> <br>';
        }
    } ?>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" onclick="history.back()">Volver</button>
      </div>
    </form>
  </div>
</div>
<?php include("../../templates/footer.php") ?>