<?php
$url_absoluta = "http://localhost/PRIlerna/";
include '../templates/header.php';
include '../templates/alertas.php';
include_once __DIR__ . '../../controller/Usuarios.php';
include_once __DIR__ . '../../controller/Alertas.php';
include_once __DIR__ . '../../phpmailer/EnviarEmail.php';
$usuario = new Usuarios();
$mail = new EnviarEmail();
$alertas = new Alertas();
?>

<div class="container-md registro">
    <img src="../img/Logo.png" class="img-fluid" alt="Logo">

    <?php
    // Recogemos los datos del formulario los validamos y creamos el usuario
    if (isset($_POST['registro'])) {
        $nombre = $_POST['nombreUsuario'];
        $apellidos = $_POST['apellidosUsuario'];
        $email = $_POST['emailUsuario'];
        $telefono = $_POST['telefonoUsuario'];
        $password = $_POST['passwordUsuario'];
        $validarDatos = $alertas->validarDatosRegistro($nombre, $apellidos, $email, $password, $telefono);

        if ($validarDatos) {
            // Muestra las alertas
            echo mostrarAlertas($validarDatos);
        } else {
            //Hace hash del password y lo guarda en la variable
            $password = $usuario->hashPassword($password);
            //Crea un validador
            $validador = $usuario->setValidador();
            //Guarda el usuario
            $usuario->guardarUsuario($nombre, $apellidos, $email, $password, $telefono, $validador);
            //Envia el email
            $mail->enviarEmailRegistro($email, $nombre, $validador);
        }
    }
    ?>

    <!-- Formulario de registro -->
    <form action="registro.php" method="POST" class="form-registro">
        <div class="mb-3">
            <label for="nombreUsuario" class="form-label">Nombre</label>
            <input type="text" name="nombreUsuario" class="form-control" id="nombreUsuario" placeholder="Tu Nombre">
        </div>
        <div class="mb-3">
            <label for="apellidosUsuario" class="form-label">Apellidos</label>
            <input type="text" name="apellidosUsuario" class="form-control" id="apellidosUsuario" placeholder="Tus Apellidos">
        </div>
        <div class="mb-3">
            <label for="emailUsuario" class="form-label">Email</label>
            <input type="email" name="emailUsuario" class="form-control" id="emailUsuario" placeholder="Tu Email">
        </div>
        <div class="mb-3">
            <label for="telefonoUsuario" class="form-label">Teléfono</label>
            <input type="tel" name="telefonoUsuario" class="form-control" id="telefonoUsuario" placeholder="Tu Teléfono">
        </div>
        <div class="mb-3">
            <label for="passwordUsuario" class="form-label">Password</label>
            <input type="password" name="passwordUsuario" class="form-control" id="passwordUsuario" placeholder="Introduce una Contraseña">
        </div>
        <input type="submit" name="registro" class="boton-submit" value="Registrarse" />

        <div class="links">
            <a name="index" id="index" href="<?php echo $url_absoluta; ?>">¿Ya tienes cuenta?</a>
            <a name="recuperar" id="recuperar" href="<?php echo $url_absoluta; ?>views/recuperar.php">¿Olvidaste tu Contraseña?</a>
        </div>
    </form>
</div>


<?php include '../templates/footer.php' ?>