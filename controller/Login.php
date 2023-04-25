<?php

include_once __DIR__ . '../../model/Cons_Login.php';
include_once __DIR__ . '../../controller/Usuarios.php';

class Login{

    public function obtenerPassword($email){
        $cons_login = new Cons_Login();
        $datos = $cons_login -> getPassword($email);

        if(is_string($datos)){
            echo $datos;
        } else if($datos){
            while($fila = mysqli_fetch_assoc($datos)){
                return $fila['password'];
            }
        }
    }

    public function validarPermisos($email){
        $cons_login = new Cons_Login();
        $datos = $cons_login -> getPermisos($email);

        if(is_string($datos)){
            echo $datos;
        } else if($datos){
            while($fila = mysqli_fetch_assoc($datos)){
                return $fila['permisos'];
            }
        }
    }

    public function existeEmail($email){
        $cons_login = new Cons_Login();
        $datos = $cons_login->verificarEmail($email);

        if(is_string($datos)){
            echo $datos;
        } else if($datos){
            while($fila = mysqli_fetch_assoc($datos)){
                return $fila;
            }
        }
        
    }

    public function validarConfirmado($email){
        $cons_login = new Cons_Login();
        $datos = $cons_login -> getConfirmado($email);

        if(is_string($datos)){
            echo $datos;
        } else if($datos){
            while($fila = mysqli_fetch_assoc($datos)){
                return $fila['confirmado'];
            }
        }
    }

    public function setLogin($email){
        $permisos = self::validarPermisos($email);
        
        if($permisos == 0){
            $_SESSION['email'] = $email;
            header('Location: views/users/index.php');
        } else if ($permisos == 1){
            $_SESSION['email'] = $email;
            header('Location: views/admin/index.php');
        }

    }

    public function setSession($email){
        $usuario = new Usuarios();
        $datos_usuario = $usuario -> obtenerDatosUsuario($email);

        $_SESSION['id'] = $datos_usuario['id'];
        $_SESSION['nombre'] = $datos_usuario['nombre'];
        $_SESSION['apellidos'] = $datos_usuario['apellidos'];
        $_SESSION['telefono'] = $datos_usuario['telefono'];
    }


}