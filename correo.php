<?php

include "vendor/autoload.php";

$nombre = trim(strip_tags($_POST['nombre']));
$correo = trim(strip_tags($_POST['correo']));
$asunto = trim(strip_tags($_POST['asunto']));
$mensaje = trim(strip_tags($_POST['mensaje']));

if (empty($nombre) || empty($correo) || empty($asunto) || empty($mensaje)) {
    ?>
    <script type="text/javascript">
        alert("¡Complete los campos antes de enviar un correo!");
        location.href = "index";
    </script>
    <?php
} else {

    $to = 'lfernando@integrador-technology.mx'; // aqui coloca el email de quien recibira el correo
    $from_email = 'lfernando@integrador-technology.mx'; // $_POST[email]
    $subject = 'Correo recibido desde la web de Integrador';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: $from_email" . "\r\n" .
        "Reply-To: $from_email" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();
    $message = '<body><p>Este es un <strong> mensaje recibido desde la web de Central-mx.com</strong>.</p>
<p>Nombre: ' . $nombre . '</p>
<p>Asunto: ' . $asunto . '</p>
<p>Mensaje: ' . $mensaje . '</p>
<p>Mensaje enviado desde el correo: ' . $correo . '</p>
<p></a></p></body>';
    mail($to, $subject, $message, $headers);

    ?>
    <script type="text/javascript">
        alert("Mensaje enviado!");
        location.href = "index";
    </script>

    <?php
}
?>