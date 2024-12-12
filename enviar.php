<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    $intereses = isset($_POST['interes']) ? implode(", ", $_POST['interes']) : "No especificado";

    // Validar correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico inválido.";
        exit;
    }

    // Configuración del correo
    $para = "contacto@automatiz.com.ar"; // Cambia esto por tu correo
    $asunto = "Nuevo mensaje desde contacto web";
    $cuerpo = "
        <h2>Nuevo Mensaje de Contacto</h2>
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Correo Electrónico:</strong> $email</p>
        <p><strong>Intereses:</strong> $intereses</p>
        <p><strong>Mensaje:</strong></p>
        <p>$mensaje</p>
    ";
    $cabeceras = "MIME-Version: 1.0" . "\r\n";
    $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $cabeceras .= "From: $email" . "\r\n";

    // Enviar correo
    if (mail($para, $asunto, $cuerpo, $cabeceras)) {
        echo "Muchas gracias, mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje. Inténtalo más tarde.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

