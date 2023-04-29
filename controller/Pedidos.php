<?php

include_once __DIR__ . '../../model/Cons_Pedidos.php';
include_once __DIR__ . '../../model/Cons_Usuarios.php';
include_once __DIR__ . '../../model/Cons_Articulos.php';

class Pedidos
{
    // Mostramos todos los pedidos
    public function mostrarPedidos()
    {
        //Recogemos los datos
        $consultas = new Cons_Pedidos();
        $datos = $consultas->getPedidos();

        //Recorremos el resultado de la consulta y mostramos el resultado
        if (is_string($datos)) {
            echo $datos;
        } else if ($datos) {

            while ($fila = mysqli_fetch_assoc($datos)) {
                //Cambiamos el formato de salida de Pagado y Entregado para el usuario
                $filaPagado = '';
                if ($fila["pagado"] == 1) {
                    $filaPagado = 'Si';
                } else {
                    $filaPagado = 'No';
                }

                $filaEntregado = '';
                if ($fila["entregado"] == 1) {
                    $filaEntregado = 'Si';
                } else {
                    $filaEntregado = 'No';
                }

                echo "<tr class='text-center'>\n
                        <td>" . $fila["id"] . "</td>\n
                        <td>" . $fila["pedidopor"] . "</td>\n
                        <td>" . $fila["articulopedido"] . "</td>\n
                        <td>" . $fila["cantidad"] . "</td>\n
                        <td>" . $fila["preciou"] . " €</td>\n
                        <td>" . $fila["total"] . " €</td>\n
                        <td>" . $filaPagado . "</td>\n
                        <td>" . $filaEntregado . "</td>\n
                <td>\n
                    <a name='editar' id='editar' class='btn btn-success' href='editar.php?id=" . $fila["id"] . "' role='button'>Editar</a>\n
                </td>\n
                <td>\n
                    <form action='index.php' method='POST'>\n
                        <input type='hidden' name='numeroPedido' value='" . $fila['id'] . "'>\n
                        <input type='submit' name='eliminarPedido' id='eliminar' class='btn btn-danger'value='Eliminar'>\n
                    </form>\n
                </td>\n
            </tr>";
            }
        } else {
            echo "<p class='vacio'>Actualmente no hay Pedidos</p>";
        }
    }

    //Muestra un pedido concreto en base a su id, para cuando entramos a editar.
    public function mostrarUnPedido($id)
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Pedidos();
        $datos = $consultas->getPedido($id);

