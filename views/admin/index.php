<?php
include '../../templates/header.php';
include '../../templates/navAdmin.php';
include_once __DIR__ . '/../../controller/Contadores.php';
$contador = new Contadores();
?>

<br>
<div class="container text-center">
  <div class="tarjetas">

    <div class="tarjeta">
      <img src="../../img/orders.svg" class="tarjeta-img-top" alt="Img Usuarios">
      <div class="tarjeta-body">
        <h5 class="tarjeta-title">Pedidos</h5>
        <p class="tarjeta-text"><?php echo $contador->numeroPedidos(); ?></p>
        <p class="tarjeta-text"><?php echo $contador->numeroPedidosPagados(); ?></p>
        <p class="tarjeta-text"><?php echo $contador->numeroPedidosEntregados(); ?></p>
        <a href="usuarios/index.php" class="btn-area-admin">Ver Pedidos</a>
      </div>
    </div>

    <div class="tarjeta">
      <img src="../../img/users.svg" class="tarjeta-img-top" alt="Img Usuarios">
      <div class="tarjeta-body">
        <h5 class="tarjeta-title">Usuarios</h5>
        <p class="tarjeta-text"><?php echo $contador->mostrarNumeroUsuarios(); ?></p>
        <a href="usuarios/index.php" class="btn-area-admin">Ver Usuarios</a>
      </div>
    </div>

    <div class="tarjeta">
      <img src="../../img/articles.svg" class="tarjeta-img-top" alt="Img Usuarios">
      <div class="tarjeta-body">
        <h5 class="tarjeta-title">Artículos</h5>
        <p class="tarjeta-text"><?php echo $contador->mostrarNumeroArticulos(); ?></p>
        <p class="tarjeta-text"><?php echo $contador->numeroArticulos3d(); ?></p>
        <p class="tarjeta-text"><?php echo $contador->numeroArticulosLaser(); ?></p>
        <a href="usuarios/index.php" class="btn-area-admin">Ver Artículos</a>
      </div>
    </div>

  </div>
</div>

<?php include '../../templates/footer.php'; ?>