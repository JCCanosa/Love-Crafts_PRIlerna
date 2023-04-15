<?php
include '../../../templates/header.php';
include '../../../templates/navAdmin.php';
include '../../../model/Cons_Articulos.php';
include '../../../controller/Articulos.php';
?>

<br>

<div class="card">
  <div class="card-header">
    Editar Artículo
  </div>
  <div class="card-body">

    <form action="index.php" method="POST" enctype="multipart/form-data">

      <?php
        $id = $_POST['idArt'];
      ?>

      <div class="mb-3">
        <label for="descripcionArticulo" class="form-label">Descripción Artículo</label>
        <input type="text" class="form-control" name="descripcionArticulo" id="descripcionArticulo" placeholder="Introduce una descripción para el nuevo artículo" value="<?php echo $_POST['descArt'] ?>">
      </div>

      <div class="mb-3">
        <label for="grupoArticulo" class="form-label">Grupo</label>
        <select class="form-select form-select-sm" name="grupoArticulo" id="grupoArticulo">
          <?php
          if ($_POST['grupoArt'] == '3D') {
            echo "<option selected value='3D'>3D</option>\n
                    <option value='laser'>Láser</option>";
          } else {
            echo "<option value='3D'>3D</option>\n
                    <option selected value='laser'>Láser</option>";
          }
          ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="fotoArticulo" class="form-label">Foto Artículo</label>
        <br>
        <img width='100' class='img-fluid rounded' src = '../../../images/<?php echo $_POST['imagenArticulo'];?>' alt=''/>
        <br><br>
        <input type="file" class="form-control" name="fotoArticulo" id="fotoArticulo" placeholder="Selecciona una Foto para el Artículo">
      </div>

      <div class="mb-3">
        <label for="precioArticulo" class="form-label">Precio</label>
        <input type="number" step="any" class="form-control" name="precioArticulo" id="precioArticulo" placeholder="Introduce el Precio del Artículo" value="<?php echo $_POST['precioArt'] ?>">
      </div>

      <input type="hidden" name="idArt" value="<?php echo $id; ?>">
      <input type="hidden" name="fotoArticulo" value="<?php echo $_POST['imagenArticulo']; ?>">
      <input type="submit" name="agregarArticulo" class="btn btn-success" value="Editar Artículo">
      <a name="cancelarArticulo" id="cancelarArticulo" class="btn btn-danger" href="index.php" role="button">Cancelar</a>

    </form>
    <?php include '../../../templates/footer.php'; ?>