<?php
include '../../clases/Proyectos.php';
session_start();


$titulo = $_POST['titulo'];
$programa = $_POST['programa'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];
$archivo = basename($_FILES["archivo"]["name"]);
$tipo_trabajo = 1;
$integrantes = $_POST['integrante'];

// Ruta para guardar las imágenes localmente
$carpeta_destino = "../../archivos/proyectos/";

// Obtiene el tipo MIME del archivo
$archivo_temporal = $_FILES["archivo"]["tmp_name"];
$tipo_archivo = mime_content_type($archivo_temporal);

$Proyectos = new Proyectos();

if ($tipo_archivo == "application/pdf" || $tipo_archivo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
    if ($Proyectos->ingresarProyectos(
        $titulo,
        $programa,
        $fecha,
        $descripcion,
        $archivo,
        $tipo_trabajo
    )) {
        // Cargar la imagen a la carpeta archivos
        move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $archivo);
        // Obtén el ID del proyecto recién insertado
        $proyectoId = mysqli_insert_id($Proyectos->obtenerConexion());

        // Inserta los integrantes
        $Proyectos->ingresarIntegrantesPoyectos($proyectoId, $integrantes);
        $_SESSION['success_message'] = "El proyecto se ha agregado correctamente.";
        header("location: ../../admin/modulos/proyectos/index.php");
        exit;
    } else {
        $_SESSION['error_message'] = "Hubo un error al agregar el proyecto.";
        header("location: ../../admin/modulos/proyectos/index.php");
        exit;
    }
} else {
    $_SESSION['error_message'] = "El formato de archivo no es válido. Solo se permiten archivos PDF y DOCX.";
    header("location: ../../admin/modulos/proyectos/index.php");
    exit;
}
?>

