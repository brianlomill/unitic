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


//Ruta para guardar las imagenes localmente
$carpeta_destino = "../../../archivos/integrantes/";

//conocer el tipo de extencion del archivo
$tipo_imagen = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

$Integrantes = new Integrantes();

if($tipo_imagen == "png" || $tipo_imagen == "jpg" || $tipo_imagen == "jpeg"){
    if ($Integrantes->ingresarIntegrantes(
    $nombres,
    $apellidos,
    $email,
    $foto,
    $cvlac,
    $linkedin,
    $fecha_ingreso,
    $rol
)){
    // carga la imagen a la carpeta archivos
    move_uploaded_file($_FILES["foto"]["tmp_name"], $carpeta_destino . $foto);
    header("location: ../../modulos/integrantes/index.php");
}else{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
   Debes verificar algunos de esos campos a continuación.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
header("location: ../../modulos/integrantes/index.php");
}
}else{
     echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
   Debes verificar algunos de esos campos a continuación.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
header("location: ../../modulos/integrantes/index.php");
}
?>