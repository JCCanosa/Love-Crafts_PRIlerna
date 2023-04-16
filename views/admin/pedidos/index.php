<?php
include '../../../templates/header.php';
include '../../../templates/navAdmin.php';
include '../../../templates/alertas.php';
include_once __DIR__ . '../../../../controller/Pedidos.php';
// include_once __DIR__ . '../../../../controller/Alertas.php';
include_once __DIR__ . '../../../../model/Cons_Pedidos.php';
$pedido = new Pedidos();
$consultas = new Cons_Pedidos();
?>

<br>
<h3 class="titulo-vista-admin">Pedidos</h3>
<div class="card">
    <div class="card-header">
        <a name="crearPedido" id="crearPedido" class="btn btn-primary" href="crear.php" role="button">Crear Nuevo Pedido</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr class="text-center" style="background-color: #F7F7F7;">
                        <th scope="col">Id</th>
                        <th scope="col">Pedido Por</th>
                        <th scope="col">Articulo Pedido</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio U.</th>
                        <th scope="col">Total</th>
                        <th scope="col">Pagado</th>
                        <th scope="col">Entregado</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        if (isset($_POST['editarPedido'])) {
                            $id = intval($_POST['numeroPedido']);
                            $cantidad = intval($_POST['cantidad']);
                            $pagado = intval($_POST['pagado']);
                            $entregado = intval($_POST['entregado']);
                            $consultas -> editarPedido($id, $cantidad, $pagado, $entregado); 
                        }
                        if (isset($_POST['eliminarPedido'])) {
                            $id = intval($_POST['numeroPedido']);
                            $consultas->eliminarPedido($id);
                        }
                        $pedido->mostrarPedidos();
                    ?>

                </tbody>
            </table>

        </div>
    </div>

</div>


<?php include '../../../templates/footer.php'; ?>