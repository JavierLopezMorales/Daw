<?php
    session_start();
    
	include_once("controlador.php");
	$controlador = new Controlador();
	
	if (isset($_REQUEST["action"])) {
		$action = $_REQUEST["action"];
	} else {
		$action = "inicio";  // Acción por defecto
	}

    $controlador->$action();