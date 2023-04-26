<?php

require_once 'Db.php';

class Cons_Usuarios
{
    //Crea un nuevo usuario
    public function setUsuario($nombre, $apellidos, $email, $password, $telefono, $confirmado, $permisos, $validador)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'INSERT INTO usuarios (nombre, apellidos, email, password, telefono, confirmado, permisos, validador)
            VALUES ("' . $nombre . '", "' . $apellidos . '", "' . $email . '", "' . $password . '", "' . $telefono . '", ' . $confirmado . ', ' . $permisos . ', "' . $validador . '")';

        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if ($resultado) {
            return $resultado;
        } else {
            echo 'Error al Insertar Usuario';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Devolver todos los usuarios para la vista admin
    public function getUsuarios()
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'SELECT id, nombre, apellidos, email, telefono, confirmado, permisos FROM usuarios';
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlaremos esta salida en Usuarios.php
            // echo 'Error al Consultar Usuarios';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Devolver un usuario mediante su id
    public function getUsuario($id)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'SELECT id, nombre, apellidos, email, telefono, confirmado, permisos, validador FROM usuarios WHERE id=' . $id;
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            echo 'Error al Seleccionar un Usuario';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Devolver un usuario mediante su email
    public function getUsuarioEmail($email)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'SELECT id, nombre, apellidos, telefono, permisos, validador FROM usuarios WHERE email="' . $email . '"';
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            echo 'Error al Seleccionar un Usuario por email';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    public function getIdUsuarioNombre($nombre)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'SELECT id FROM usuarios WHERE nombre="' . $nombre . '"';
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlaremos esta excepcion desde pedidos/crear.php
            // echo 'Error al Seleccionar un Usuario por nombre';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    public function getValidador($validador)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'SELECT * FROM usuarios WHERE validador="' . $validador . '"';
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Controlar esta excepción desde confirmado.php
            // echo 'Error al comprobar el código de validación';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Editar campo confirmar usuario
    public function editarConfirmarUsuario($id)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'UPDATE usuarios SET confirmado = 1 WHERE id = ' . $id;
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if ($resultado) {
            return $resultado;
        } else {
            echo "Error al Actualizar el Usuario";
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Editar los permisos de un usuario concreto
    public function editarPermisosUsuarios($permisos, $id)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'UPDATE usuarios SET permisos =' . $permisos . ' WHERE id = ' . $id;
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if ($resultado) {
            return $resultado;
        } else {
            echo "Error al Actualizar el Usuario";
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Eliminar un usuario en base a su id
    public function eliminarUsuario($id)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'DELETE FROM usuarios WHERE id = ' . $id;
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if ($resultado) {
            return $resultado;
        } else {
            echo "Error al Eliminar el Usuario";
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }
}
