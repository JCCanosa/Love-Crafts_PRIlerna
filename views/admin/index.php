<?php
include '../../templates/header.php';
include '../../templates/navAdmin.php';
include_once __DIR__ . '/../../controller/Contadores.php';
$contador = new Contadores();

//Recuperamos la sesión y comprobamos que sea correcta
session_start();
if(!isset($_SESSION['nombre']) || $_SESSION['permisos'] != "1"){
  header('Location: http://localhost/PRIlerna/');
  exit();
}
?>

<!-- Mostramos los contadores  -->
<div class="container text-center">
  <a class="contenedor-enlace" href="http://localhost/PRIlerna/views/users">Ir al Panel de Usuarios</a>
  <div class="tarjetas">

    <div class="tarjeta">
      <img src="../../img/orders.svg" class="tarjeta-img-top" alt="Img Usuarios">
      <div class="tarjeta-body">
        <h5 class="tarjeta-title">Pedidos</h5>
        <p class="tarjeta-text"><?php echo $contador->numeroPedidos(); ?></p>
        <p class="tarjeta-text"><?php echo $contador->numeroPedidosPagados(); ?></p>
        <p class="tarjeta-text"><?php echo $contador->numeroPedidosEntregados(); ?></p>
        <a href="pedidos/index.php" class="btn-area-admin">Ver Pedidos</a>
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
        <a href="articulos/index.php" class="btn-area-admin">Ver Artículos</a>
      </div>
    </div>
  </div>
</div>

<?php include '../../templates/footer.php'; ?>