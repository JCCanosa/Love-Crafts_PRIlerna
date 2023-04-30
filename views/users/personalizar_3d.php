<?php
include_once '../../templates/header.php';
include_once '../../controller/Pedidos.php';
$pedido = new Pedidos();

//Recuperamos la sesión y comprobamos que sea correcta
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: http://localhost/PRIlerna/');
    exit();
}
include_once '../../templates/navUsers.php';
?>

<?php
// Si venimos de personalizar mostramos el articulo
if (isset($_POST['personalizar'])) {
    $pedido->mostrarArticuloPersonalizar($_POST['id']);
}
?>

<!-- Formulario de personalizar 3d -->
<form class="formulario-personalizar" action="carrito.php" method="GET">
    <div class="campo-personalizar">
        <label for="texto-personalizar">Texto a Mostrar</label>
        <span>Solo para artículos con nombres o textos personalizables</span>
        <input type="text" name="texto-personalizar" placeholder="Escribe aquí el Texto">
    </div>

    <h5 class="titulo-colores">Elige el color que más te guste de los disponibles</h5>
    <div class="campo-personalizar radios-colores">
        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="black" name="color" value="black">
            <label for="black">Black</label>
        </div>

        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="white" name="color" value="white">
            <label for="white">White</label>
        </div>

        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="grey" name="color" value="grey">
            <label for="grey">Grey</label>
        </div>

        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="mSilver" name="color" value="mSilver">
            <label for="mSilver">Magic silver</label>
        </div>

        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="red" name="color" value="red">
            <label for="red">Red</label>
        </div>

        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="pink" name="color" value="pink">
            <label for="pink">Pink</label>
        </div>

        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="green" name="color" value="green">
            <label for="green">Green</label>
        </div>

        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="sGreen" name="color" value="sGreen">
            <label for="sGreen">Surf Green</label>
        </div>

        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="yellow" name="color" value="yellow">
            <label for="yellow">Yellow</label>
        </div>

        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="blue" name="color" value="blue">
            <label for="blue">Blue</label>
        </div>

        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="sBlue" name="color" value="sBlue">
            <label for="sBlue">Sky Blue</label>
        </div>

        <div class="color-personalizar">
            <input type="radio" class="colores-personalizar" id="granito" name="color" value="granito">
            <label for="granito">Granito</label>
        </div>
    </div>

    <div class="btn-personalizar">
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
        <input type="submit" name="guardarPersonalizar" class="boton-anadir-articulo" value="Guardar Cambios">
    </div>
</form>