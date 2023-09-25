<?php
include '../../clases/Integrantes.php';
session_start();

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$cvlac = $_POST['cvlac'];
$linkedin = $_POST['linkedin'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$foto = basename($_FILES["foto"]["name"]);
$rol = "2";
$estado = "1";

// Ruta para guardar las imágenes localmente
$carpeta_destino = "../../archivos/integrantes/";

// Conocer el tipo de extensión del archivo
$tipo_imagen = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
// Se envia a la archivo clases/integrantes para enviar los datos a la base de datos
$Integrantes = new Integrantes();

if ($tipo_imagen == "png" || $tipo_imagen == "jpg" || $tipo_imagen == "jpeg") {
    if ($Integrantes->ingresarIntegrantes(
        $nombres,
        $apellidos,
        $email,
        $foto,
        $cvlac,
        $linkedin,
        $fecha_ingreso,
        $rol,
        $estado
    )) {
        // Cargar la imagen a la carpeta archivos
        move_uploaded_file($_FILES["foto"]["tmp_name"], $carpeta_destino . $foto);
        $_SESSION['success_message'] = "El integrante se ha agregado correctamente.";
        header("location: ../../admin/modulos/integrantes/index.php");
        exit;
    } else {
        $_SESSION['error_message'] = "Hubo un error al agregar el integrante.";
        header("location: ../../admin/modulos/integrantes/index.php");
        exit;
    }
} else {
    $_SESSION['error_message'] = "El formato de imagen no es válido. Solo se permiten archivos PNG, JPG y JPEG.";
    header("location: ../../admin/modulos/integrantes/index.php");
    exit;
}
?>
