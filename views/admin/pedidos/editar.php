<?php
include '../../../templates/header.php';
include '../../../templates/navAdmin.php';
include_once __DIR__ . '../../../../controller/Pedidos.php';
$pedido = new Pedidos();

//Recuperamos la sesión y comprobamos que sea correcta
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['permisos'] != "1") {
  header('Location: http://localhost/PRIlerna/');
  exit();
}
?>

<!-- Mostramos formulario de editar pedido con los datos cargados -->
<br>
<div class="card">
  <div class="card-header">
    Editar Pedido
  </div>
  <div class="card-body">

    <form action="index.php" method="POST">

      <?php
      $pedido->mostrarUnPedido($_GET['id']);
      ?>

      <input type="submit" name="editarPedido" class="btn btn-success" value="Guardar Cambios">
      <a href="index.php" class="btn btn-danger" role="button">Cancelar</a>
    </form>
  </div>
</div>

<?php include '../../../templates/footer.php'; ?>