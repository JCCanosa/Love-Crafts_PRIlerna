<?php

require_once 'Db.php';

//En esta clase vamos a ir mostrando todos los datos de las tablas para luego mostrar un contador en admin
class Cons_Contadores
{
    // Recoger los usuarios
    public function getAllUsers()
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL
        $sql = 'SELECT * FROM usuarios';
        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlaremos esta salida desde Contadores.php
            // echo 'Error al recuperar los Usuarios';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    // Recoger los articulos
    public function getAllArticulos()
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL
        $sql = 'SELECT * FROM articulos';
        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlaremos esta salida desde Contadores.php
            // echo 'Error al recuperar los Articulos';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    // Recoger los articulos del grupo 3D
    public function getArticulos3D()
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL  
        $sql = "SELECT * FROM articulos WHERE grupo = '3D'";

        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if ($resultado) {
            return $resultado;
        } else {
            echo "Error con el recuento de artículos 3D";
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    // Recoger los articulos del grupo Laser
    public function getArticulosLaser()
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL 
        $sql = "SELECT * FROM articulos WHERE grupo = 'laser'";

        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if ($resultado) {
            return $resultado;
        } else {
            echo "Error con el recuento de artículos Láser";
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }
}
