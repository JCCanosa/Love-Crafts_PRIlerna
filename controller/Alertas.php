<?php

class Alertas
{
    //Validar datos de formulario registro
    public function validarDatosRegistro($nombre, $apellidos, $email, $password, $telefono)
    {
        $alertas = [];

        if (empty($nombre) || empty($apellidos) || empty($email) || empty($password) || empty($telefono)) {
            $alertas['error'][] =  'Todos los campos son Obligatorios';
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
        if(!isset($grupo) || $grupo == '0'){
            $alertas['error'][] =  'Debe seleccionar un Grupo';
        }

        return $alertas;
    }
}
