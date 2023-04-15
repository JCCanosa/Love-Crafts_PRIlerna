<?php

include_once __DIR__ . '../../model/Cons_Usuarios.php';

class Usuarios
{
    //Validación de los campos del formulario de registro e inserción a la BD
    public function guardarUsuario($nombre, $apellidos, $email, $password, $telefono, $validador)
    {
        if (empty($nombre) || empty($apellidos) || empty($email) || empty($password) || empty($telefono)) {
            echo '<p class="error">Todos los campos son Obligatorios</p>';
            return;
        }

        if (strlen($nombre) < 2) {
            echo '<p class="error">El Nombre debe tener más de 2 carácteres</p>';
            return;
        }
        if (strlen($telefono) != 9) {
            echo '<p class="error">El Teléfono debe contener 9 Números</p>';
            return;
        }

        $consultas = new Cons_Usuarios();
        $consultas->setUsuario($nombre, $apellidos, $email, $password, $telefono, $confirmado = 0, $permisos = 0, $validador);
        echo '<p class="exito">Usuario Creado Correctamente</p>';
    }

    //Hash password
    public function hashPassword($password)
    {
        $password_hasheado = password_hash($password, PASSWORD_BCRYPT);
        return $password_hasheado;
    }

    //Crear un validador, para confirmar el email
    public function setValidador()
    {
        $validador = uniqid();
        return $validador;
    }

    //Listar todos los usuarios
    public function mostrarUsuarios()
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Usuarios();
        $datos = $consultas->getUsuarios();

        //Comprobamos y recorremos los datos recogidos
        if (is_string($datos)) {
            echo $datos;
        } else {
            while ($fila = mysqli_fetch_assoc($datos)) {

                //Cambia el formato de salida de confirmado y permisos para que el usuario lo vea claro.
                $filaConfirmado = '';
                if ($fila["confirmado"] == 1) {
                    $filaConfirmado = 'Si';
                } else {
                    $filaConfirmado = 'No';
                }

                $filaPermisos = '';
                if ($fila["permisos"] == 1) {
                    $filaPermisos = 'Administrador';
                } else {
                    $filaPermisos = 'Usuario';
                }

                //Muestra por pantalla una tabla con los usuarios
                echo "<tr class='text-center'>
                        <td>" . $fila["id"] . "</td>\n
                        <td>" . $fila["nombre"] . "</td>\n
                        <td>" . $fila["apellidos"] . "</td>\n
                        <td>" . $fila["email"] . "</td>\n
                        <td>" . $fila["telefono"] . "</td>\n
                        <td>" . $filaConfirmado . "</td>\n
                        <td>" . $filaPermisos . "</td>\n
                        <td>\n
                            <a name='editar' id='editar' class='btn btn-success' href='editar.php?id=" . $fila["id"] . "&permisos=" . $fila["permisos"] . "' role='button'>Editar</a>\n
                        </td>\n
                        <td>\n
                            <form action='index.php' method='POST'>\n
                                <input type='hidden' name='idUsuario' value='" . $fila['id'] . "'>\n
                                <input type='submit' name='eliminarUsuario' id='eliminar' class='btn btn-danger'value='Eliminar'>\n
                            </form>\n
                        </td>\n
                    </tr>";
            }
        }
    }

    //Muestra un usuario concreto en base a su id, para cuando entramos a editar.
    public function mostrarUnUsuario($id)
    {
        //Recogemos los datos de la consulta
        $consultas = new Cons_Usuarios();
        $datos = $consultas->getUsuarios();

        //Comprobamos y recorremos los datos recogidos
        if (is_string($datos)) {
            echo $datos;
        } else {
            while ($fila = mysqli_fetch_assoc($datos)) {

                //Cambiamos el formato de salida del campo confirmado
                $filaConfirmado = '';
                if ($fila["confirmado"] == 1) {
                    $filaConfirmado = 'Si';
                } else {
                    $filaConfirmado = 'No';
                }

                // Muestra por pantalla un formulario con los datos del usuario.
                // Solo puede modificar los permisos del mismo
                echo "<div class='mb-3'>\n
                        <label for='idUsuario' class='form-label'>Id Usuario</label>\n
                        <input type='number' value=" . $fila['id'] . " disabled\n
                            class='form-control' name='idUsuario' id='idUsuario'>\n
                        <input type='hidden' value=" . $fila['id'] . " name='idUsuario' id='idUsuario'>\n
                    </div>
                    <div class='mb-3'>\n
                        <label for='nombreUsuario' class='form-label'>Nombre</label>\n
                        <input type='text' value=" . $fila['nombre'] . " disabled\n
                            class='form-control' name='nombreUsuario' id='nombreUsuario'>\n
                    </div>
                    <div class='mb-3'>\n
                        <label for='apellidosUsuario' class='form-label'>Apellidos</label>\n
                        <input type='text' value=" . $fila['apellidos'] . " disabled\n
                            class='form-control' name='apellidosUsuario' id='apellidosUsuario'>\n
                    </div>
                    <div class='mb-3'>\n
                        <label for='emailUsuario' class='form-label'>Email</label>\n
                        <input type='email' value=" . $fila['email'] . " disabled\n
                            class='form-control' name='emailUsuario' id='emailUsuario'>\n
                    </div>
                    <div class='mb-3'>\n
                        <label for='telefonoUsuario' class='form-label'>Teléfono</label>\n
                        <input type='tel' value=" . $fila['telefono'] . " disabled\n
                            class='form-control' name='telefonoUsuario' id='telefonoUsuario'>\n
                    </div>
                    <div class='mb-3'>\n
                        <label for='confirmadoUsuario' class='form-label'>Confirmado</label>\n
                        <input type='text' value=" . $filaConfirmado . " disabled\n
                            class='form-control' name='confirmadoUsuario' id='confirmadoUsuario'>\n
                    </div>
                    <div class='mb-3'>\n
                    <label for='permisosUsuario' class='form-label'>Permisos</label>\n
                        <select class='form-select form-select-sm' name='permisosUsuario' id='permisosUsuario'>\n";
                if ($fila["permisos"] === "0") {
                    echo "
                                <option selected value='0'>Usuario</option>
                                <option value='1'>Administrador</option>
                            </select>\n
                            </div>";
                } else {
                    echo "
                                <option value='0'>Usuario</option>
                                <option selected value='1'>Administrador</option>
                            </select>\n
                            </div>";
                }
            }
        }
    }
}
