

<?php
include '../../clases/Integrantes.php';
session_start();

$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$cvlac = $_POST['cvlac'];
$linkedin = $_POST['linkedln'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$fecha_retiro = $_POST['fecha_retiro'];
$rol = "2";
$estado = $_POST['estado'];

$Integrantes = new Integrantes();

if ($Integrantes->editarIntegrantes(
    $id,
    $nombres,
    $apellidos,
    $email,
    $cvlac,
    $linkedin,
    $fecha_ingreso,
    $fecha_retiro,
    $rol,
    $estado
)){
    header("location: ../../modulos/integrantes/index.php");
}else{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
   Debes verificar algunos de esos campos a continuación.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>



