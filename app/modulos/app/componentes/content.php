<?php
if (!isset($_GET['store'])) {
    cargarPagina('principal');
}
if (isset($_GET['store'])) {
    $rutas = explode(',', $_GET['store']);
    if (isset($rutas[1])) {
        // En este apartaron cargaran aquellas vistas que sean de ifixi id

    } else {
        // Cargar el perfil de la sucursal solicitada
        if (explode('/', $_GET['store'])[0] == 'st') {
            cargarPagina('consulta', $rutas[0]);
        } else {
            cargarPagina('negocio', $rutas[0]);
        }
    }
}
