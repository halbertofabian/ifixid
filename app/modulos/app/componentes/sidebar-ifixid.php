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
            <div class="d-flex align-items-center py-3"><img class="me-2" src="<?= HTTP_HOST.'app/img/ifixit_x.png' ?>" alt="" width="40" /><span class="font-sans-serif" style="font-size:15px">IFIX ID</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">ifix ID
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link <?= showOptionMenu(1,'ifx') ?>" href="<?= HTTP_HOST.'ifx' ?>" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                    <a class="nav-link <?= showOptionMenu(1,'ifx/nueva_sucursal') ?>" href="<?= HTTP_HOST.'ifx/nueva_sucursal' ?>" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-store-alt"></span></span><span class="nav-link-text ps-1">+ Sucursales</span>
                        </div>
                    </a>
                    <a class="nav-link <?= showOptionMenu(1,'ifx/cotizaciones') ?>" href="<?= HTTP_HOST.'ifx/cotizaciones' ?>" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-notes-medical"></span></span><span class="nav-link-text ps-1">Cotizaciones</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>