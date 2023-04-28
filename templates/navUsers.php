<div class="cabecera-usuario">
    <h1 class="bienvenida">Bienvenido <?php echo $_SESSION['nombre'] ?> !</h1>
    <div class="botones-compra">
        <a class="enlace-compra" href="carrito.php">
            <img class="carrito <?php
                                if (isset($_SESSION['carrito'])) {
                                    echo 'carrito-lleno';
                                } else {
                                    unset($_SESSION['carrito']);
                                    echo '';
                                }
                                ?>" src="../../img/cart.svg" alt="Imagen Carrito">
        </a>
        <a class="enlace-compra" href="../cerrar.php">
            <img class="logout-icon" src="../../img/logout.svg" alt="Imagen Cerrar Sesion">
        </a>
    </div>
</div>

<?php
if ($_SESSION['permisos'] == 1) {
    echo '<div class="enlace-admin">
            <a class="contenedor-enlace" href="http://localhost/PRIlerna/views/admin">Volver al Panel de Administrador</a>
        </div>';
}
?>