<?php

include_once __DIR__ . '../../controller/Alertas.php';

// Recorre las alertas para mostrarlas
function mostrarAlertas($alertas)
{
    foreach ($alertas as $key => $mensajes) {
        foreach ($mensajes as $mensaje) {
            echo '<p class="'.$key.'">'.$mensaje.'</p>';
        }
    }
}
