<?php

$url_absoluta = "http://localhost/PRIlerna/";

class Mail
{
    public function enviarEmail($email, $nombre, $validador)
    {
        ini_set('SMTP', 'smtp.example.com');
        ini_set('smtp_port', '587');
        
        $to = $email;
        $subject = 'Confirmación de Cuenta';
        $message = 'Haga clic en el siguiente enlace para confirmar su cuenta: http://localhost/PRIlerna/confirmado.php?validador=' . $validador;
        $headers = 'From: admin@lovecrafts.com' . "\r\n" .
        'Reply-To: jcanosa1988@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
}
