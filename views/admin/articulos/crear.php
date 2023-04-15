<?php
include '../../../templates/header.php';
include '../../../templates/navAdmin.php';
include '../../../model/Cons_Articulos.php';
include '../../../controller/Articulos.php';

?>
<br>

<div class="card">
    <div class="card-header">
        Crear Nuevo Artículo
    </div>
    <div class="card-body">

        <form action="crear.php" method="POST" enctype="multipart/form-data">
            <?php

            if (isset($_POST['agregarArticulo'])) {
                guardarImagen();

                guardarArticulo(
                    $_POST['descArticulo'],
                    $_POST['grArticulo'],
                    $_FILES['fotoArticulo']['name'],
                    $_POST['precioArticulo']
                );
            }
            ?>

            <div class="mb-3">
                <label for="descArticulo" class="form-label">Descripción Artículo</label>
                <input type="text" class="form-control" name="descArticulo" id="descArticulo" placeholder="Introduce una descripción para el nuevo artículo">
            </div>

            <div class="mb-3">
                <label for="grArticulo" class="form-label">Grupo</label>
                <select class="form-select form-select-sm" name="grArticulo" id="grArticulo">
                    <option selected value="3D">3D</option>
                    <option value="laser">Láser</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="fotoArticulo" class="form-label">Foto Artículo</label>
                <input type="file" class="form-control" name="fotoArticulo" id="fotoArticulo">
            </div>

            <div class="mb-3">
                <label for="precioArticulo" class="form-label">Precio</label>
                <input type="number" step="any" class="form-control" name="precioArticulo" id="precioArticulo" placeholder="Introduce el Precio del Artículo">
            </div>

            <input type="submit" name="agregarArticulo" class="btn btn-success" value="Agregar Artículo">
            <input type="reset" class="btn btn-danger" value="Cancelar">
            <a href="index.php">Volver a Artículos</a>
        </form>
    </div>

</div>



<?php include '../../../templates/footer.php'; ?>