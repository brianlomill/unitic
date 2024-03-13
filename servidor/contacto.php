<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombres = $_POST['nombres'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    // Verificar que todos los campos necesarios estén completos
    if (!empty($nombres) && !empty($email) && !empty($asunto) && !empty($mensaje)) {
        // Crear el mensaje
        $to = "bdavidlozano@gmail.com";
        $subject = $asunto;
        $message = "De: $nombres <$email>\r\n" .
                   "Mensaje: $mensaje";

        // Enviar el correo electrónico
        if (mail($to, $subject, $message)) {
            // Correo enviado exitosamente
            echo "success";
        } else {
            // Error al enviar el correo
            echo "error";
        }
    } else {
        // Algunos campos están vacíos
        http_response_code(400); // Devolver el código de estado 400
        echo "incomplete";
    }
} else {
    // Acceso inválido al archivo
    echo "error";
}
?>


