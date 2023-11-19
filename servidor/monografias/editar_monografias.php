<?php
include '../../clases/Monografias.php';
session_start();

// Validar campos obligatorios
if (empty($_POST['id']) || empty($_POST['titulo']) || empty($_POST['programa']) || empty($_POST['fecha']) || empty($_POST['descripcion']) || empty($_POST['integrantes'])) {
    $_SESSION['error_message'] = "Debes completar todos los campos obligatorios.";
    header("location: ../../admin/modulos/monografias/editar.php?id={$_POST['id']}");
    exit;
}

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$programa = $_POST['programa'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];
$integrantes = $_POST['integrantes'];

try {
    // Actualizar monografia
    $Monografias = new Monografias();
    $conexion = $Monografias->obtenerConexion();
    $Monografias->editarMonografias(
        $id,
        $titulo,
        $programa,
        $fecha,
        $descripcion
    );

    // Luego, llamar a actualizarIntegrantes
    $Monografias->actualizarIntegrantes($id, $integrantes);

    $_SESSION['success_message'] = "La monografia se ha actualizado correctamente.";
    header("location: ../../admin/modulos/monografias/editar.php?id=$id");
    exit;
} catch (Exception $e) {
    $_SESSION['error_message'] = "Error al actualizar monografia: " . $e->getMessage();
    header("location: ../../admin/modulos/monografias/editar.php?id=$id");
    exit;
}
