<?php

include_once __DIR__ . '/../model/Cons_Contadores.php';

// Esta clase muestra los contadores para admin
class Contadores
{
    public function mostrarNumeroUsuarios()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Contadores();
        $datos = $consultas->getAllUsers();

        //Mostramos el número de filas obtenidas
        $numUsuarios = mysqli_num_rows($datos);
        mysqli_free_result($datos);
        return $numUsuarios;
    }

    public function mostrartNumeroArticulos()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Contadores();
        $datos = $consultas->getAllArticulos();

        //Mostramos el número de filas obtenidas
        $numArticulos = mysqli_num_rows($datos);
        mysqli_free_result($datos);
        return $numArticulos;
    }

    public function numeroArticulos3d()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Contadores();
        $datos = $consultas->getArticulos3D();

        //Mostramos el número de filas obtenidas
        $numArticulos3d = mysqli_num_rows($datos);
        mysqli_free_result($datos);
        return $numArticulos3d;
    }

    public function numeroArticulosLaser()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Contadores();
        $datos = $consultas->getArticulosLaser();

        //Mostramos el número de filas obtenidas
        $numArticulosLaser = mysqli_num_rows($datos);
        mysqli_free_result($datos);
        return $numArticulosLaser;
    }
}
