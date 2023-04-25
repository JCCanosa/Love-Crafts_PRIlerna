<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Importar clases
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

class EnviarEmail
{
    public function enviarEmail($email, $nombre, $validador)
    {
        $url_absoluta = "http://localhost/PRIlerna/";
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP(true);
            $mail->isHTML(true);
            $mail->Host       = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'db4b9f82dcc7bb';
            $mail->Password   = '88be986cd89cb4';
            $mail->SMTPSecure = 'SSL';
            $mail->Port       = 2525;

            //Recipients
            $mail->setFrom('admin@loveandcrafts.com', 'Love & Crafts');
            $mail->addAddress($email, $nombre);
            $mail->Subject = 'Confirmacion de Registro';
            $mail->addEmbeddedImage('../img/Logo.png', 'logo_lc');

            $mail->Subject = 'Confirma tu cuenta';

            $contenido = '<html>';
            $contenido .= '<head>';
            $contenido .= '<style>';
            $contenido .= 'body {';
            $contenido .= 'font-family: Verdana, Geneva, Tahoma, sans-serif;';
            $contenido .= '}';
            $contenido .= '.mensaje {';
            $contenido .= 'display: flex;';
            $contenido .= 'flex-direction: column;';
            $contenido .= 'align-items: center;';
            $contenido .= '}';
            $contenido .= '.imagen {';
            $contenido .= 'width: 150px;';
            $contenido .= 'margin: 0 auto;';
            $contenido .= 'margin-top: 80px;';
            $contenido .= '}';
            $contenido .= '.titulo {';
            $contenido .= 'text-align: center;';
            $contenido .= '}';
            $contenido .= '</style>';
            $contenido .= '</head>';
            $contenido .= '<body>';
            $contenido .= '<div class="mensaje">';
            $contenido .= '<img class="imagen" src="cid:logo_lc" alt="Logo L&C">';
            $contenido .= '<h1 class="titulo">Hola ' . $nombre . '!</h1>';
            $contenido .= '<h3 class="titulo">Te damos la bienvenida a Love & Crafts</h3>';
            $contenido .= '<a href="http://localhost/PRIlerna/views/confirmado.php?validador=' . $validador . '">Confirma tu direcci&oacute;n de correo</a>';
            $contenido .= '</div>';
            $contenido .= '</body>  ';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->send();
            echo '<p class="exito">Revisa tu Correo</p>';
        } catch (Exception $e) {
            echo "<p class='exito'>Error al enviar: {$mail->ErrorInfo}</p>";
        }
    }
}
