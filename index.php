<?php
$url_absoluta = "http://localhost/PRIlerna/";
include_once 'templates/header.php';
include_once 'templates/alertas.php';
include_once 'controller/Alertas.php';
include_once 'controller/Login.php';
$alertas = new Alertas();
$login = new Login();
?>


<div class="container-md login">
    <img src="img/Logo.png" class="img-fluid" alt="Logo">
    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $validarDatos = $alertas->validarDatosLogin($email, $password);

        if ($validarDatos) {
            mostrarAlertas($validarDatos);
        } else {
            $login->setLogin($email);
        }
    }
    ?>
    <form class="form-login" action="index.php" method="POST">

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Introduzca Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Introduzca Password">
        </div>
        <input type="submit" name="login" class="boton-submit" value="Login" />
        <div class="links">
            <a name="registrarse" id="registrarse" href="<?php echo $url_absoluta; ?>views/registro.php">¿Eres Nuevo? Registrate!</a>
            <a name="recuperar" id="recuperar" href="<?php echo $url_absoluta; ?>views/recuperar.php">¿Olvidaste tu Contraseña?</a>
        </div>
    </form>
</div>


<?php include 'templates/footer.php'; ?>