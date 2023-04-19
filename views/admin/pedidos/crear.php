<?php
include_once '../../../templates/header.php';
include_once '../../../templates/navAdmin.php';
include_once '../../../templates/alertas.php';
include_once '../../../controller/Pedidos.php';
include_once '../../../model/Cons_Pedidos.php';
$pedido = new Pedidos();
$consultas = new Cons_Pedidos();
$alertas = new Alertas();
?>

<br>
<div class="card">
    <div class="card-header">
        Crear Nuevo Pedido
    </div>
    <div class="card-body">

        <form action="crear.php" method="POST">
            <?php
            if (isset($_POST['agregarPedido'])) {
                $pedidoPor = $_POST['pedidoPor'];
                $articulo = $_POST['articulo'];
                $cantidad = intval($_POST['cantidad']);
                $id_usuario = intval($pedido->getIdUsuario($pedidoPor));
                $id_articulo = intval($pedido->getIdArticulo($articulo));
                $precioU = floatval($pedido->getPrecioArticulo($articulo));
                $total = $cantidad * $precioU;
                $validarDatos = $alertas->validarDatosPedidos($pedidoPor, $articulo, $cantidad);

                if ($validarDatos) {
                    echo mostrarAlertas($validarDatos);
                } else {
                    $consultas->setPedido($id_usuario, $pedidoPor, $id_articulo, $articulo, $cantidad, $precioU, $total, $pagado = 0, $entregado = 0);
                    echo '<p class="exito">Pedido Creado Correctamente</p>';
                    header('refresh: 5; index.php');
                }
            }
            ?>

            <div class="mb-3">
                <label for="pedidoPor" class="form-label">Pedido Por</label>
                <select class="form-select form-select-sm" name="pedidoPor" id="pedidoPor">
                    <option selected value="0">Selecciona un Usuario</option>
                    <?php
                    $pedido->usuariosRegistrados();
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="articulo" class="form-label">Articulo Pedido</label>
                <select class="form-select form-select-sm" name="articulo" id="articulo">
                    <option selected value="0">Selecciona un Artículo</option>
                    <?php
                    $pedido->articulosDisponibles();
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad">
            </div>

            <input type="submit" name="agregarPedido" class="btn btn-success" value="Agregar Pedido">
            <a href="index.php" class="btn btn-danger" role="button">Cancelar</a>

        </form>
    </div>
</div>

<?php include '../../../templates/footer.php'; ?>