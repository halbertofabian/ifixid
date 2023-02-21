<?php
if (isset($_GET)) {
    if (isset($_GET['ext']) && isset($_GET['tokenAuth'])) { // Estas variables indican que el usuario viene desde otro software 
        // Cargar sessión del usuario -> usr
        $usr = UsuariosModelo::mdlMostrarUsuarioToken($_GET['tokenAuth']);
        $_SESSION['usr'] = $usr;


        // Cargar session de la sucursal -> scl
        $scl = SucursalesModelo::mdlConsultarSucursalBySclId($_GET['suc']);
        $_SESSION['scl'] = $scl;

        //Cargar session de la suscripción -> spn
        $spn = SuscripcionesModelo::mdlMostrarSuscripcion($_SESSION['usr']['suscriptor']);
        $_SESSION['spn'] = $spn;

        // Redirigir a la pagina deseada
        header('Location:' . HTTP_HOST . $_GET['direction']);
    } else {
        if (!isset($_SESSION['usr'])) {
            header('Location:' . URL_SOFTMOR);
            die();
        }
        if ($_SESSION['usr']['perfil'] == 'Administrador') {
            $listaBlanca = AppControlador::obtenerListaAdministradores();
        }

        //Guardar en la variable la ruta que venga de GET
        //Crea un arreglo vacio
        $rutas = array();

        // Crea los elementos del arreglo a partir de caracter /
        $rutas = explode("/", $_GET['ruta']);

        // Asigna a la variable el primer item del arreglo que será la página
        $ruta_get = $rutas[0];
        //Inicializamos una bandera en true para ver si hay pagina admitida
        $_404 = true;
        //Recorremos la lista de paginas admitidas
        foreach ($listaBlanca as $item) {
            //Si hay una conincidencia con lo que venga por GET y un elemento de mi lista
            if ($ruta_get == $item) {
                //Marcar la bandera en false indicando que si existe la pagina
                $_404 =  false;
            }
        }
        //Guardar la pagina mostrar dependiendo la bandera
        $page = $_404 ? '404' : $ruta_get;

        //Cargar la pagina solicitada
        cargarPaginaV2($page, $rutas);
    }
}
