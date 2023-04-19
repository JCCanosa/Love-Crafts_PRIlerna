<?php

require_once 'Db.php';

class Cons_Login
{
    public function setLogin($email, $password)
    {
        // Nos conectamos a la BD
        $db = new Db();
        $conexion = $db->crearConexion();

        //Creamos y lanzamos la consulta.
        $sql = 'SELECT * FROM usuarios WHERE email= "' . $email . '" AND password="' . $password . '"';
        $resultado = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($resultado) > 0){
            header('Location: views/users/index.php');
        } else {
            header('Location: index.php');
        }

        //Cerramos la conexión a la BD
        $db->cerrarConexion($conexion);
    }
}
