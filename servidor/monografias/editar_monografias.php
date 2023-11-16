<?php
include '../../clases/Integrantes.php';
session_start();

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$archivo_existente = $_POST['archivo_existente'];
$archivo_nuevo = $_POST['archivo_nuevo'];
$programa = $_POST['programa'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];
$integrantes = $_POST['integrante'];

$Proyectos = new Proyectos();

// Validar campos obligatorios
if (empty($titulo) || empty($programa) || empty($fecha) || empty($descripcion) || empty($integrantes)) {
    $_SESSION['error_message'] = "Debes completar todos los campos obligatorios.";
    header("location: ../../admin/modulos/proyectos/editar.php?id=$id");
    exit;
}

// Realizar la edición del integrante
try {
    if ($Proyectos->editarProyectos(
        $id,
        $titulo,
        $archivo_existente,
        $archivo_nuevo,
        $programa,
        $fecha,
        $descripcion,
        $integrantes
    )) {
        $_SESSION['success_message'] = "El integrante ha sido editado exitosamente.";
        header("location: ../../admin/modulos/proyectos/index.php");
        exit;
    } else {
        $_SESSION['error_message'] = "Hubo un error al editar el integrante.";
        header("location: ../../admin/modulos/proyectos/editar.php?id=$id");
        exit;
    }
} catch (Exception $e) {
    $_SESSION['error_message'] = "Error: " . $e->getMessage();
    header("location: ../../admin/modulos/proyectos/editar.php?id=$id");
    exit;
}
?>




