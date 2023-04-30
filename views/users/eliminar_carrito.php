<?php

//Recuperamos la sesión y comprobamos que sea correcta
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: http://localhost/PRIlerna/');
    exit();
}

// Si venimos de eliminar, borramos el articulo del carrito y volvemos al carrito 
if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];

    //Eliminar el articulo de $SESSION
    unset($_SESSION['carrito'][$id]);

    header('Location: carrito.php');
    exit();
} else {
    header('Location: carrito.php');
    exit();
}
