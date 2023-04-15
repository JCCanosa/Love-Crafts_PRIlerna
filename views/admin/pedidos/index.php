<?php 
    include '../../../templates/header.php';
    include '../../../templates/navAdmin.php';
?>

<br>
<h3 class="titulo-vista-admin">Gestión de Pedidos</h3>
<div class="card">
    <div class="card-header">
        <a name="crearPedido" id="crearPedido" class="btn btn-primary" href="crear.php" role="button">Crear Pedido Manualmente</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr class="text-center" style="background-color: #F7F7F7;">
                        <th scope="col">Num. Pedido</th>
                        <th scope="col">Pedido Por</th>
                        <th scope="col">Id Usuario</th>
                        <th scope="col">Desc. Artículo Pedido</th>
                        <th scope="col">Id Artículo</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio U.</th>
                        <th scope="col">Total</th>
                        <th scope="col">Pagado</th>
                        <th scope="col">Entregado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td scope="row">01</td>
                        <td>Alfredo</td>
                        <td>01</td>
                        <td>Lámpara con Nombre</td>
                        <td>01</td>
                        <td>2</td>
                        <td>35€</td>
                        <td>70€</td>
                        <td>Si</td>
                        <td>No</td>
                        <td>
                            <a name="editar" id="editar" class="btn btn-success" href="editar.php" role="button">Editar</a>
                            <a name="eliminar" id="eliminar" class="btn btn-danger" href="#" role="button">Elminar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include '../../../templates/footer.php'; ?>