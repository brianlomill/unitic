<?php
session_start();
include '../../clases/Posters.php';

// Validar campos obligatorios
if (empty($_POST['id']) || empty($_POST['titulo']) || empty($_POST['fecha']) || empty($_POST['ciudad']) || empty($_POST['integrantes'])) {
    $_SESSION['error_message'] = "Debes completar todos los campos obligatorios.";
    header("location: ../../admin/modulos/posters/editar.php?id={$_POST['id']}");
    exit;
}

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$ciudad = $_POST['ciudad'];
$integrantes = $_POST['integrantes']; // Nombre de variable corregido

try {
    // Actualizar proyecto
    $Posters = new Posters();
    $conexion = $Posters->obtenerConexion();
    $Posters->editarPosters(
        $id,
        $titulo,
        $fecha,
        $ciudad,
    );

    // Luego, llamar a actualizarIntegrantes
    $Posters->actualizarIntegrantes($id, $integrantes);

    $_SESSION['success_message'] = "El póster se ha actualizado correctamente.";
    header("location: ../../admin/modulos/posters/editar.php?id=$id");
    exit;
} catch (Exception $e) {
    $_SESSION['error_message'] = "Error al actualizar el póster: " . $e->getMessage();
    header("location: ../../admin/modulos/posters/editar.php?id=$id");
    exit;
}
