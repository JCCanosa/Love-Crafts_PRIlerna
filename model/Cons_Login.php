<?php

require_once 'Db.php';

class Cons_Login
{
    //Obtiene el email de un usuario
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

    //Obtiene el password mediante el email
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

    //Obtiene el valor de permisos mediante el email
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

    //Obtiene el valor de confirmado mediante el email
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

    //Verificar si existe el email
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
