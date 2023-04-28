<?php
$url_absoluta = "http://localhost/PRIlerna/";
?>

<header>
        <nav class="navegacion">
            <ul class="navegacion-ul">
                <li class="navegacion-li">
                    <a class="navegacion-enlace" href="<?php echo $url_absoluta;?>views/admin" aria-current="page">Inicio</a>
                </li>
                <li class="navegacion-li">
                    <a class="navegacion-enlace" href="<?php echo $url_absoluta; ?>views/admin/pedidos/">Pedidos</a>
                </li>
                <li class="navegacion-li">
                    <a class="navegacion-enlace" href="<?php echo $url_absoluta; ?>views/admin/articulos/">Artículos</a>
                </li>
                <li class="navegacion-li">
                    <a class="navegacion-enlace" href="<?php echo $url_absoluta; ?>views/admin/usuarios/">Usuarios</a>
                </li>
                <li class="navegacion-li">
                    <a class="navegacion-enlace" href="<?php echo $url_absoluta; ?>views/cerrar.php">Cerrar Sesión</a>
                </li>
            </ul>
        </nav>
</header>
