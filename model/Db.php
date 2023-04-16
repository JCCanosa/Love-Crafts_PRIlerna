<?php

class Db
{
    //Crea la conexión a la BD.
    public function crearConexion()
    {
        //Datos de conexión.
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'lovecrafts';

        //Realizar la conexion con los datos.
        $conectar = mysqli_connect($host, $user, $pass, $db);

        //Comprobamos que se conecta correctamente, sino mostramos un error.
        if (!$conectar) {
            echo "Error al conectar a la base de datos " . $db . ": " . mysqli_connect_errno();
        } else {
            // echo "Conectado Correctamente";
        }
        return $conectar;
    }

    //Cierra la conexión de la base datos
    public function cerrarConexion($db)
    {
        mysqli_close($db);
    }
}
