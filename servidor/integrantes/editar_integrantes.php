<?php
include '../../clases/Integrantes.php';
session_start();

$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$cvlac = $_POST['cvlac'];
$linkedin = $_POST['linkedin'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$fecha_retiro = $_POST['fecha_retiro'];
$rol = "2";
$estado = $_POST['estado'];

$Integrantes = new Integrantes();

// Validar campos obligatorios
if (empty($nombres) || empty($apellidos) || empty($email) || empty($linkedin) || empty($cvlac)|| empty($fecha_ingreso) || empty($rol)) {
    $_SESSION['error_message'] = "Debes completar todos los campos obligatorios.";
    header("location: ../../admin/modulos/integrantes/editar.php?id=$id");
    exit;
}

// Realizar la edición del integrante
try {
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
    )) {
        $_SESSION['success_message'] = "El integrante ha sido editado exitosamente.";
        header("location: ../../admin/modulos/integrantes/index.php");
        exit;
    } else {
        $_SESSION['error_message'] = "Hubo un error al editar el integrante.";
        header("location: ../../admin/modulos/integrantes/editar.php?id=$id");
        exit;
    }
} catch (Exception $e) {
    $_SESSION['error_message'] = "Error: " . $e->getMessage();
    header("location: ../../admin/modulos/integrantes/editar.php?id=$id");
    exit;
}
?>




