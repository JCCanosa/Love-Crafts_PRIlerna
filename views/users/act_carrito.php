<?php

session_start();

if(isset($_POST['actualizar'])){
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];

    //Actualizar la cantidad en la variable $_SESSION
    $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
   
    header('Location: resumen.php');
    exit();

} else {
    header('Location: resumen.php');
    exit();
}