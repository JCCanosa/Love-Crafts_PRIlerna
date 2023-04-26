<?php

include_once __DIR__ . '/../model/Cons_Usuarios.php';
include_once __DIR__ . '/../model/Cons_Articulos.php';
include_once __DIR__ . '/../model/Cons_Pedidos.php';

// Esta clase muestra los contadores para admin
class Contadores
{   
    // Obtener el número total de usuarios
    public function mostrarNumeroUsuarios()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Usuarios();
        $datos = $consultas->getUsuarios();

        //Mostramos el número de filas obtenidas
        if (!$datos) {
            echo 'Usuarios: 0';
        } else {
            $numUsuarios = mysqli_num_rows($datos);
            mysqli_free_result($datos);
            return 'Usuarios: ' . $numUsuarios;
        }
    }

    // Mostrar número total de artículos
    public function mostrarNumeroArticulos()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Articulos();
        $datos = $consultas->getArticulos();

        //Mostramos el número de filas obtenidas
        if (!$datos) {
            echo 'Artículos: 0';
        } else {
            $numArticulos = mysqli_num_rows($datos);
            mysqli_free_result($datos);
            return 'Artículos: ' . $numArticulos;
        }
    }

    // Mostrar número de artículos del grupo 3D
    public function numeroArticulos3d()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Articulos();
        $datos = $consultas->getGrupo('3D');

        //Mostramos el número de filas obtenidas
        if (!$datos) {
            echo 'Artículos 3D: 0';
        } else {
            $numArticulos3D = mysqli_num_rows($datos);
            mysqli_free_result($datos);
            return 'Artículos 3D: ' . $numArticulos3D;
        }
    }

    // Mostrar número de artículos del grupo laser
    public function numeroArticulosLaser()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Articulos();
        $datos = $consultas->getGrupo('Laser');

        //Mostramos el número de filas obtenidas
        if (!$datos) {
            echo 'Artículos Láser: 0';
        } else {
            $numArticulosLaser = mysqli_num_rows($datos);
            mysqli_free_result($datos);
            return 'Artículos Láser: ' . $numArticulosLaser;
        }
    }

    //Mostrar número total de pedidos
    public function numeroPedidos()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Pedidos();
        $datos = $consultas->getPedidos();

        //Mostramos el número de filas obtenidas
        if (!$datos) {
            echo 'Pedidos: 0';
        } else {
            $numPedidos = mysqli_num_rows($datos);
            mysqli_free_result($datos);
            return 'Pedidos: ' . $numPedidos;
        }
    }

    // Mostrar número de pedidos pagados
    public function numeroPedidosPagados()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Pedidos();
        $datos = $consultas->getPedidosPagados();

        // Mostramos el número de filas obtenidas
        if (!$datos) {
            echo 'Pedidos Pagados: 0';
        } else {
            $numPedidosPagados = mysqli_num_rows($datos);
            mysqli_free_result($datos);
            return 'Pedidos Pagados: ' . $numPedidosPagados;
        }
    }

    // Mostrar número de pedidos entregados
    public function numeroPedidosEntregados()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Pedidos();
        $datos = $consultas->getPedidosEntregados();

        // Mostramos el número de filas obtenidas
        if (!$datos) {
            echo 'Pedidos Entregados: 0';
        } else {
            $numPedidosEntregados = mysqli_num_rows($datos);
            mysqli_free_result($datos);
            return 'Pedidos Entregados: ' . $numPedidosEntregados;
        }
    }
}
