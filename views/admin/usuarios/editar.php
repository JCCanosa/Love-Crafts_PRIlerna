<?php 
  include '../../../templates/header.php';
  include '../../../templates/navAdmin.php';
  include_once __DIR__ . '../../../../controller/Usuarios.php';
  $usuario = new Usuarios();
?>

<br>

<div class="card">
    <div class="card-header">
        Editar Usuario
    </div>
    <div class="card-body">
        <form action="index.php" method="post" name="editar">
            <?php
                $usuario -> mostrarUnUsuario($_GET['id']);
             ?>

            <input type="submit" name="editarUsuario" class="btn btn-success" value="Guardar Cambios">
            <a href="index.php" class="btn btn-danger" role="button">Cancelar</a>
        </form>

    </div>

</div>

<?php include '../../../templates/footer.php'; ?>