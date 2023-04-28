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
        <label for="envio">¿Enviar Pedido?</label>
        <span>Envíos a todo el territorio Español</span>
        <select id='opcion' name="envio">
            <option disbled selected>Seleccione metodo de envio</option>
            <option value="Recoger">Recoger</option>
            <option value="Enviar">Enviar</option>
        </select>

        <div id='formulario-envio'>
            <h3>Dirección de Envío</h3>
            <label for="calle">Calle</label>
            <input type="text" name="calle">
            
            <label for="numero">Número</label>
            <input type="number" name="numero">

            <label for="piso_puerta">Piso / Puerta</label>
            <input type="text" name="piso_puerta">

            <label for="cp">Código Postal</label>
            <input type="number" name="cp">

            <label for="poblacion">Población</label>
            <input type="text" name="poblacion">

            <label for="provincia">Provincia</label>
            <input type="text" name="provincia">
        </div>

        <label for="comentarios">¿Quieres dejarnos algún comentario o sugerencia?</label>
        <textarea name="comentarios" cols="30" rows="10"></textarea>
    
        <button role="submit" name="bizzum" value="Bizzum">Bizzum</button>
        <button role="submit" name="efectivo" value="Efectivo">Efectivo</button>
        <span>Efectivo solo disponible para clientes de Lleida y alrededores</span>
    </form>

<?php } else { ?>

    <p>Debe Seleccionar al menos 1 artículo para continuar</p>

<?php } ?>

<a href="carrito.php">Volver</a>

<?php include_once '../../templates/footer.php'; ?>