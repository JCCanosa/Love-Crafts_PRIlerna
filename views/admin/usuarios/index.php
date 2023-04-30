<?php

include '../../../templates/header.php';
include '../../../templates/navAdmin.php';
include_once __DIR__ . '../../../../controller/Usuarios.php';
include_once __DIR__ . '../../../../model/Cons_Usuarios.php';
$usuario = new Usuarios();
$consultas = new Cons_Usuarios();
?>

<br>
<h3 class="titulo-vista-admin">Usuarios Registrados</h3>
<div class="card">
    <div class="card-header">
        <div class="buscador-admin">
            <form action="index.php" method="get">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
                <input class="btn btn-primary" type="submit" name="buscar" value="Buscar">
                <input class="btn btn-primary" type="submit" name="reset" value="Ver Todos">
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-usuarios">
                <thead>
                    <tr class="text-center" style="background-color: #F7F7F7;">
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Confirmado</th>
                        <th scope="col">Permisos</th>
                        <th scope="col">Editar Usuario</th>
                        <th scope="col">Eliminar Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['editarUsuario'])) {
                        $permisos = intval($_POST['permisosUsuario']);
                        $id = intval($_POST['idUsuario']);
                        $consultas->editarPermisosUsuarios($permisos, $id);
                    }
                    if (isset($_POST['eliminarUsuario'])) {
                        $id = intval($_POST['idUsuario']);
                        $consultas->eliminarUsuario($id);
                    }

                    if (isset($_GET['buscar'])) {
                        $nombre = $_GET['nombre'];

                        if ($nombre) {
                            $usuario->mostrarUsuariosBuscador($nombre);
                        }
                    } elseif (isset($_GET['reset'])) {
                        $usuario->mostrarUsuarios();
                    } else {
                        $usuario->mostrarUsuarios();
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../../../templates/footer.php'; ?>