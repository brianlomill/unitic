<?php
include '../../clases/Ponencias.php';
session_start();

// Validar campos obligatorios
if (empty($_POST['id']) || empty($_POST['titulo']) || empty($_POST['programa']) || empty($_POST['fecha'])|| empty($_POST['ciudad'])  || empty($_POST['descripcion']) || empty($_POST['integrantes'])) {
    $_SESSION['error_message'] = "Debes completar todos los campos obligatorios.";
    header("location: ../../admin/modulos/monografias/editar.php?id={$_POST['id']}");
    exit;
}

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$programa = $_POST['programa'];
$fecha = $_POST['fecha'];
$ciudad = $_POST['ciudad'];
$descripcion = $_POST['descripcion'];
$integrantes = $_POST['integrantes'];

try {
    // Actualizar proyecto
    $Ponencias = new Ponencias();
    $conexion = $Monografias->obtenerConexion();
    $Ponencias->editarPonencias(
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
    header("location: ../../admin/modulos/monografias/monografias.php?id=$id");
    exit;
}
