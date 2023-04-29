<?php

include_once __DIR__ . '../../model/Cons_Login.php';
include_once __DIR__ . '../../controller/Login.php';

class Alertas
{

    public function validarDatosLogin($email, $password)
    {
        $cons_login = new Cons_Login();
        $login = new Login();
        $val_email = $cons_login->getEmail($email);
        $val_password = $login->obtenerPassword($email);
        $val_confirmado = $login->validarConfirmado($email);
        $alertas = [];

        if (empty($email) || empty($val_email)) {
            $alertas['error'][] =  'Debe introducir un Email válido';
        }

        if (empty($password) || !password_verify($password, $val_password)) {
            $alertas['error'][] =  'Debe introducir un Password válido';
        }

        if ($val_confirmado == 0) {
            $alertas['error'][] = 'Antes de acceder debe confirmar su dirección de correo';
        }

        return $alertas;
    }


    //Validar datos de formulario registro
    public function validarDatosRegistro($nombre, $apellidos, $email, $password, $telefono)
    {
        $alertas = [];
        $login = new Login();
        $val_email = $login->existeEmail($email);

        if (empty($nombre) || empty($apellidos) || empty($email) || empty($password) || empty($telefono)) {
            $alertas['error'][] =  'Todos los campos son Obligatorios';
        }
        if (!empty($val_email)) {
            $alertas['error'][] =  'La dirección de correo introducida ya existe';
        }
        if (strlen($password) < 6) {
            $alertas['error'][] =  'El Password debe contener al menos 6 cáracteres';
        }
        if (strlen($nombre) < 2) {
            $alertas['error'][] =  'El Nombre debe contener más de 2 carácteres';
        }
        if (strlen($telefono) != 9 || !is_numeric($telefono)) {
            $alertas['error'][] =  'El Teléfono debe contener 9 Números';
        }

        return $alertas;
    }

    //Validar datos de formulario recuperar
    public function validarDatosRecuperar($email)
    {
        $alertas = [];
        $login = new Login();
        $val_email = $login->existeEmail($email);

        if (empty($email)) {
            $alertas['error'][] =  'El Email es Obligatorio';
        }
        if (empty($val_email)) {
            $alertas['error'][] =  'La dirección de correo introducida No existe';
        }
        return $alertas;
    }

    //Validar datos de formulario recuperar
    public function validarNuevoPassword($password)
    {
        $alertas = [];

        if (empty($password)) {
            $alertas['error'][] =  'El Password es Obligatorio';
        }
        if (strlen($password) < 6) {
            $alertas['error'][] =  'El Password debe contener al menos 6 cáracteres';
        }
        return $alertas;
    }

    //Validar datos de formulario Crear y Actualizar Articulos
    public function validarDatosArticulos($desc, $precio, $grupo)
    {
        $alertas = [];

        if (empty($desc) || empty($precio)) {
            $alertas['error'][] =  'Los campos Descripcion y Precio son obligatorios';
        }
        if (strlen($desc) < 4) {
            $alertas['error'][] =  'La descripcion debe contener al menos 4 carácteres';
        }
        if (!isset($grupo) || $grupo == '0') {
            $alertas['error'][] =  'Debe seleccionar un Grupo';
        }

        return $alertas;
    }

    //Validar datos de formulario Crear Pedidos
    public function validarDatosPedidos($pedidoPor, $articulo, $cantidad)
    {
        $alertas = [];

        if (!isset($pedidoPor) || $pedidoPor == '0') {
            $alertas['error'][] =  'Debe seleccionar un Usuario';
        }
        if (!isset($articulo) || $articulo == '0') {
            $alertas['error'][] =  'Debe seleccionar un Artículo';
        }
        if (empty($cantidad)) {
            $alertas['error'][] =  'Debe introducir al menos 1 unidad';
        }
        return $alertas;
    }

    //Validar datos de formulario Editar Pedidos
    public function validarDatosPedidosAct($cantidad)
    {
        $alertas = [];

        if (empty($cantidad)) {
            $alertas['error'][] =  'Debe introducir al menos 1 unidad';
        }
        return $alertas;
    }
}
