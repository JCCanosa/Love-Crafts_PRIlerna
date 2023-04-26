<?php
include_once '../../templates/header.php';
include_once '../../controller/Pedidos.php';
$pedido = new Pedidos();

session_start();
if(!isset($_SESSION['nombre'])){
    header('Location: http://localhost/PRIlerna/');
    exit();
}

include_once '../../templates/navUsers.php';
?>

<h1>Carrito</h1>

<?php
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) { ?>

    <table>
        <thead>
            <tr>
                <th colspan='2'>Producto</th>
                <th>Grupo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <?php
        $pedido->mostrarArticulosSeleccionados();
        ?>
    </table>

<?php } else { ?>

    <p>Debe Seleccionar al menos 1 artículo para continuar</p>

<?php } ?>

<a href="index.php">Volver</a>
<a href="pago.php">Siguiente</a>










<?php include_once '../../templates/footer.php'; ?>