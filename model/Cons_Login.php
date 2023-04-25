<?php

require_once 'Db.php';

class Cons_Login
{
    public function getEmail($email)
    {
        // Nos conectamos a la BD
        $db = new Db();
        $conexion = $db->crearConexion();

        //Creamos y lanzamos la consulta
        $sql = 'SELECT email FROM usuarios WHERE email = "' . $email . '" LIMIT 1';
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlamos esta excepcion con las alertas
            // echo 'Error al consultar email';
        }
    }

    public function getPassword($email)
    {
        // Nos conectamos a la BD
        $db = new Db();
        $conexion = $db->crearConexion();

        $sql = 'SELECT password FROM usuarios WHERE email = "' . $email . '" LIMIT 1';
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlamos esta excepcion con las alertas
            // echo 'Error al consultar password';
        }
    }

    public function getPermisos($email)
    {
        // Nos conectamos a la BD
        $db = new Db();
        $conexion = $db->crearConexion();

        $sql = 'SELECT permisos FROM usuarios WHERE email = "' . $email . '"';
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlamos esta excepcion con las alertas
            echo 'Error al consultar permisos';
        }
    }

    public function getConfirmado($email)
    {
        // Nos conectamos a la BD
        $db = new Db();
        $conexion = $db->crearConexion();

        $sql = 'SELECT confirmado FROM usuarios WHERE email = "' . $email . '"';
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlamos esta excepcion con las alertas
            // echo 'Error al consultar el valor de confirmado';
        }
    }

    public function verificarEmail($email)
    {
        // Nos conectamos a la BD
        $db = new Db();
        $conexion = $db->crearConexion();

        $sql = 'SELECT * FROM usuarios WHERE email = "' . $email . '"';
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlamos esta excepcion desde registro.php con alertas
            // echo 'Error al comprobar si existe email';
        }
    }
}
