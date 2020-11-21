<?php

    class Controlador
    {
        private $usuario;
        /**
         * Constructor. Crea las variables de los modelos y la vista
         */
        public function __construct()
        {
            $this->usuario = new Usuario();
        }
    }