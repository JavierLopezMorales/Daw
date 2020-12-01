<?php

    include_once("./modelos/instalacion.php");
    include_once("./modelos/usuario.php");
    include_once("./vista.php");
    include_once("./modelos/seguridad.php");

    class ControladorInstalaciones
    {
        private $instalacion, $usuario, $vista;
        /**
         * Constructor. Crea las variables de los modelos y la vista
         */
        public function __construct()
        {
            $this->instalacion = new Instalacion();
            $this->usuario = new Usuario();
            $this->vista = new Vista();
            $this->seguridad = new Seguridad();
        }

        public function mostrarInstalaciones()
        {
            if($this->seguridad->haySesionIniciada())
            {
                $data['listaInstalaciones'] = $this->instalacion->getAll();
                $this->vista->mostrar("instalaciones/listaInstalaciones", $data);
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }
    }