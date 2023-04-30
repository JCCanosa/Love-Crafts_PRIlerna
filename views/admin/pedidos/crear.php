<?php
include_once '../../../templates/header.php';
include_once '../../../templates/navAdmin.php';
include_once '../../../templates/alertas.php';
include_once '../../../controller/Pedidos.php';
$pedido = new Pedidos();
$alertas = new Alertas();

//Recuperamos la sesión y comprobamos que sea correcta
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['permisos'] != "1") {
    header('Location: http://localhost/PRIlerna/');
    exit();
}
?>

<!-- Formulario para crear un pedido manualmente -->
<br>
<div class="card">
    <div class="card-header">
        Crear Nuevo Pedido
    </div>
    <div class="card-body">

        <form action="crear.php" method="POST">
            <?php
            //Si pulsamos agregarPedido validamos datos y guardamos
            if (isset($_POST['agregarPedido'])) {
                $pedidoPor = $_POST['pedidoPor'];
                $articulo = $_POST['articulo'];
                $cantidad = intval($_POST['cantidad']);
                $validarDatos = $alertas->validarDatosPedidos($_POST['pedidoPor'], $_POST['articulo'], intval($_POST['cantidad']));

                if ($validarDatos) {
                    echo mostrarAlertas($validarDatos);
                } else {
                    $pedido->guardarPedido($pedidoPor, $articulo, $cantidad);
                    echo '<p class="exito">Pedido Creado Correctamente</p>';
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