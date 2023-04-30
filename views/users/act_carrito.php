<?php

//Recuperamos la sesión y comprobamos que sea correcta
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: http://localhost/PRIlerna/');
    exit();
}

//Si actualizamos la cantidad la guardamos en carrito
if(isset($_POST['actualizar'])){
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];

    //Actualizar la cantidad en la variable $_SESSION
    $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
   
    header('Location: carrito.php');
    exit();

} else {
    header('Location: carrito.php');
    exit();
}