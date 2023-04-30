<?php
include_once '../../templates/header.php';
include_once '../../controller/Articulos.php';
include_once '../../controller/Pedidos.php';
$articulos = new Articulos();
$pedido = new Pedidos();

//Recuperamos la sesión y comprobamos que sea correcta
session_start();
if(!isset($_SESSION['nombre'])){
    header('Location: http://localhost/PRIlerna/');
    exit();
}

//Obtenemos los datos de los articulos seleccionados y rellenamos carrito
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

<!-- Formulario buscador -->
<div class="buscador">
    <form class="form-buscador" action="index.php" method="get">
        <label for="articulo">Buscar</label>
        <input type="text" name="articulo">
        <input class="boton-anadir-articulo" type="submit" name="buscar" value="Buscar">
        <input class="boton-anadir-articulo" type="submit" name="reset" value="Ver Todos">
    </form>
</div>

<div class="articulos-usuarios">
    <?php 
        //Si hemos buscado algo lo mostramos si no lo mostramos todo
        if(isset($_GET['buscar'])){
            $articulo = $_GET['articulo'];
            $pedido -> buscadorArticulo($articulo);
        } elseif (isset($_GET['reset'])){
            $articulos->mostrarArticulosUsuarios();
        } else {
            $articulos->mostrarArticulosUsuarios();
        }
    ?>
</div>

<?php include_once '../../templates/footer.php'; ?>