<?php

require_once 'Db.php';

class Cons_Pedidos
{

    //Obtenemos todos los pedidos que hay en la BD
    public function getPedidos()
    {
        //Instanciamos Db y creamos la conexion
        $db = new Db();
        $conexion = $db->crearConexion();

        //Creamos la consulta y la lanzamos
        $sql = 'SELECT * FROM pedidos';
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos si hay resultados
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            // Gestionaremos este error desde Pedidos.php
            // echo 'Error al obtener pedidos';
        }
    }

    //Devoler un pedido según su id
    public function getPedido($id)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'SELECT id, pedidopor, articulopedido, cantidad, preciou, total, pagado, entregado FROM pedidos WHERE id=' . $id;
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            echo 'Error al Seleccionar un Pedido';
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Editar los campos que vienen del formulario de editar de pedidos
    public function editarPedido($id, $cantidad, $pagado, $entregado)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'UPDATE pedidos SET cantidad =' . $cantidad . ', pagado =' . $pagado . ', entregado =' . $entregado . ' WHERE id = ' . $id;
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if ($resultado) {
            return $resultado;
        } else {
            echo "Error al Actualizar el Pedido";
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }

    //Eliminar un pedido en base a su id
    public function eliminarPedido($id)
    {
        //Instancia de la clase Db y llamada a la función crearConexión
        $db = new Db;
        $conexion = $db->crearConexion();

        //Instrucción y ejecución SQL
        $sql = 'DELETE FROM pedidos WHERE id = ' . $id;
        $resultado = mysqli_query($conexion, $sql);

        //Comprobamos que se ejecuta correctamente
        if ($resultado) {
            return $resultado;
        } else {
            echo "Error al Eliminar el Pedido";
        }

        //Cerramos la conexión
        $db->cerrarConexion($conexion);
    }
}
