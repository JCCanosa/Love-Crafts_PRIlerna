<?php
include_once '../../../templates/header.php';
include_once '../../../templates/navAdmin.php';
include_once '../../../templates/alertas.php';
include_once '../../../controller/Pedidos.php';
include_once '../../../controller/Alertas.php';
include_once '../../../model/Cons_Pedidos.php';
$pedido = new Pedidos();
$consultas = new Cons_Pedidos();
$alertas = new Alertas();

//Recuperamos la sesión y comprobamos que sea correcta
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['permisos'] != "1") {
    header('Location: http://localhost/PRIlerna/');
    exit();
}
?>

<!-- Formulario de buscar y mostrar tabla de articulos -->
<br>
<h3 class="titulo-vista-admin">Pedidos</h3>
<div class="card">
    <div class="card-header">
        <div class="buscador-admin">
            <a name="crearPedido" id="crearPedido" class="btn btn-primary" href="crear.php" role="button">Crear Nuevo Pedido</a>
            <form action="index.php" method="get">
                <label for="articulo">Artículo</label>
                <input type="text" name="articulo">
                <label for="pedidoPor">Pedido Por</label>
                <input type="text" name="pedidoPor">
                <label for="pagado">Pagados</label>
                <input type="checkbox" name="pagado" value="1">
                <input class="btn btn-primary" type="submit" name="buscar" value="Buscar">
                <input class="btn btn-primary" type="submit" name="reset" value="Ver Todos">
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-pedidos">
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
                    //Si venimos de editarPedido, validamos datos y actualizamos pedidos
                    if (isset($_POST['editarPedido'])) {
                        $id = intval($_POST['numeroPedido']);
                        $cantidad = intval($_POST['cantidad']);
                        $pagado = intval($_POST['pagado']);
                        $entregado = intval($_POST['entregado']);
                        $validarDatos = $alertas->validarDatosPedidosAct($cantidad);

                        if ($validarDatos) {
                            echo mostrarAlertas($validarDatos);
                        } else {
                            $consultas->editarPedido($id, $cantidad, $pagado, $entregado);
                        }
                    }
                    //Si venimos de eliminarPedido lo eliminamos
                    if (isset($_POST['eliminarPedido'])) {
                        $id = intval($_POST['numeroPedido']);
                        $consultas->eliminarPedido($id);
                    }

                    //Si buscamos por alguno de los campos mostramos la tabla filtrada si no lo mostramos todo
                    if (isset($_GET['buscar'])) {
                        $articulo = $_GET['articulo'];
                        $pedidoPor = $_GET['pedidoPor'];
                        if (isset($_GET['pagado'])) {
                            $pagado = $_GET['pagado'];
                        }

                        if ($pedidoPor) {
                            $pedido->buscarPedidoPorUsuarioAreaAdmin('pedidopor', $pedidoPor);
                        }
                        if ($articulo) {
                            $pedido->buscarPedidoPorUsuarioAreaAdmin('articulopedido', $articulo);
                        }
                        if (isset($pagado)) {
                            $pedido->buscarPedidoPorUsuarioAreaAdmin('pagado', $pagado);
                        } else {
                            $pedido->mostrarPedidos();
                        }
                    } elseif (isset($_GET['reset'])) {
                        $pedido->mostrarPedidos();
                    } else {
                        $pedido->mostrarPedidos();
                    }

                    ?>

                </tbody>
            </table>

        </div>
    </div>

</div>


<?php include '../../../templates/footer.php'; ?>