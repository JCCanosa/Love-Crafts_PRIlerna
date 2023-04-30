<?php
include_once '../templates/header.php';
include_once '../templates/alertas.php';
include_once '../controller/Alertas.php';
include_once '../controller/Usuarios.php';
$url_absoluta = "http://localhost/PRIlerna/";
$alertas = new Alertas();
$usuario = new Usuarios();
?>

<div class="container-md recupera">
    <img src="../img/Logo.png" class="img-fluid" alt="Logo">

    <?php

    //Comprobamos los datos y actualizamos el password
    if (isset($_POST['recuperar'])) {
        $password = $_POST['password'];
        $validarDatos = $alertas->validarNuevoPassword($password);
        $validador = $_GET['validador'];

        if ($validarDatos) {
            mostrarAlertas($validarDatos);
        } else {
            $usuario->actualizarPassword($validador, $password);
            header('Location: ' . $url_absoluta);
        }
    }
    ?>

    <!-- Formulario de recuperar contraseña -->
    <form class="form-recupera" action="recuperar_pass.php?validador=<?php echo $_GET['validador'] ?>" method="POST">
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Nuevo Password" required>
        </div>

        <input type="submit" name='recuperar' class="boton-submit" value="Guardar Nueva Contraseña" />

        <div class="links">
            <a name="index" id="index" href="<?php echo $url_absoluta; ?>">¿Ya tienes cuenta?</a>
            <a name="registrarse" id="registrarse" href="<?php echo $url_absoluta; ?>views/registro.php">¿Eres Nuevo? Registrate!</a>
        </div>
    </form>
</div>


<?php include_once '../templates/footer.php' ?>