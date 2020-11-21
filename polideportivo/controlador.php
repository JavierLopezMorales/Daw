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

        public function inicio()
        {
            $this->vista->mostrar("inicio");
        }

        public function mostrarLogin()
        {
            $this->vista->mostrar("login");
        }

        public function procesarLogin()
        {
            $usuario = $_REQUEST["usuario"];
            $password = $_REQUEST["password"];

            $result = $this->usuario->buscarUsuario($usuario, $password);

            if($result)
            {
                $this->vista->mostrar("inicio");
            }
            else
            {
                $this->vista->mostrar("login");
            }
        }

    }