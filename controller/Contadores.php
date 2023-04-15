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
        if(!$datos){
            echo 'Usuarios: 0';
        } else {
            $numUsuarios = mysqli_num_rows($datos);
            mysqli_free_result($datos);
            return 'Usuarios: '.$numUsuarios;
        }
    }

    public function mostrarNumeroArticulos()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Contadores();
        $datos = $consultas->getAllArticulos();

        //Mostramos el número de filas obtenidas
        if(!$datos){
            echo 'Artículos: 0';
        } else {
            $numArticulos = mysqli_num_rows($datos);
            mysqli_free_result($datos);
            return 'Artículos: '.$numArticulos;
        }
    }

    public function numeroArticulos3d()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Contadores();
        $datos = $consultas->getArticulos3D();

        //Mostramos el número de filas obtenidas
        if(!$datos){
            echo 'Artículos 3D: 0';
        } else {
            $numArticulos3D = mysqli_num_rows($datos);
            mysqli_free_result($datos);
            return 'Artículos 3D: '.$numArticulos3D;
        }
    }

    public function numeroArticulosLaser()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Contadores();
        $datos = $consultas->getArticulosLaser();

        //Mostramos el número de filas obtenidas
        if(!$datos){
            echo 'Artículos Láser: 0';
        } else {
            $numArticulosLaser = mysqli_num_rows($datos);
            mysqli_free_result($datos);
            return 'Artículos Láser: '.$numArticulosLaser;
        }
    }
}
