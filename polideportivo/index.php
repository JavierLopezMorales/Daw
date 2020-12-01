<?php
    session_start();
    // Tendremos que utilizar una nueva variable de control llamada "direction"
    // la tendremos que pasar por la URL junto con "action" en cada llamada a index.php

    // Primero, averiguamos que controlador se pretende utilizar
    if (isset($_REQUEST["direction"])) {
        $direction = $_REQUEST["direction"];
    }
    else {
        $direction = "ControladorUsuarios";    // Suponemos que este es el controlador por defecto
	}
	
    include_once("controladores/".$direction.".php");

    // Ahora averiguamos qué método (action) del controlador se está invocando
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    }
    else {
        $action = "inicio"; 
    }

    // Instanciamos el controlador e invocamos el método
    $controlador = new $direction();
    $controlador->$action();