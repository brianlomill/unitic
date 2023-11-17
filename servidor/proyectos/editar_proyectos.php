<?php
include '../../clases/Proyectos.php';
session_start();

// Validar campos obligatorios
if (empty($_POST['id']) || empty($_POST['titulo']) || empty($_POST['programa']) || empty($_POST['fecha']) || empty($_POST['descripcion']) || empty($_POST['integrantes'])) {
    $_SESSION['error_message'] = "Debes completar todos los campos obligatorios.";
    header("location: ../../admin/modulos/proyectos/editar.php?id={$_POST['id']}");
    exit;
}

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$programa = $_POST['programa'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];
$integrantes = $_POST['integrantes'];
echo $integrantes;

try {
    // Actualizar proyecto
    $Proyectos = new Proyectos();
    $conexion = $Proyectos->obtenerConexion();
    $Proyectos->editarProyectos(
        $id,
        $titulo,
        $programa,
        $fecha,
        $descripcion
    );

    // Luego, llamar a actualizarIntegrantes
    $Proyectos->actualizarIntegrantes($id, $integrantes);

    $_SESSION['success_message'] = "El proyecto se ha actualizado correctamente.";
    header("location: ../../admin/modulos/proyectos/index.php");
    exit;
} catch (Exception $e) {
    $_SESSION['error_message'] = "Error al actualizar el proyecto: " . $e->getMessage();
    header("location: ../../admin/modulos/proyectos/editar.php?id=$id");
    exit;
}
?>




