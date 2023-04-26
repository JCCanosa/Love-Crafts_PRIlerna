<?php

session_start();

if(isset($_POST['eliminar'])){
    $id = $_POST['id'];

    //Eliminar el articulo de $SESSION
    unset($_SESSION['carrito'][$id]);
    
    header('Location: carrito.php');
    exit();
} else {
    header('Location: carrito.php');
    exit();
}