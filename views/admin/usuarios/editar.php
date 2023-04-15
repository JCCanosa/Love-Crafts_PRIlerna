<?php 
  include '../../../templates/header.php';
  include '../../../templates/navAdmin.php';
  include_once __DIR__ . '../../../../controller/Usuarios.php';
?>

<br>
<h3>Editar Usuario</h3>

<div class="card">
    <div class="card-header">
        <br>
    </div>
    <div class="card-body">
        <form action="index.php" method="post" name="editar">
            <?php
                mostrarUnUsuario($_GET['id']);
             ?>

            <input type="submit" name="editarUsuario" class="btn btn-success" value="Guardar Cambios">
        </form>

    </div>

</div>

<?php include '../../../templates/footer.php'; ?>