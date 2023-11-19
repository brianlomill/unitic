<?php
include '../../clases/Ponencias.php';
session_start();
$errors = [];

try {
    $titulo = $_POST['titulo'];
    $evento = $_POST['evento'];
    $fecha = $_POST['fecha'];
    $ciudad = $_POST['ciudad'];
    $descripcion = $_POST['descripcion'];
    $archivo = basename($_FILES["archivo"]["name"]);
    $foto = basename($_FILES["foto"]["name"]);
    $tipo_trabajo = 5;
    $integrantes = $_POST['integrante'];

    // Ruta para guardar las imágenes localmente
    $carpeta_destino = "../../archivos/productos/ponencias/";
    $carpeta_destino_img = "../../archivos/productos/ponencias/img_archivos/";

    // Obtiene el tipo MIME del archivo
    $archivo_temporal = $_FILES["archivo"]["tmp_name"];
    $tipo_archivo = mime_content_type($archivo_temporal);

    // Conocer el tipo de extensión de la imagen
    $tipo_imagen = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

    $Ponencias = new Ponencias();
    $conexion = $Ponencias->obtenerConexion();

    // Verificar formato de archivo
    if (!in_array($tipo_archivo, ["application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"])) {
        throw new Exception("El formato del archivo no es válido. Solo se permiten archivos PDF y DOCX.");
    }

    // Verificar formato de imagen
    if (!in_array($tipo_imagen, ["png", "jpg", "jpeg"])) {
        throw new Exception("El formato de la imagen no es válido. Solo se permiten imágenes en formato PNG, JPG o JPEG.");
    }

    if ($Ponencias->ingresarPonencias(
        $titulo,
        $evento,
        $fecha,
        $ciudad,
        $descripcion,
        $archivo,
        $foto,
        $tipo_trabajo
    )) {
        // Cargar la imagen a la carpeta archivos
        move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $archivo);

        if (!is_dir($carpeta_destino_img)) {
            mkdir($carpeta_destino_img, 0755, true);
        }

        // Verificar si la imagen se ha subido correctamente antes de moverla
        if ($_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
            // Mover la imagen a la carpeta de imágenes
            move_uploaded_file($_FILES["foto"]["tmp_name"], $carpeta_destino_img . $foto);
        } else {
            throw new Exception("Hubo un error al cargar la imagen.");
        }

        // Obtén el ID del proyecto recién insertado
        $ponenciaId = mysqli_insert_id($conexion);

        // Inserta los integrantes
        $Ponencias->ingresarIntegrantesPonencias($ponenciaId, $integrantes);
        $_SESSION['success_message'] = "La ponencia se ha agregado correctamente.";
        header("location: ../../admin/modulos/ponencias/index.php");
        exit;
    } else {
        throw new Exception("Hubo un error al agregar la ponwncia.");
    }
} catch (Exception $e) {
    $_SESSION['error_message'] = "Error al agregar la ponencia: " . $e->getMessage();
    header("location: ../../admin/modulos/ponencias/index.php");
    exit;
}
?>






