<?php ob_start();

include_once 'config.php';
cargarPagina('zona_horaria');

require_once 'app/modulos/app/app.controlador.php';


//Iniciar aplicacion
iniciarApp();


ob_end_flush();
