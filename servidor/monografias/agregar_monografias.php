<?php
include '../../clases/Monografias.php';
session_start();
$errors = [];
try {
    $titulo = $_POST['titulo'];
    $programa = $_POST['programa'];
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    $archivo = basename($_FILES["archivo"]["name"]);
    $foto = basename($_FILES["foto"]["name"]);
    $tipo_trabajo = 1;
    $integrantes = $_POST['integrante'];

    // Ruta para guardar las imágenes localmente
    $carpeta_destino = "../../archivos/monografias/";
    $carpetaDestinoImg = "../../archivos/monografias/img_archivos/";

    // Obtiene el tipo MIME del archivo
    $archivo_temporal = $_FILES["archivo"]["tmp_name"];
    $tipo_archivo = mime_content_type($archivo_temporal);

    // Conocer el tipo de extensión de la imagen
    $tipo_imagen = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

    $Monografias = new Monografias();

    // Verificar formato de archivo
    if (!($tipo_archivo == "application/pdf" || $tipo_archivo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")) {
        throw new Exception("El formato del archivo no es válido. Solo se permiten archivos PDF y DOCX.");
    }

    // Verificar formato de imagen
    if (!($tipo_imagen == "png" || $tipo_imagen == "jpg" || $tipo_imagen == "jpeg")) {
        throw new Exception("El formato de la imagen no es válido. Solo se permiten imágenes en formato PNG, JPG o JPEG.");
    }

    if ($Monografias->ingresarMonografias(
        $titulo,
        $programa,
        $fecha,
        $descripcion,
        $archivo,
        $foto,
        $tipo_trabajo
    )) {
        // Cargar la imagen a la carpeta archivos
        move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $archivo);

        if (!is_dir($carpetaDestinoImg)) {
            mkdir($carpetaDestinoImg, 0755, true);
        }

        // Verificar si la imagen se ha subido correctamente antes de moverla
        if ($_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
            // Mover la imagen a la carpeta de imágenes
            move_uploaded_file($_FILES["foto"]["tmp_name"], $carpetaDestinoImg . $foto);
        } else {
            throw new Exception("Hubo un error al cargar la imagen.");
        }

        // Obtén el ID del proyecto recién insertado
        $monografiaID = mysqli_insert_id($Monografias->obtenerConexion());

        // Inserta los integrantes
        $Monografias->ingresarIntegrantesMonografias($monografiaID, $integrantes);
        $_SESSION['success_message'] = "El proyecto se ha agregado correctamente.";
        header("location: ../../admin/modulos/monografias/index.php");
        exit;
    } else {
        throw new Exception("Hubo un error al agregar el proyecto.");
    }
} catch (Exception $e) {
    $_SESSION['error_message'] = $e->getMessage();
    header("location: ../../admin/modulos/monografias/index.php");
    exit;
}

?>






