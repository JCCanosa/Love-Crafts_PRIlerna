<?php
    include '../../../templates/header.php';
    include '../../../templates/navAdmin.php';
    include '../../../templates/alertas.php';
    include_once __DIR__ . '../../../../controller/Articulos.php';
    include_once __DIR__ . '../../../../controller/Alertas.php';
    include_once __DIR__ . '../../../../model/Cons_Articulos.php';
    $articulo = new Articulos();
    $consultas = new Cons_Articulos();
    $alertas = new Alertas();
?>

<br>
<h3 class="titulo-vista-admin">Gestión de Artículos</h3>
<div class="card">
    <div class="card-header">
        <a name="crearArticulo" id="crearArticulo" class="btn btn-primary" href="crear.php" role="button">Crear Nuevo Artículo</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr class="text-center" style="background-color: #F7F7F7;">
                        <th scope="col">Id</th>
                        <th scope="col">Descripción artículo</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (isset($_POST['editarArticulo'])) {
                        $_POST;
                    }
                    
                    if (isset($_POST['agregarArticulo'])) {
                        $id = $_POST['idArt'];
                        $desc = $_POST['descripcionArticulo'];
                        $grupo = $_POST['grupoArticulo'];
                        $precio = $_POST['precioArticulo'];
                        $validarDatos = $alertas->validarDatosArticulos($desc, $precio, $grupo);

                        if($validarDatos){
                            echo mostrarAlertas($validarDatos);
                        } else {
                            $articulo->actualizarArticulos($id, $desc, $grupo, $precio);
                            if ($_FILES) {
                                $imagen = $_FILES['fotoArticulo']['name'];
                                $articulo->actualizarImagen($id, $imagen);
    
                                $imagen = $_POST['fotoArticulo'];
                                if (file_exists("../../../images/" . $imagen)) {
                                    unlink("../../../images/" . $imagen);
                                }
                            }
                        }
                        
                    }

                    if (isset($_POST['eliminarArticulo'])) {
                        $imagen = $_POST['imagenArticulo'];
                        if (file_exists("../../../images/" . $imagen)) {
                            unlink("../../../images/" . $imagen);
                        }

                        $id = intval($_POST['idArticulo']);
                        $consultas->eliminarArticulo($id);
                    }

                    $articulo->mostrarArticulos();
                    ?>
                </tbody>
            </table>

        </div>
    </div>

</div>


<?php include '../../../templates/footer.php'; ?>