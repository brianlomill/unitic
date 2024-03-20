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

    try {
        if ($auth->updateContrasena($adminId, $passwordAntigua, $passwordNueva)) {
            // La contraseña se actualizó correctamente
            header("location: ../admin/index.php");
            exit();
        }
    } catch (Exception $e) {
        // Ocurrió un error al actualizar la contraseña
        header("location: ../admin/actualizarContrasena.php?error=1");
        exit();
    }
}
?>
