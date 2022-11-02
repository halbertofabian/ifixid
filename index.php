<?php ob_start();

include_once 'config.php';

require_once 'app/modulos/main/main.controlador.php';

//Iniciar aplicacion
iniciarApp();


ob_end_flush();