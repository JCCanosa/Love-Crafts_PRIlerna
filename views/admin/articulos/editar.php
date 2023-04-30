<?php
include '../../../templates/header.php';
include '../../../templates/navAdmin.php';

//Recuperamos la sesión y comprobamos que sea correcta
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['permisos'] != "1") {
  header('Location: http://localhost/PRIlerna/');
  exit();
}
?>

<!-- Formulario de editar articulo con los datos cargados -->
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
                    <option value='Laser'>Láser</option>";
          } else {
            echo "<option value='3D'>3D</option>\n
                    <option selected value='Laser'>Láser</option>";
          }
          ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="fotoArticulo" class="form-label">Foto Artículo</label>
        <br>
        <img width='100' class='img-fluid rounded' src='../../../images/<?php echo $_POST['imagenArticulo']; ?>' alt='' />
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
      <a name="cancelarArticulo" id="cancelarArticulo" class="btn btn-danger" href="index.php">Cancelar</a>

    </form>
    <?php include '../../../templates/footer.php'; ?>