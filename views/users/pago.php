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

<h1 class="titulo-usr">Resumen del Pedido</h1>

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
            </tr>
        </thead>
        <?php
        $pedido->mostrarResumen();
        ?>
    </table>

    <form class="form-envio-comentarios" action="confirmarPedido.php" method="POST">
        <label for="entrega">¿Quieres que te enviemos el pedido?</label>
        <span>Envíos a todo el territorio Español</span>
        <select id='opcion' name="entrega">
            <option disbled selected>Seleccione metodo de envio</option>
            <option value="Recoger">Recoger</option>
            <option value="Enviar">Enviar</option>
        </select>

        <div id='formulario-envio' class="formulario-envio">
            <h5>Dirección de Envío</h5>
            <div class="campo-direccion">
                <label for="calle">Calle</label>
                <input type="text" name="calle" placeholder="Calle">
            </div>

            <div class="campo-direccion">
                <label for="numero">Número</label>
                <input type="number" name="numero">
            </div>

            <div class="campo-direccion">
                <label for="piso_puerta">Piso / Puerta</label>
                <input type="text" name="piso_puerta">
            </div>

            <div class="campo-direccion">
                <label for="cp">Código Postal</label>
                <input type="number" name="cp">
            </div>

            <div class="campo-direccion">
                <label for="poblacion">Población</label>
                <input type="text" name="poblacion" placeholder="Población">
            </div>

            <div class="campo-direccion">
                <label for="provincia">Provincia</label>
                <input type="text" name="provincia" placeholder="Provincia">
            </div>
        </div>

        <label for="comentarios">¿Quieres dejarnos algún comentario o sugerencia?</label>
        <textarea class="area-comentarios" name="comentarios" cols="30" rows="10"></textarea>

        <div class="botones-pago">
            <button class='btn-pago' role="submit" name="bizzum" value="Bizzum">
                <img src="../../img/Bizum.svg.png" alt="Bizzum">
            </button>
            <button class='btn-pago' role="submit" name="efectivo" value="Efectivo">Pago en Efectivo</button>
            <span>Efectivo solo disponible para clientes de Lleida y alrededores</span>
        </div>
    </form>

<?php } else { ?>

    <p class="no-articulos">Debe Seleccionar al menos 1 artículo para continuar</p>

<?php } ?>

<div class="botones-volver-siguiente">
    <a class="btn-volver-siguiente" href="carrito.php">&larr;</a>
</div>

<?php include_once '../../templates/footer.php'; ?>