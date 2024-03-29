<?php

require_once 'DB.php';

class Cons_Articulos
{
    //Consulta para obtener todos los artículos de la base de datos.
    public function getArticulos()
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
            // Comentamos este mensaje para que no salga cuando no tenemos articulos.
            // Controlaremos este mensaje desde Articulos.php
            // echo 'Error en la consulta de artículos';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    // Obtiene un articulo mediante la id
    public function getArticulo($id)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL
        $sql = 'SELECT * FROM articulos WHERE id=' . $id;
        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // echo 'Error en la consulta de artículo';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    // Obtiene el id del articulo mediante su descripcion
    public function getIdArticulo($descripcion)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL
        $sql = 'SELECT id FROM articulos WHERE descripcion = "' . $descripcion . '"';
        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlaremos esta excepcion desde pedidos/crear.php
            // echo 'Error al consultar el id del articulo';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    // Obtiene el precio del articulo mediante su descripcion
    public function getPrecioPorDescripcion($descripcion)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL
        $sql = 'SELECT precio FROM articulos WHERE descripcion = "' . $descripcion . '"';
        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlaremos esta excepcion desde pedidos/crear.php
            // echo 'Error al consultar el precio del articulo';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Obtiene los grupos de los articulos
    public function getGrupo($grupo)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL
        $sql = 'SELECT * FROM articulos WHERE grupo="' . $grupo . '"';
        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // echo 'Error al consultar los grupos';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Busca articulos
    public function getArticuloBuscar($descripcion)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL
        $sql = 'SELECT * FROM articulos WHERE descripcion LIKE "%' . $descripcion . '%"';
        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // echo 'Error al filtrar articulo';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Inserta artículos en la BD, para artículos nuevos.
    public function setArticulo($desc, $grupo, $imagen, $precio)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL
        $sql = 'INSERT INTO articulos (descripcion, grupo, imagen, precio) VALUES ("' . $desc . '", "' . $grupo . '", "' . $imagen . '", ' . $precio . ')';
        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if ($resultado) {
            return $resultado;
        } else {
            echo 'Error al Añadir Artículo';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Actualiza los artículos de la BD.
    public function actArticulos($id, $desc, $grupo, $precio)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL
        $sql = 'UPDATE articulos SET descripcion="' . $desc . '", grupo="' . $grupo . '", precio=' . $precio . ' WHERE id=' . $id;
        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if ($resultado) {
            return $resultado;
        } else {
            echo 'Error al acualizar Artículo';
        }
        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Actualiza las imagenes de la base de datos.
    public function actImagen($id, $imagen)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL
        $sql = 'UPDATE articulos SET imagen = "' . $imagen . '" WHERE id=' . $id;
        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if ($resultado) {
            return $resultado;
        } else {
            echo 'Error al Acualizar la Imagen';
        }
        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Elimina artículos de la BD
    public function eliminarArticulo($id)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Consulta y ejecución SQL
        $sql = 'DELETE FROM articulos WHERE id = ' . $id;
        $resultado = mysqli_query($conexion, $sql);

        // Comprobamos que obtenemos el resultado
        if ($resultado) {
            return $resultado;
        } else {
            echo "Error al Eliminar el Artículo";
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }
}
