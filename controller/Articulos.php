<?php

include_once __DIR__ . '../../model/Cons_Articulos.php';

class Articulos
{
    // Lista todos los articulos de la BD
    public function mostrarArticulos()
    {
        $consultas = new Cons_Articulos();
        $datos = $consultas -> getArticulos();

        // Comprueba que hay datos antes de recorrerlos
        if (is_string($datos)) {
            echo $datos;
        } else {
            while ($fila = mysqli_fetch_assoc($datos)) {
                echo "<tr class='text-center'>\n
                        <td>" . $fila["id"] . "</td>\n
                        <td>" . $fila["descripcion"] . "</td>\n
                        <td>" . $fila["grupo"] . "</td>\n
                        <td>
                            <img width='50' class='img-fluid rounded'
                            src = '../../../images/" . $fila["imagen"] . "' alt=''/>
                        </td>\n
                        <td>" . $fila["precio"] . " €</td>\n
                        <td>\n
                        <form action='editar.php' method='POST'>\n
                            <input type='hidden' name='idArt' value='" . $fila['id'] . "'>\n
                            <input type='hidden' name='descArt' value='" . $fila['descripcion'] . "'>\n
                            <input type='hidden' name='grupoArt' value='" . $fila['grupo'] . "'>\n
                            <input type='hidden' name='imagenArticulo' value='" . $fila['imagen'] . "'>\n
                            <input type='hidden' name='precioArt' value='" . $fila['precio'] . "'>\n
                            <input type='submit' name='editarArt' id='editar' class='btn btn-success'value='Editar'>\n
                        </form>\n
                        </td>\n
                        <td>\n
                            <form action='index.php' method='POST'>\n
                                <input type='hidden' name='idArticulo' value='" . $fila['id'] . "'>\n
                                <input type='hidden' name='imagenArticulo' value='" . $fila['imagen'] . "'>\n
                                <input type='submit' name='eliminarArticulo' id='eliminar' class='btn btn-danger'value='Eliminar'>\n
                            </form>\n
                        </td>\n
                    </tr>";
            }
        }
    }

    //Validación de los campos e inserción en la BD
    public function guardarArticulo($desc, $grupo, $imagen, $precio)
    {
        if (empty($desc) || empty($precio)) {
            echo '<p class="error">Los campos Descripcion y Precio son obligatorios</p>';
            return;
        }

        if (strlen($desc) < 6) {
            echo '<p class="error">La descripcion debe tener más de 6 carácteres</p>';
            return;
        }

        $consultas = new Cons_Articulos();
        $consultas -> setArticulo($desc, $grupo, $imagen, $precio);
        echo '<p class="exito">Artículo Creado Correctamente</p>';
    }

    //Guarda la imagen asignandole una fecha para que haya duplicados.
    public function guardarImagen()
    {
        $fecha_foto = new DateTime();
        $nombreArchivo = '';

        if ($_FILES['fotoArticulo'] != '') {
            $nombreArchivo = $fecha_foto->getTimestamp() . '_' . $_FILES['fotoArticulo']['name'];
            $_FILES['fotoArticulo']['name'] = $nombreArchivo;
        }

        $tmp_foto = $_FILES['fotoArticulo']['tmp_name'];

        if ($tmp_foto != '') {
            move_uploaded_file($tmp_foto, '../../../images/' . $nombreArchivo);
        }
    }

    //Actualiza los campos en la base de datos.
    public function actualizarArticulos($id, $desc, $grupo, $precio)
    {
        if (empty($desc) || empty($grupo) || empty($precio)) {
            echo '<p class="error">Los campos Descripcion, Grupo y Precio son obligatorios</p>';
            return;
        }

        if (strlen($desc) < 6) {
            echo '<p class="error">La descripcion debe tener más de 6 carácteres</p>';
            return;
        }

        $consultas = new Cons_Articulos();
        $consultas -> actArticulos($id, $desc, $grupo, $precio);
        echo '<p class="exito">Artículo Actualizado Correctamente</p>';
    }

    //Actualiza la imagen por separado para que no haya conflictos
    public function actualizarImagen($id, $imagen)
    {
        $fecha_foto = new DateTime();

        if ($_FILES['fotoArticulo'] != '') {
            $imagen = $fecha_foto->getTimestamp() . '_' . $_FILES['fotoArticulo']['name'];
            $_FILES['fotoArticulo']['name'] = $imagen;
        }

        $tmp_foto = $_FILES['fotoArticulo']['tmp_name'];

        if ($tmp_foto != '') {
            move_uploaded_file($tmp_foto, '../../../images/' . $imagen);
        }

        $consultas = new Cons_Articulos();
        $consultas -> actImagen($id, $imagen);
    }
}
