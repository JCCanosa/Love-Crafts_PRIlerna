<?php
include_once '../../templates/header.php';
include_once '../../controller/Articulos.php';
$articulo = new Articulos();

session_start();

var_dump($_SESSION);

if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) { ?>
    <h1>Carrito</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <?php
        $articulo->mostrarArticulo();
        ?>
    </table>

<?php } else { ?>

    <h1>Carrito</h1>
    <p>Debe Seleccionar al menos 1 artículo para continuar</p>

<?php } ?>

<a href="index.php">Volver</a>
<a href="#">Siguiente</a>










<?php include_once '../../templates/footer.php'; ?>