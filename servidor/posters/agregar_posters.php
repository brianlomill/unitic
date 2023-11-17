<?php
include '../../clases/Posters.php';
session_start();
$errors = [];

try {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $ciudad = $_POST['ciudad'];
    $poster = basename($_FILES["poster"]["name"]);
    $img = basename($_FILES["img"]["name"]);
    $tipo_trabajo = 3;
    $integrantes = $_POST['integrante'];

    // Ruta para guardar las imágenes localmente
    $carpeta_destino = "../../archivos/productos/posters/";
    $carpeta_destino_img = "../../archivos/productos/posters/";

    // Conocer el tipo de extensión de la imagen
    $tipo_poster = strtolower(pathinfo($poster, PATHINFO_EXTENSION));

    // Conocer el tipo de extensión de la imagen
    $tipo_imagen = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    // Verificar formato de imagen
    if (!in_array($tipo_imagen, ["png", "jpg", "jpeg"]) || !in_array($tipo_poster, ["png", "jpg", "jpeg"])) {
        throw new Exception("El formato de la imagen no es válido. Solo se permiten imágenes en formato PNG, JPG o JPEG.");
    }


    $Posters = new Posters();
    $conexion = $Posters->obtenerConexion();

    if ($Posters->ingresarPosters(
        $titulo,
        $fecha,
        $ciudad,
        $poster,
        $img,
        $tipo_trabajo
    )) {
        // Cargar la imagen a la carpeta archivos
        move_uploaded_file($_FILES["poster"]["tmp_name"], $carpeta_destino . $poster);

        if (!is_dir($carpeta_destino_img)) {
            mkdir($carpeta_destino_img, 0755, true);
        }

        // Verificar si la imagen se ha subido correctamente antes de moverla
        if ($_FILES["img"]["error"] === UPLOAD_ERR_OK) {
            // Mover la imagen a la carpeta de imágenes
            move_uploaded_file($_FILES["img"]["tmp_name"], $carpeta_destino_img . $img);
        } else {
            throw new Exception("Hubo un error al cargar la imagen.");
        }

        // Obtén el ID del poster recién insertado
        $posterID = mysqli_insert_id($conexion);

        // Inserta los integrantes
        $Posters->ingresarIntegrantesPosters($posterID, $integrantes);
        $_SESSION['success_message'] = "El poster se ha agregado correctamente.";
        header("location: ../../admin/modulos/posters/index.php");
        exit;
    } else {
        throw new Exception("Hubo un error al agregar el poster.");
    }
} catch (Exception $e) {
    $_SESSION['error_message'] = "Error al agregar el poster: " . $e->getMessage();
    header("location: ../../admin/modulos/posters/index.php");
    exit;
}
