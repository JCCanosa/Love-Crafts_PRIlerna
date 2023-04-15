<?php
$url_abs = "http://localhost/ProyectoIlerna/";
?>

<header>
        <nav class="navbar navbar-expand navbar-light bg-light">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo $url_abs;?>views/admin" aria-current="page">Inicio <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_abs; ?>views/admin/pedidos/">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_abs; ?>views/admin/articulos/">Artículos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_abs; ?>views/admin/usuarios/">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url_abs; ?>cerrar.php">Cerrar Sesión</a>
                </li>
            </ul>
        </nav>
</header>