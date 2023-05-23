<?php session_start();
if (!isset($_SESSION['administrador'])) {
  header("location: ../../index.php");
}
include("../../templates/header.php");
include("../../clases/Conexion.php");

// Crear una instancia de la clase Conexion
$conexion = new Conexion();

// Realizar la conexión a la base de datos
$conn = $conexion->conectar();

// Verificar la conexión
if (!$conn) {
  die("Error de conexión: " . mysqli_connect_error());
}

$id = $_GET['id'];
$sql = "SELECT * FROM integrantes WHERE id = '$id'";
$resultado = mysqli_query($conn, $sql);
$fila = mysqli_fetch_assoc($resultado);

?>
<div class="titulo">
  <h3>Integrantes</h3>
</div><br>

<div class="card">
  <div class="card-header fs-3 mb-3 bg-warning text-dark">
    <h5><?php echo $fila['nombres'] . ' ' . $fila['apellidos'] ?></h5>
  </div>
  <div class="card-body">
    <form class="row g-3"  method="post" action="../../servidor/integrantes/editar_integrantes.php">
      <div class="col-md-6">
        <label for="id" class="form-label">id</label>
        <input type="text" name="id" class="form-control" id="id" value="<?php echo $fila['id'] ?>" readonly>
      </div>
      <div class="col-md-6">
        <label for="nombres" class="form-label">Nombres</label>
        <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Ingrese nombres" value="<?php echo $fila['nombres'] ?>">
      </div>
      <div class="col-md-6">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos" value="<?php echo $fila['apellidos'] ?>">
      </div>
      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese correo" value="<?php echo $fila['email'] ?>">
      </div>
      <div class="col-md-6">
        <label for="cvlac" class="form-label">Link Cvlac</label>
        <input type="text" class="form-control" id="cvlac" name="cvlac" placeholder="Ingrese link de cvlac" value="<?php echo $fila['cvlac'] ?>">
      </div>
      <div class="col-md-6">
        <label for="linkedln" class="form-label">Linkedln</label>
        <input type="text" class="form-control" id="linkedln" name="linkedln" placeholder="Ingrese link de linkedln" value="<?php echo $fila['linkedln'] ?>">
      </div>
      <div class="col-md-6">
        <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control" value="<?php echo $fila['fecha_ingreso'] ?>" max="<?php echo date("Y-m-d"); ?>" required>
      </div>
      <div class="col-md-6">
        <label for="fecha_retiro" class="form-label">Fecha de retiro</label>
        <input type="date" id="fecha_retiro" name="fecha_retiro" class="form-control" max="<?php echo date("Y-m-d"); ?>" >
      </div>
      <div class="col-md-6">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" class="form-select" name="estado" value="<?php echo $fila['estado'] ?>">
          <?php
          $sql = "SELECT id, estado FROM estados";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $opcion = $row["estado"];
            echo '<option value="' . $id . '">' . $opcion . '</option>';
          }
          // Cerrar el elemento <select>
          echo '</select>';
          // Cerrar la conexión a la base de datos
          $conn->close();
          ?>

        </select>
      </div>
      <!-- <div class="col-md-6">
        <label for="foto" class="form-label">Subir foto</label>
        <input type="file" name="foto" id="foto" class="form-control" value="<?php echo $fila['foto'] ?>">
      </div> -->
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </form>
  </div>

</div>
<?php include("../../templates/footer.php") ?>