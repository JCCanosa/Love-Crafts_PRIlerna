<?php
include_once '../../templates/header.php';
include_once '../../controller/Pedidos.php';
$pedido = new Pedidos();

session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: http://localhost/PRIlerna/');
    exit();
}
include_once '../../templates/navUsers.php';
?>

<?php
    if(isset($_POST['personalizar'])){
        $pedido->mostrarArticuloPersonalizar($_POST['id']);
    }
?>

<form class="formulario-personalizar" action="carrito.php" method="GET">
    <div class="campo-personalizar">
        <label for="texto-personalizar">Texto a Mostrar</label>
        <span>Solo para artículos con nombres o textos personalizables</span>
        <input type="text" name="texto-personalizar" placeholder="Escribe aquí el Texto">
    </div>

    <div class="campo-personalizar">
        <label for="disenyo">Diseño</label>
        <span>Solo para artículos con varios Diseños</span>
        <input type="text" name="disenyo" placeholder="Escribe aquí el Texto">
    </div>

    <div class="campo-personalizar">
        <label for="fecha">Fecha</label>
        <span>Puedes añadir una fecha en artículo si lo deseas</span>
        <input type="date" name="fecha">
    </div>

    <div class="btn-personalizar">
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
        <input type="submit" name="guardarPersonalizar" class="boton-anadir-articulo" value="Guardar Cambios">
    </div>


</form>