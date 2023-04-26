<?php
include_once '../../templates/header.php';
include_once '../../controller/Login.php';
include_once '../../controller/Articulos.php';
include_once '../../controller/Pedidos.php';
$login = new Login();
$articulos = new Articulos();
$pedido = new Pedidos();

session_start();
if(!isset($_SESSION['nombre'])){
    header('Location: http://localhost/PRIlerna/');
    exit();
}

if (isset($_GET['crear-pedido'])) {
    $id = $_GET['id'];
    $cantidad = $_GET['cantidad'];

    $item = $pedido->agregarCarrito($id, $cantidad);

    //Si exite ya el artículo en la sesión añadimos la cantidad seleccionada
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
    } else {
        $_SESSION['carrito'][$id] = $item;
    }
}

?>

<?php include_once '../../templates/navUsers.php'; ?>

<div class="articulos-usuarios">
    <?php echo $articulos->mostrarArticulosUsuarios(); ?>
</div>

<?php include_once '../../templates/footer.php'; ?>