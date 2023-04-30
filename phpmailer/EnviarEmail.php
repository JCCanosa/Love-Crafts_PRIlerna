<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Importar clases
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

class EnviarEmail
{
    //Email que se envia cuando se registra un usuario
    public function enviarEmailRegistro($email, $nombre, $validador)
    {
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
            echo "<p class='error'>Error al enviar: {$mail->ErrorInfo}</p>";
        }
    }

    //Email para recuperar contraseña
    public function enviarEmailRecuperar($email, $nombre, $validador)
    {
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
            $mail->Subject = 'Recuperar Password';
            $mail->addEmbeddedImage('../img/Logo.png', 'logo_lc');

            $mail->Subject = 'Recupera tu Password';

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
            $contenido .= '<h3 class="titulo">Has solicitado restablecer tu password.</h3>';
            $contenido .= '<a href="http://localhost/PRIlerna/views/recuperar_pass.php?validador=' . $validador . '">Restablecer Password</a>';
            $contenido .= '<p>Si no has sido tu, puedes ignorar este mensaje</p>';
            $contenido .= '</div>';
            $contenido .= '</body>  ';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->send();
            echo '<p class="exito">Revisa tu Correo</p>';
        } catch (Exception $e) {
            echo "<p class='error'>Error al enviar: {$mail->ErrorInfo}</p>";
        }
    }

    //Email que se envia al usuario cuando hace un pedido
    public function enviarEmailPedido($email, $nombre, $metodoPago, $metodoEntrega)
    {
        $mail = new PHPMailer(true);
        $total = 0;

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
            $mail->Subject = 'Confirmación de Pedido';
            $mail->addEmbeddedImage('../../img/Logo.png', 'logo_lc');

            $mail->Subject = 'Pedido Recibido';

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
            $contenido .= 'table{';
            $contenido .= 'border: 1px solid black;';
            $contenido .= 'border-collapse: collapse;';
            $contenido .= '}';
            $contenido .= 'th, td{';
            $contenido .= 'width: 25%;';
            $contenido .= 'padding: 10px;';
            $contenido .= 'text-align: center;';
            $contenido .= '}';
            $contenido .= 'th{';
            $contenido .= 'border-bottom: 1px solid black;';
            $contenido .= 'background-color: lightgray;';
            $contenido .= '}';
            $contenido .= '.totales{';
            $contenido .= 'border-top: 1px solid black;';
            $contenido .= 'background-color: lightgray;';
            $contenido .= 'font-weight: bold;';
            $contenido .= '}';
            $contenido .= '</style>';
            $contenido .= '</head>';
            $contenido .= '<body>';
            $contenido .= '<div class="mensaje">';
            $contenido .= '<img class="imagen" src="cid:logo_lc" alt="Logo L&C">';
            $contenido .= '<h1 class="titulo">Hola ' . $nombre . '!</h1>';
            $contenido .= '<h3 class="titulo">Hemos recibido tu Pedido con &eacute;xito!</h3>';
            $contenido .= '<table>';
            $contenido .= '<thead>';
            $contenido .= '<tr>';
            $contenido .= '<th>Art&iacute;culo</th>';
            $contenido .= '<th>Cantidad</th>';
            $contenido .= '<th>Total</th>';
            $contenido .= '<th>M&eacute;todo de Pago</th>';
            $contenido .= '</tr>';
            $contenido .= '</thead>';
            $contenido .= '<tbody>';

            foreach ($_SESSION['carrito'] as $compra) {
                $subtotal = $compra['cantidad'] * $compra['precio'];
                $total = $total + $subtotal;
                $contenido .= '<tr>';
                $contenido .= '<td>' . $compra['descripcion'] . '</td>';
                $contenido .= '<td>' . $compra['cantidad'] . '</td>';
                $contenido .= '<td>' . $subtotal . '&euro;</td>';
                $contenido .= '<td>' . $metodoPago . '</td>';
                $contenido .= '</tr>';
            }

            $contenido .= '<tr class="totales">';
            $contenido .= '<td colspan="2">Total a pagar</td>';
            $contenido .= '<td></td>';
            $contenido .= '<td>' . $total . '&euro;</td>';
            $contenido .= '</tr>';
            $contenido .= '<tr class="totales">';
            $contenido .= '<td colspan="2">Entrega</td>';
            $contenido .= '<td></td>';
            $contenido .= '<td>' . $metodoEntrega . '</td>';
            $contenido .= '</tr>';
            $contenido .= '</tbody>';
            $contenido .= '<p>No olvide realizar su pago para que podamos poner su pedido en marcha</p>';
            $contenido .= '<p>Cuando tengamos su pedido preparado nos pondremos en contacto con usted</p>';
            $contenido .= '<p>Para cualquier consulta puede contactarnos en el t&eacute;lefono <a href="tel:695530289">695530289</a></p>';
            $contenido .= '<p>O v&iacute;a Correo Electr&oacute;nico a la direcci&oacute;n <a href="mailto:jcanosa1988@gmail.com">jcanosa1988@gmail.com</a></p>';
            $contenido .= '<h4>Muchas Gracias por confiar en Love & Crafts!</h4>';
            $contenido .= '</div>';
            $contenido .= '</body>  ';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->send();
        } catch (Exception $e) {
            echo "<p class='error'>Error al enviar: {$mail->ErrorInfo}</p>";
        }
    }

    //Email que se envia al admin cuando un usuario hace un pedido
    public function enviarEmailAdmin($nombre, $metodoPago, $metodoEntrega, $calle, $numero, $piso_puerta, $cp, $poblacion, $provincia, $comentarios)
    {
        $mail = new PHPMailer(true);
        $total = 0;

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
            $mail->addAddress('admin@loveandcrafts.com', 'Love & Crafts');
            $mail->Subject = 'Nuevo Pedido Recibido';
            $mail->addEmbeddedImage('../../img/Logo.png', 'logo_lc');

            $mail->Subject = 'Nuevo Pedido Recibido';

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
            $contenido .= 'table{';
            $contenido .= 'border: 1px solid black;';
            $contenido .= 'border-collapse: collapse;';
            $contenido .= 'table-layout: fixed;';
            $contenido .= '}';
            $contenido .= 'th, td{';
            $contenido .= 'width: 25%;';
            $contenido .= 'padding: 10px;';
            $contenido .= 'text-align: center;';
            $contenido .= '}';
            $contenido .= 'th{';
            $contenido .= 'border-bottom: 1px solid black;';
            $contenido .= 'border-top: 1px solid black;';
            $contenido .= 'background-color: lightgray;';
            $contenido .= '}';
            $contenido .= '.totales{';
            $contenido .= 'border-top: 1px solid black;';
            $contenido .= 'background-color: lightgray;';
            $contenido .= 'font-weight: bold;';
            $contenido .= '}';
            $contenido .= '.comentarios{';
            $contenido .= 'width:100px;';
            $contenido .= '}';
            $contenido .= '</style>';
            $contenido .= '</head>';
            $contenido .= '<body>';
            $contenido .= '<div class="mensaje">';
            $contenido .= '<img class="imagen" src="cid:logo_lc" alt="Logo L&C">';
            $contenido .= '<h1 class="titulo">Nuevo Pedido de ' . $nombre . '!</h1>';
            $contenido .= '<table>';
            $contenido .= '<thead>';
            $contenido .= '<tr>';
            $contenido .= '<th>Art&iacute;culo</th>';
            $contenido .= '<th>Cantidad</th>';
            $contenido .= '<th>Total</th>';
            $contenido .= '<th>M&eacute;todo de Pago</th>';
            $contenido .= '<th></th>';
            $contenido .= '</tr>';
            $contenido .= '</thead>';
            $contenido .= '<tbody>';

            foreach ($_SESSION['carrito'] as $compra) {
                $subtotal = $compra['cantidad'] * $compra['precio'];
                $total = $total + $subtotal;
                $contenido .= '<tr>';
                $contenido .= '<td>' . $compra['descripcion'] . '</td>';
                $contenido .= '<td>' . $compra['cantidad'] . '</td>';
                $contenido .= '<td>' . $subtotal . '&euro;</td>';
                $contenido .= '<td>' . $metodoPago . '</td>';
                $contenido .= '<td></td>';
                $contenido .= '</tr>';
            }

            $contenido .= '<tr class="totales">';
            $contenido .= '<td colspan="2">Total a pagar</td>';
            $contenido .= '<td></td>';
            $contenido .= '<td>' . $total . '&euro;</td>';
            $contenido .= '<td></td>';
            $contenido .= '</tr>';
            $contenido .= '<tr class="totales">';
            $contenido .= '<td colspan="2">Entrega</td>';
            $contenido .= '<td></td>';
            $contenido .= '<td>' . $metodoEntrega . '</td>';
            $contenido .= '<td></td>';
            $contenido .= '</tr>';

            if (isset($_SESSION['personalizar'])) {
                foreach ($_SESSION['personalizar'] as $personalizar) {
                    $contenido .= '<tr>';
                    $contenido .= '<th>Art&iacute;culo</th>';
                    $contenido .= '<th>Texto</th>';
                    $contenido .= '<th>Color</th>';
                    $contenido .= '<th>Dise&ntilde;o</th>';
                    $contenido .= '<th>Fecha</th>';
                    $contenido .= '</tr>';
                    $contenido .= '<tr>';
                    $contenido .= '<td>' . $personalizar['articulo'] . '</td>';
                    $contenido .= '<td>' . $personalizar['texto'] . '</td>';
                    $contenido .= '<td>' . $personalizar['color'] . '</td>';
                    $contenido .= '<td>' . $personalizar['disenyo'] . '</td>';
                    $contenido .= '<td>' . $personalizar['fecha'] . '</td>';
                    $contenido .= '</tr>';
                }
            }

            $contenido .= '</tbody>';


            if ($metodoEntrega == 'Enviar') {
                $contenido .= '<table>';
                $contenido .= '<thead>';
                $contenido .= '<tr>';
                $contenido .= '<th>Datos de env&iacute;o</th>';
                $contenido .= '</tr>';
                $contenido .= '</thead>';
                $contenido .= '<tbody>';
                $contenido .= '<tr>';
                $contenido .= '<td>' . $calle . ' N&ordm; ' . $numero . ' ' . $piso_puerta . '<br>
                                    ' . $cp . ' ' . $poblacion . '<br>
                                    ' . $provincia . '</td>';
                $contenido .= '</tr>';
                $contenido .= '</tbody>';
            }

            if (!empty($comentarios)) {
                $contenido .= '<table class"comentarios">';
                $contenido .= '<thead>';
                $contenido .= '<tr>';
                $contenido .= '<th>Comentarios</th>';
                $contenido .= '</tr>';
                $contenido .= '</thead>';
                $contenido .= '<tbody>';
                $contenido .= '<tr>';
                $contenido .= '<td class="comentarios">' . $comentarios . '</td>';
                $contenido .= '</tr>';
                $contenido .= '</tbody>';
            }


            $contenido .= '</div>';
            $contenido .= '</body>  ';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->send();
        } catch (Exception $e) {
            echo "<p class='error'>Error al enviar: {$mail->ErrorInfo}</p>";
        }
    }
}
