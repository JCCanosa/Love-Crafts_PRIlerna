<?php
include_once '../../templates/header.php';
include_once '../../controller/Pedidos.php';
$pedido = new Pedidos();

//Recuperamos la sesión y comprobamos que sea correcta
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: http://localhost/PRIlerna/');
    exit();
}
include_once '../../templates/navUsers.php';

//Recogemos los datos de personalizar y creamos el array
if (isset($_GET['guardarPersonalizar'])) {
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

?>

<h1 class="titulo-usr">Carrito</h1>

<?php
// Si hay contenido en carrito mostramos la tabla
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) { ?>

    <!-- Se oculta cuando el ancho de la pantalla es menor a 769px -->
    <div class="tabla-pedidos">
        <table class="tabla-pedidos-usr">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Imagen</th>
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
    </div>

    <!-- Se muestra cuando el ancho de la pantalla es menor a 769px -->
    <div class="pedidos-usr">
            <?php $pedido->mostrarArticulosSeleccionadosDiv(); ?>
    </div>

<?php } else { ?>

    <!-- Cuando no hay nada mostramos un mensaje -->
    <p class="no-articulos">Debe Seleccionar al menos 1 artículo para continuar</p>

<?php } ?>

<div class="botones-volver-siguiente">
    <a class="btn-volver-siguiente" href="index.php">&larr;</a>
    <a class="btn-volver-siguiente" href="pago.php">&rarr;</a>
</div>









<?php include_once '../../templates/footer.php'; ?>