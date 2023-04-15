<?php
    $url_absoluta = "http://localhost/PRIlerna/";
    include 'templates/header.php';
    // include_once __DIR__ . '/controller/Usuarios.php';
?>


<div class="container-md login">
    <img src="img/Logo.png" class="img-fluid" alt="Logo">
    <form class="form-login">
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Introduzca Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Introduzca Password">
        </div>
        <input type="submit" class="button btn btn-primary" value="Login" />
        <div class="botones">
            <a name="registrarse" id="registrarse" href="<?php echo $url_absoluta; ?>views/registro.php">¿Eres Nuevo? Registrate!</a>
            <a name="recuperar" id="recuperar" href="<?php echo $url_absoluta; ?>views/recuperar.php">¿Olvidaste tu Contraseña?</a>
        </div>
    </form>

    <a href="<?php echo $url_absoluta; ?>views/admin">Admin</a>
    <a href="<?php echo $url_absoluta; ?>views/usuarios">Usuarios</a>
</div>


<?php include 'templates/footer.php'; ?>