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

<h1>Resumen del Pedido</h1>

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
        $pedido->mostrarResumen();
        ?>
    </table>

    <form action="confirmarPedido.php" method="POST">
        <button role="submit" name="bizzum">Bizzum</button>
        <button role="submit" name="efectivo">Efectivo</button>
        <span>*Efectivo solo disponible para clientes de Lleida y alrededores</span>
    </form>

<?php } else { ?>

    <p>Debe Seleccionar al menos 1 artículo para continuar</p>

<?php } ?>

<a href="carrito.php">Volver</a>

<?php include_once '../../templates/footer.php'; ?>