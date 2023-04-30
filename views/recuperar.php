<?php
include_once '../templates/header.php';
include_once '../templates/alertas.php';
include_once '../controller/Alertas.php';
include_once '../controller/Usuarios.php';
include_once '../phpmailer/EnviarEmail.php';
$url_absoluta = "http://localhost/PRIlerna/";
$alertas = new Alertas();
$usuario = new Usuarios();
$mail = new EnviarEmail();
?>

<div class="container-md recupera">
    <img src="../img/Logo.png" class="img-fluid" alt="Logo">

    <?php
    //Comporbamos los datos del formulario
    if (isset($_POST['recuperar'])) {
        $email = $_POST['email'];
        $validarDatos = $alertas->validarDatosRecuperar($email);

        if ($validarDatos) {
            //Mostramos las alertas
            mostrarAlertas($validarDatos);
        } else {
            //Actualizamos el validador
            $usuario->actualizarValidador($email);
            $datosUsuario = $usuario->obtenerDatosUsuario($email);
            $nombre = $datosUsuario['nombre'];
            $validador = $datosUsuario['validador'];
            //Enviamos el correo
            $mail->enviarEmailRecuperar($email, $nombre, $validador);
            //Redirigimos al usuario
            header('Location: ins_recuperar.php');
        }
    }
    ?>

    <!-- Formulario de recuperar contraseña -->
    <form class="form-recupera" action="recuperar.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="emailUsuario" placeholder="Tu Email" required>
        </div>

        <input type="submit" name='recuperar' class="boton-submit" value="Recuperar Contraseña" />

        <div class="links">
            <a name="index" id="index" href="<?php echo $url_absoluta; ?>">¿Ya tienes cuenta?</a>
            <a name="registrarse" id="registrarse" href="<?php echo $url_absoluta; ?>views/registro.php">¿Eres Nuevo? Registrate!</a>
        </div>
    </form>
</div>


<?php include_once '../templates/footer.php' ?>