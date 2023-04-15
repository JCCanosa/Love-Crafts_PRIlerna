<?php
include '../../templates/header.php';
include '../../templates/navAdmin.php';
include_once __DIR__ . '/../../controller/Contadores.php';
?>

<br>
<div class="container text-center">
  <div class="row">

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="../../img/orders.svg" class="card-img-top" alt="Img Usuarios">
        <div class="card-body">
          <h5 class="card-title">Pedidos</h5>
          <p class="card-text"><?php echo mostrartNumeroUsuarios(); ?></p>
          <a href="usuarios/index.php" class="btn btn-primary">Ver Usuarios</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="../../img/articles.svg" class="card-img-top" alt="Img Usuarios">
        <div class="card-body">
          <h5 class="card-title">Artículos</h5>
          <p class="card-text"><?php echo mostrartNumeroArticulos(); ?></p>
          <p class="card-text"><?php echo numeroArticulos3d(); ?></p>
          <p class="card-text"><?php echo numeroArticulosLaser(); ?></p>
          <a href="usuarios/index.php" class="btn btn-primary">Ver Usuarios</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="../../img/users.svg" class="card-img-top" alt="Img Usuarios">
        <div class="card-body">
          <h5 class="card-title">Usuarios</h5>
          <p class="card-text"><?php echo mostrartNumeroUsuarios(); ?></p>
          <a href="usuarios/index.php" class="btn btn-primary">Ver Usuarios</a>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include '../../templates/footer.php'; ?>