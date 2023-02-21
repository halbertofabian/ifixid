<?php
if (!isset($_GET['ruta'])) {
    cargarPagina('principal');
}
if (isset($_GET['ruta'])) {
    $rutas = explode(',', $_GET['ruta']);
    if (isset($rutas[1])) {
        // En este apartaron cargaran aquellas vistas que sean de ifixi id

    } else {
        // Cargar el perfil de la sucursal solicitada
        cargarPagina('negocio',$rutas[0]);
    }
}
