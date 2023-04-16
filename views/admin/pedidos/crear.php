<?php 
    include '../../../templates/header.php'; 
    include '../../../templates/navAdmin.php';
    include '../../../templates/alertas.php';
    include '../../../controller/Pedidos.php';
    $pedido = new Pedidos();
    $alertas = new Alertas();
?>

<!-- FALTA PONER JS PARA MOSTAR CAMPO DE TEXTO POR SI UN USUARIO NO ESTÁ REGISTRADO -->

<br>
<div class="card">
    <div class="card-header">
        Crear Nuevo Pedido
    </div>
    <div class="card-body">

        <form action="crear.php" method="POST">
            <?php 
                
                if (isset($_POST['agregarPedido'])) {
                    var_dump($_POST);
                    
                    $pedidoPor = $_POST['pedidoPor'];
                    $articulo = $_POST['articulo'];
                    $cantidad = $_POST['cantidad'];

                    // $desc = $_POST['descArticulo'];
                    // $grupo = $_POST['grArticulo'];
                    // $imagen =  $_FILES['fotoArticulo']['name'];
                    // $precio = $_POST['precioArticulo'];
                    // $validarDatos = $alertas -> validarDatosArticulos($desc, $precio, $grupo);

                    // if($validarDatos){
                    //     echo mostrarAlertas($validarDatos);
                    // } else {
                    //     $archivoImagen = $articulo->guardarImagen();
                    //     $imagen = $archivoImagen;
                    //     $articulo->guardarArticulo($desc, $grupo, $imagen, $precio);
                    // }

                }
            ?>    

            <div class="mb-3">
                <label for="pedidoPor" class="form-label">Pedido Por</label>
                <select class="form-select form-select-sm" name="pedidoPor" id="pedidoPor">
                    <?php 
                        $pedido -> usuariosRegistrados();         
                    ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="articulo" class="form-label">Articulo Pedido</label>
                <select class="form-select form-select-sm" name="articulo" id="articulo">
                    <option selected disabled>Selecciona un Artículo</option>
                    <?php 
                        $pedido -> articulosDisponibles();  
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
