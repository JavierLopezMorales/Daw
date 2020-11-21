<?php

    include_once("modelos/usuario.php");
    include_once("vista.php");

    class Controlador
    {
        private $usuario, $vista;
        /**
         * Constructor. Crea las variables de los modelos y la vista
         */
        public function __construct()
        {
            $this->usuario = new Usuario();
            $this->vista = new Vista();
        }

        public function inicio(){
            $this->vista->mostrar("inicio");
        }

    }