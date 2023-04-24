<?php 
    include '../templates/header.php';
    $url_absoluta = "http://localhost/PRIlerna/";
?>

<div class="container-md recupera">
    <img src="../img/Logo.png" class="img-fluid" alt="Logo">

    <form class="form-recupera">

        <p>Falta ver si solo es con Email</p>
        <p>Y acabar de ajustar estilos</p>
        <p>ñadir el ojete de la contraseña</p>

        <div class="mb-3">
            <label for="emailUsuario" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailUsuario" placeholder="Tu Email" required>
        </div>

        <div class="mb-3">
            <label for="passwordUsuario" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordUsuario" placeholder="Introduce una Contraseña Nueva" required>
        </div>

        <div class="mb-3">
            <label for="passwordUsuario" class="form-label">Repetir Password</label>
            <input type="password" class="form-control" id="passwordUsuario" placeholder="Introduce una Contraseña Nueva" required>
        </div>

        <input type="submit" class="boton-submit" value="Recuperar Contraseña" />

        <div class="links">
            <a name="index" id="index" href="<?php echo $url_absoluta; ?>">¿Ya tienes cuenta?</a>
            <a name="registrarse" id="registrarse" href="<?php echo $url_absoluta; ?>views/registro.php">¿Eres Nuevo? Registrate!</a>
        </div>
    </form>
</div>


<?php include '../templates/footer.php' ?>