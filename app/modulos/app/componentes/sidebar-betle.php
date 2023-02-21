<?php
function showOptionMenu($tipo, $ruta)
{
    $extracto_link = $_GET['ruta'] ?? '';
    $link = ($tipo == 0) ? explode('/', $extracto_link)[0] ?? $extracto_link : $extracto_link;

    return ($ruta == $link) ? (($tipo == 0) ? 'show' : 'active') : '';
}
?>

<script>
    var isFluid = JSON.parse(localStorage.getItem('isFluid'));
    if (isFluid) {
        var container = document.querySelector('[data-layout]');
        container.classList.remove('container');
        container.classList.add('container-fluid');
    }
</script>

<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

        </div><a class="navbar-brand" href="index.html">
            <div class="d-flex align-items-center py-3"><img class="me-2" src="https://softmor.com/images/isotipo_png.png" alt="" width="40" /><span class="font-sans-serif" style="font-size:15px">SOFTMOR</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-store"></span></span><span class="nav-link-text ps-1">eEommerce</span>
                        </div>
                    </a>
                    <ul class="nav collapse <?= showOptionMenu(0, 'tienda') ?> " id="e-commerce">
                        <li class="nav-item"><a class="nav-link <?= showOptionMenu(1, 'tienda') ?> " href="<?= HTTP_HOST . 'tienda' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Inicio</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link <?= showOptionMenu(1, 'tienda/pedidos') ?> " href="<?= HTTP_HOST . 'tienda/pedidos' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Pedidos</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link <?= showOptionMenu(1, 'tienda/envios') ?> " href="<?= HTTP_HOST . 'tienda/envios' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Envios</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link <?= showOptionMenu(1, 'tienda/cupones') ?> " href="<?= HTTP_HOST . 'tienda/cupones' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Cupones</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link <?= showOptionMenu(1, 'tienda/pagos') ?> " href="<?= HTTP_HOST . 'tienda/pagos' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Pagos</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link <?= showOptionMenu(1, 'tienda/configuracion') ?>" href="<?= HTTP_HOST . 'tienda/configuracion' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Configuración</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#inventario" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="inventario">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-docker"></span></span><span class="nav-link-text ps-1">Inventario</span>
                        </div>
                    </a>
                    <ul class="nav collapse <?= showOptionMenu(0, 'inventario') ?> " id="inventario">
                        <li class="nav-item"><a class="nav-link <?= showOptionMenu(1, 'inventario/productos') ?> " href="<?= HTTP_HOST . 'inventario/productos' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Productos</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link <?= showOptionMenu(1, 'inventario/categorias') ?>  " href="<?= HTTP_HOST . 'inventario/categorias' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Categorías</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link <?= showOptionMenu(1, 'inventario/control_stock') ?> " href="<?= HTTP_HOST . 'inventario/control_stock' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Poco stock</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item "><a class="nav-link <?= showOptionMenu(1, 'inventario/ajuste') ?> " href="<?= HTTP_HOST . 'inventario/ajuste' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Ajuste de inventario</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link <?= showOptionMenu(1, 'inventario/movimientos') ?> " href="<?= HTTP_HOST . 'inventario/movimientos' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Traspasos</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link <?= showOptionMenu(1, 'inventario/compras') ?> " href="<?= HTTP_HOST . 'inventario/compras' ?>">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Compras</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>