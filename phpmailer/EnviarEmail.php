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
    public function enviarEmail($email, $nombre)
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
            $email_template = $url_absoluta . 'phpmailer/registroUsuario.html';

            $username = $nombre;

            $message = file_get_contents($email_template);
            $message = str_replace('%username%', $username, $message);

            $mail->msgHTML($message);


            // if (isset($_POST['registro'])) {
            //     $mail->Subject = 'Bienvenido a Love & Crafts';
            //     $mail->Body = "<h1>Bienvenido a Love & Crafts</h1>\n
            //                     <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta, vero veritatis.\n
            //                     Quibusdam modi porro, nobis quod facere, animi quisquam distinctio voluptatum, dolor \n
            //                     ut natus facilis magnam veritatis iste molestiae cupiditate.</p>";
            // } else {
            //     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            // }

            $mail->send();
            echo '<p class="exito">Revisa tu Correo</p>';
        } catch (Exception $e) {
            echo "<p class='exito'>Error al enviar: {$mail->ErrorInfo}</p>";
        }
    }
}
