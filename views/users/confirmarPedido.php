<?php 
include_once '../../templates/header.php';
include_once '../../controller/Pedidos.php';
$pedido = new Pedidos();

session_start();
if(isset($_POST)){
    foreach ($_SESSION['carrito'] as $id => $item){
        $pedidoPor = $_SESSION['nombre'];
        $articulo = $item['descripcion'];
        $cantidad = $item['cantidad'];
        
        $pedido->guardarPedido($pedidoPor, $articulo, $cantidad);
    }
    //Vaciar carrito
    $_SESSION['carrito'] = [];
}
?>

<div class="container-md contenedor">
    <img class="contenedor-imagen" src="../../img/Logo.png" alt="Logo L&C">
    <h1 class="contenedor-titulo"> Pedido Realizado con Éxito</h1>
    <p class="contenedor-p">
        <?php if(isset($_POST['bizzum'])){ ?>
            Realice el pago vía Bizzum al teléfono: 695530289    
        <?php }else{ ?>
            Para el pago en efectivo debe realizarse un deposito del 20% del total antes de iniciar la fábricación.<br>
            Por favor póngase en contacto con el administrador en el télefono <a class="contenedor-enlace" href="tel:695530289">695530289</a> o a través de nuestro <a class="contenedor-enlace" href="mailto:jcanosa1988@gmail.com">Correo Electrónico</a>
        <?php } ?>
    </p>

    <a class="contenedor-enlace" href="http://localhost/PRIlerna/views/users/">Volver a los Artículos</a>
</div>


<?php include_once '../../templates/footer.php'; ?>