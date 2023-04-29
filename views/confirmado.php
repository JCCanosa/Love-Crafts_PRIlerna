<?php
include '../templates/header.php';
include_once '../controller/Usuarios.php';
$usuario = new Usuarios();
?>

<div class="container-md contenedor">
    <img class="contenedor-imagen" src="../img/Logo.png" alt="Logo L&C">
    <h1 class="contenedor-titulo">
        <?php 
            if(isset($_GET['validador'])){
                $validador = $_GET['validador'];
                $usuario->confirmarUsuario($validador);
                header('refresh: 3; http://localhost/PRIlerna/');
            }
        ?>
    </h1>
    <p class="contenedor-p">Está siendo redirigido...</p>

    <a class="contenedor-enlace" href="http://localhost/PRIlerna/">Si no se redirige pulse aquí</a>
</div>

<?php include '../templates/footer.php'; ?>