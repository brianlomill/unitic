<?php
include ('../clases/Auth.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID del administrador y la nueva contraseña del formulario
    $adminId = 1;
    // Suponiendo que tengas guardado el ID del administrador en la sesión
    $passwordAntigua = $_POST['passwordAntigua'];
    $passwordNueva = $_POST['passwordNueva'];

    // Crear una instancia de la clase Auth
    $auth = new Auth();

    if ($auth->updateContrasena($adminId, $passwordAntigua, $passwordNueva)) {
        // La contraseña se actualizó correctamente
        header("location: ../admin/index.php");
        exit();
    } else {
        // Ocurrió un error al actualizar la contraseña
        echo "Error al actualizar la contraseña. Asegúrate de que la contraseña antigua sea correcta.";
        // header("location: ../admin/actualizarContrasena.php?fallo=true");
    }
}
?>


?>