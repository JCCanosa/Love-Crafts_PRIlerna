<div class="cabecera-usuario">
    <h1 class="bienvenida">Bienvenido <?php echo $_SESSION['nombre'] ?> !</h1>
    <div class="botones-compra">
        <a href="carrito.php">
            <img class="carrito" src="../../img/cart.svg" alt="Imagen Carrito">
        </a>
        <a href="../cerrar.php">
            <img class="logout-icon" src="../../img/logout.svg" alt="Imagen Cerrar Sesion">
        </a>
    </div>
</div>