<?php
include_once '../../templates/header.php';
include_once '../../controller/Pedidos.php';
$pedido = new Pedidos();

session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: http://localhost/PRIlerna/');
    exit();
}
include_once '../../templates/navUsers.php';

if(isset($_GET['guardarPersonalizar'])){
    $id = $_GET['id'];
    $texto = $_GET['texto-personalizar'] ?? '';
    $color = $_GET['color'] ?? '';
    $disenyo = $_GET['disenyo'] ?? '';
    $fecha = $_GET['fecha'] ?? '';

    $item = $pedido->agregarPersonalizar($id, $texto, $color, $disenyo, $fecha);

    if (!isset($_SESSION['personalizar'][$texto])) {
        $_SESSION['personalizar'][$id] = $item;
    } else {
        $_SESSION['personalizar'][$id] = $item;
    }
}

var_dump($_SESSION);
?>

<h1 class="titulo-usr">Carrito</h1>

<?php
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) { ?>

    <table class="tabla-pedidos-usr">
        <thead>
            <tr>
                <th colspan='2'>Producto</th>
                <th>Grupo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Personalizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <?php
        $pedido->mostrarArticulosSeleccionados();
        ?>
    </table>

<?php } else { ?>

    <p class="no-articulos">Debe Seleccionar al menos 1 artículo para continuar</p>

<?php } ?>

<div class="botones-volver-siguiente">
    <a class="btn-volver-siguiente" href="index.php">&larr;</a>
    <a class="btn-volver-siguiente" href="pago.php">&rarr;</a>
</div>









<?php include_once '../../templates/footer.php'; ?>