        //Comprobamos y recorremos los datos recogidos
        if (is_string($datos)) {
            echo $datos;
        } else {
            while ($fila = mysqli_fetch_assoc($datos)) {
                // Muestra por pantalla un formulario con los datos del pedido.
                echo "<div class='mb-3'>\n
                        <label for='numeroPedido' class='form-label'>Num. Pedido</label>\n
                        <input type='hidden' value=" . $fila['id'] . " name='numeroPedido' id='numeroPedido'>\n
                        <input type='number' class='form-control' name='numeroPedido' id='numeroPedido' value=" . $fila['id'] . " disabled>
                    </div>\n

                    <div class='mb-3'>\n
                        <label for='pedidoPor' class='form-label'>Pedido Por</label>\n
                        <input type='text' class='form-control' name='pedidoPor' id='pedidoPor' value=" . $fila['pedidopor'] . " disabled>\n
                    </div>\n

                    <div class='mb-3'>\n
                        <label for='descArticulo' class='form-label'>Artículo Pedido</label>\n
                        <input type='text' class='form-control' name='descArticulo' id='descArticulo' value=" . $fila['articulopedido'] . " disabled>\n
                    </div>\n

                    <div class='mb-3'>\n
                        <label for='cantidad' class='form-label'>Cantidad</label>\n
                        <input type='number' class='form-control' name='cantidad' id='cantidad' value=" . $fila['cantidad'] . ">\n
                    </div>\n

                    <div class='mb-3'>\n
                        <label for='precioU' class='form-label'>Precio U.</label>\n
                        <input type='number' step='any' class='form-control' name='precioU' id='precioU' value=" . $fila['preciou'] . " disabled >\n
                    </div>\n

                    <div class='mb-3'>\n
                        <label for='total' class='form-label'>Total</label>\n
                        <input type='number' step='any' class='form-control' name='total' id='total' value=" . $fila['total'] . " disabled >\n
                    </div>\n

                    <div class='mb-3'>\n
                    <label for='pagado' class='form-label'>Pagado</label>\n
                    <select class='form-select form-select-sm' name='pagado' id='pagado'>\n";
                if ($fila["pagado"] === "0") {
                    echo "
                                    <option selected value='0'>No</option>
                                    <option value='1'>Si</option>
                                </select>\n
                            </div>\n";
                } else {
                    echo "
                                    <option value='0'>No</option>
                                    <option selected value='1'>Si</option>
                                </select>\n
                            </div>\n";
                }

                echo "<div class='mb-3'>\n
                    <label for='entregado' class='form-label'>Entregado</label>\n
                    <select class='form-select form-select-sm' name='entregado' id='entregado'>\n";
                if ($fila["entregado"] === "0") {
                    echo "
                                    <option selected value='0'>No</option>
                                    <option value='1'>Si</option>
                                </select>\n
                            </div>\n";
                } else {
                    echo "
                                    <option value='0'>No</option>
                                    <option selected value='1'>Si</option>
                                </select>\n
                            </div>\n";
                }
            }
        }
    }

    public function agregarCarrito($id, $cantidad)
    {
        $consultas = new Cons_Articulos();
        $datos = $consultas->getArticulo($id);

        if (is_string($datos)) {
            echo $datos;
        } else if ($datos) {
            while ($fila = mysqli_fetch_assoc($datos)) {
                $art_seleccionado = [
                    'id' => $fila['id'],
                    'descripcion' => $fila['descripcion'],
                    'grupo' => $fila['grupo'],
                    'imagen' => $fila['imagen'],
                    'precio' => $fila['precio'],
                    'cantidad' => $cantidad
                ];
            }
        }

        return $art_seleccionado;
    }

    public function mostrarArticulosSeleccionados()
    {
        $total = 0;
        foreach ($_SESSION['carrito'] as $id => $item) {
            $consultas = new Cons_Articulos();
            $datos = $consultas->getArticulo($id);

            if (is_string($datos)) {
                echo $datos;
            } else if ($datos) {
                while ($fila = mysqli_fetch_assoc($datos)) {
                    $subtotal = $item['cantidad'] * $fila['precio'];
                    $total = $total + $subtotal;

                    echo "<tbody>\n
                            <tr>\n
                                <td>" . $fila['descripcion'] . "</td>\n
                                <td>\n
                                    <img class='img-fluid rounded'
                                    src = '../../images/" . $fila["imagen"] . "' alt=''/>\n
                                </td>\n
                                <td>" . $fila['grupo'] . "</td>\n
                                <td>" . $fila['precio'] . "</td>\n
                                <td>\n
                                    <form method='POST' action='act_carrito.php'>\n
                                        <input class='cantidad' type='number' name='cantidad' value=" . $item['cantidad'] . " min=1>\n
                                        <input type='hidden' name='id' value=" . $item['id'] . ">\n
                                        <input class='actualizar' type='submit' name='actualizar' value='🔄️'>\n
                                    </form>\n
                                </td>\n
                                <td>" . $subtotal . " €</td>\n";

                                if($fila['grupo'] == '3D'){
                                    echo "<td>\n
                                            <form method='POST' action='personalizar_3d.php'>\n
                                                <input type='hidden' name='id' value=" . $item['id'] . ">\n
                                                <input class='personalizar' type='submit' name='personalizar' value='✏️'>\n
                                            </form>\n
                                        </td>\n";
                                } else if($fila['grupo'] == 'Laser') {
                                    echo "<td>\n
                                            <form method='POST' action='personalizar_laser.php'>\n
                                                <input type='hidden' name='id' value=" . $item['id'] . ">\n
                                                <input class='personalizar' type='submit' name='personalizar' value='✏️'>\n
                                            </form>\n
                                        </td>\n";
                                }
                            
                    echo  " <td>\n
                                <form method='POST' action='eliminar_carrito.php'>\n
                                    <input type='hidden' name='id' value=" . $item['id'] . ">\n
                                    <input class='eliminar' type='submit' name='eliminar' value='🗑️'>\n
                                </form>\n
                            </td>\n
                        </tr>\n
                    </tbody>";
                }
            }
        }
        echo "<tfoot>\n
                <tr>\n
                    <th colspan='6'>Total a Pagar</th>\n
                    <td><strong>" . $total . " €</<strong></td>\n
                    <td></td>\n
                </tr>\n
            </tfoot>";
    }

    public function agregarPersonalizar($id, $texto, $color, $disenyo, $fecha)
    {
        $cons_articulos = new Cons_Articulos;
        $datos = $cons_articulos -> getArticulo($id);

        if(is_string($datos)){
            echo $datos;
        } elseif ($datos){
            while($fila = mysqli_fetch_assoc($datos)){
                $articulo = $fila['descripcion'];
            }
        }

        $datos_personalizar = [
            'id' => $id,
            'articulo' => $articulo,
            'texto' => $texto,
            'color' => $color,
            'disenyo' => $disenyo,
            'fecha' => $fecha
        ];
        return $datos_personalizar;
    }


    public function mostrarArticuloPersonalizar($id)
    {
            $consultas = new Cons_Articulos();
            $datos = $consultas->getArticulo($id);

            if (is_string($datos)) {
                echo $datos;
            } else if ($datos) {
                while ($fila = mysqli_fetch_assoc($datos)) {
                    echo "<div class='titulo-personalizar'>\n
                            <h4>".$fila['descripcion']."</h4>\n
                        </div>\n
                        <div class='imagen-personalizar'>\n
                            <img src='../../images/".$fila['imagen']."' alt='Imagen Articulo'>\n
                    </div>";
                }
            }
    }

    public function mostrarResumen()
    {
        $total = 0;
        foreach ($_SESSION['carrito'] as $id => $item) {
            $consultas = new Cons_Articulos();
            $datos = $consultas->getArticulo($id);

            if (is_string($datos)) {
                echo $datos;
            } else if ($datos) {
                while ($fila = mysqli_fetch_assoc($datos)) {
                    $subtotal = $item['cantidad'] * $fila['precio'];
                    $total = $total + $subtotal;

                    echo "<tbody>\n
                            <tr>\n
                                <td>" . $fila['descripcion'] . "</td>\n
                                <td>\n
                                    <img width='50' class='img-fluid rounded'
                                    src = '../../images/" . $fila["imagen"] . "' alt=''/>\n
                                </td>\n
                                <td>" . $fila['grupo'] . "</td>\n
                                <td>" . $fila['precio'] . "</td>\n
                                <td>" . $item['cantidad'] . "</td>\n
                                <td>" . $subtotal . "</td>\n
                            </tr>\n
                        </tbody>";
                }
            }
        }
        echo "<tfoot>\n
                <tr>\n
                    <th colspan='4'>Total a Pagar</th>\n
                    <td><strong>" . $total . " €</<strong></td>\n
                    <td></td>\n
                </tr>\n
            </tfoot>";
    }


    // Mostrar contenido del desplegable con los usuarios registrados
    public function usuariosRegistrados()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Usuarios();
        $datos = $consultas->getUsuarios();

        //Comprobamos y recorremos los datos recogidos
        if (is_string($datos)) {
            echo $datos;
        } else if ($datos) {
            while ($fila = mysqli_fetch_assoc($datos)) {
                // Muestra los nombres de los usuarios que han echo pedidos
                $nombres = $fila['nombre'];
                $apellidos = $fila['apellidos'];

                echo '<option value="' . $nombres . '">' . $nombres . ' ' . $apellidos . '</option>';
            }
        } else {
            echo "<option disabled>No hay usuarios</option>";
        }
    }

    // Mostrar contenido del desplegable con los articulos disponibles
    public function articulosDisponibles()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Articulos();
        $datos = $consultas->getArticulos();

        //Comprobamos y recorremos los datos recogidos
        if (is_string($datos)) {
            echo $datos;
        } else if ($datos) {
            while ($fila = mysqli_fetch_assoc($datos)) {
                // Muestra los nombres de los usuarios que han echo pedidos
                $descripcion = $fila['descripcion'];

                echo '<option value="' . $descripcion . '">' . $descripcion . '</option>';
            }
        } else {
            echo "<option disabled>No hay artículos disponibles</option>";
        }
    }

    // Obtener id del usuario seleccionado en el formulario de pedidos
    public function getIdUsuario($nombre)
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Usuarios();
        $datos = $consultas->getIdUsuarioNombre($nombre);

        if (is_string($datos)) {
            echo $datos;
        } else if ($datos) {
            while ($fila = mysqli_fetch_assoc($datos)) {
                return $fila['id'];
            }
        }
    }

    // Obtener el id del artículo seleccionado en el formulario de pedidos.
    public function getIdArticulo($descripcion)
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Articulos();
        $datos = $consultas->getIdArticulo($descripcion);

        if (is_string($datos)) {
            echo $datos;
        } else if ($datos) {
            while ($fila = mysqli_fetch_assoc($datos)) {
                return $fila['id'];
            }
        }
    }

    // Obtener el precio del artículo seleccionado en el formulario de pedidos
    public function getPrecioArticulo($descripcion)
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Articulos();
        $datos = $consultas->getPrecioPorDescripcion($descripcion);

        if (is_string($datos)) {
            echo $datos;
        } else if ($datos) {
            while ($fila = mysqli_fetch_assoc($datos)) {
                return $fila['precio'];
            }
        }
    }

    //Inserción en la BD - desde admin
    public function guardarPedido($pedidoPor, $articulo, $cantidad)
    {
        $consultas = new Cons_Pedidos();

        $id_usuario = intval(self::getIdUsuario($pedidoPor));
        $id_articulo = intval(self::getIdArticulo($articulo));
        $precioU = floatval(self::getPrecioArticulo($articulo));
        $total = $cantidad * $precioU;

        $consultas->setPedido($id_usuario, $pedidoPor, $id_articulo, $articulo, $cantidad, $precioU, $total, $pagado = 0, $entregado = 0);
    }
}
