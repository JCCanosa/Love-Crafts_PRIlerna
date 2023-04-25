<?php

session_start();

if(isset($_POST['eliminar'])){
    $id = $_POST['id'];

    //Eliminar el articulo de $SESSION
    unset($_SESSION['carrito'][$id]);
    
    header('Location: resumen.php');
    exit();
} else {
    header('Location: resumen.php');
    exit();
}