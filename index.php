<?php
    $url_absoluta = "http://localhost/PRIlerna/";
    include_once 'templates/header.php';
    include_once 'model/Cons_Login.php';
    $cons_login = new Cons_Login();

    if(isset($_POST['login'])){
        $cons_login->setLogin($_POST['email'], $_POST['password']);
    }

?>


<div class="container-md login">
    <img src="img/Logo.png" class="img-fluid" alt="Logo">
    <form class="form-login" action="index.php" method="POST">
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Introduzca Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Introduzca Password">
        </div>
        <input type="submit" name="login" class="btn-area-login" value="Login" />
        <div class="links">
            <a name="registrarse" id="registrarse" href="<?php echo $url_absoluta; ?>views/registro.php">¿Eres Nuevo? Registrate!</a>
            <a name="recuperar" id="recuperar" href="<?php echo $url_absoluta; ?>views/recuperar.php">¿Olvidaste tu Contraseña?</a>
        </div>
    </form>

    <a href="<?php echo $url_absoluta; ?>views/admin">Admin</a>
    <a href="<?php echo $url_absoluta; ?>views/usuarios">Usuarios</a>
</div>


<?php include 'templates/footer.php'; ?>