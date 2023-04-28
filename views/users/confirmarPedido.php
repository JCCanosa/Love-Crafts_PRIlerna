<?php 
include_once '../../templates/header.php';
include_once '../../controller/Pedidos.php';
include_once '../../phpmailer/EnviarEmail.php';
$mail = new EnviarEmail();
$pedido = new Pedidos();

session_start();
if(isset($_POST)){
    foreach ($_SESSION['carrito'] as $compra){
        $pedidoPor = $_SESSION['nombre'];
        $email = $_SESSION['email'];
        $articulo = $compra['descripcion'];
        $cantidad = $compra['cantidad'];

        if(isset($_POST['bizzum'])){
            $metodoPago = $_POST['bizzum'];
        } elseif (isset($_POST['efectivo'])){
            $metodoPago = $_POST['efectivo'];
        }

        var_dump($_POST);

        // $pedido->guardarPedido($pedidoPor, $articulo, $cantidad);
    }

    // Enviar email de resumen
    // $mail->enviarEmailPedido($email, $pedidoPor, $metodoPago);
    
    // Vaciar carrito
    // $_SESSION['carrito'] = [];
}
?>

<div class="container-md contenedor">
    <img class="contenedor-imagen" src="../../img/Logo.png" alt="Logo L&C">
    <h1 class="contenedor-titulo"> Pedido Realizado con Éxito</h1>
    <p class="contenedor-p">
        Le hemos enviado un correo con el resumen del pedido<br>
        <?php if(isset($_POST['bizzum'])){ ?>
            Realice el pago vía Bizzum al teléfono <a class="contenedor-enlace" href="tel:695530289">695530289</a><br>
            Una vez recibido su pago nos pondremos en marcha con el pedido<br>
            
        <?php }else{ ?>
            Para el pago en efectivo debe realizarse un deposito del 20% del total antes de iniciar la fábricación.<br>
            Por favor póngase en contacto con el administrador en el télefono <a class="contenedor-enlace" href="tel:695530289">695530289</a> o a través de nuestro <a class="contenedor-enlace" href="mailto:jcanosa1988@gmail.com">Correo Electrónico</a><br>
            
        <?php } ?>
        <h4 class="contenedor-h">Muchas Gracias!</h4>
    </p>

    <a class="contenedor-enlace" href="http://localhost/PRIlerna/views/users/">Volver a los Artículos</a>
</div>


<?php include_once '../../templates/footer.php'; ?>