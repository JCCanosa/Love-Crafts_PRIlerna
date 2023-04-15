<?php 
    include '../../../templates/header.php'; 
    include '../../../templates/navAdmin.php';
?>

<br>
<div class="card">
    <div class="card-header">
        Crear Pedido Manualmente
    </div>
    <div class="card-body">

        <form action="" method="POST">

            <div class="mb-3">
              <label for="numeroPedido" class="form-label">Num. Pedido</label>
              <input type="number" disabled
                class="form-control" name="numeroPedido" id="numeroPedido">
            </div>

            <div class="mb-3">
                <label for="pedidoPorPedido" class="form-label">Pedido Por:</label>
                <select class="form-select form-select-sm" name="pedidoPorPedido" id="pedidoPorPedido">
                    <option selected>Alfredo</option>
                    <option value="">Gerardo</option>
                </select>
            </div>
            
            <div class="mb-3">
              <label for="idUsuarioPedido" class="form-label">Id Usuario</label>
              <input type="number" disabled
                class="form-control" name="idUsuarioPedido" id="idUsuarioPedido">
            </div>

            <div class="mb-3">
                <label for="descArticuloPedido" class="form-label">Des. Artículo Pedido</label>
                <select class="form-select form-select-sm" name="descArticuloPedido" id="descArticuloPedido">
                    <option selected>Lámpara con Nombre</option>
                    <option value="">Llavero Disney</option>
                </select>
            </div>

            <div class="mb-3">
              <label for="idArticuloPedido" class="form-label">Id Artículo</label>
              <input type="number" disabled
                class="form-control" name="idArticuloPedido" id="idArticuloPedido">
            </div>

            <div class="mb-3">
              <label for="cantidadArticulo" class="form-label">Cantidad</label>
              <input type="number"
                class="form-control" name="cantidadArticulo" id="cantidadArticulo">
            </div>

            <div class="mb-3">
              <label for="precioUPedido" class="form-label">Precio U.</label>
              <input type="number" step="any" disabled
                class="form-control" name="precioUPedido" id="precioUPedido">
            </div>

            <div class="mb-3">
              <label for="totalPedido" class="form-label">Total</label>
              <input type="number" step="any" disabled
                class="form-control" name="totalPedido" id="totalPedido">
            </div>

            <div class="mb-3">
                <label for="pagadoPedido" class="form-label">Pagado</label>
                <select class="form-select form-select-sm" name="pagadoPedido" id="pagadoPedido">
                    <option selected>No</option>
                    <option value="">Si</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="entregadoPedido" class="form-label">Entregado</label>
                <select class="form-select form-select-sm" name="entregadoPedido" id="entregadoPedido">
                    <option selected>No</option>
                    <option value="">Si</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Agregar Pedido</button>
            <a name="cancelarArticulo" id="cancelarArticulo" class="btn btn-danger" href="index.php" role="button">Cancelar</a>

        </form>
    </div>
</div>

<?php include '../../../templates/footer.php'; ?>
