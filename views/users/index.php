<?php
include_once '../../templates/header.php';
include_once '../../controller/Login.php';
include_once '../../controller/Articulos.php';
$login = new Login();
$articulos = new Articulos();


session_start();
// $login->setSession($_SESSION['email']);

// $_SESSION['carrito'] = [];
// var_dump($_SESSION['carrito']);

if (isset($_GET['crear-pedido'])) {
    $id = $_GET['id'];
    $cantidad = $_GET['cantidad'];

    $item = $articulos->agregarCarrito($id, $cantidad);

    //Si exite ya el artículo en la sesión añadimos la cantidad seleccionada
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
    } else {
        $_SESSION['carrito'][$id] = $item;
    }

    var_dump($_SESSION['carrito']);
}

?>

<div class="cabecera-usuario">
    <h1 class="bienvenida">Bienvenido <?php echo $_SESSION['nombre'] ?> !</h1>
    <a href="resumen.php">
        <img class="carrito" src="../../img/cart.svg" alt="Imagen Carrito">
    </a>
</div>


<div class="articulos-usuarios">

    <?php echo $articulos->mostrarArticulosUsuarios(); ?>



</div>







<?php include_once '../../templates/footer.php'; ?>