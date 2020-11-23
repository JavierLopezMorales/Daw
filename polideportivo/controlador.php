<?php

    include_once("modelos/usuario.php");
    include_once("vista.php");
    include_once("modelos/seguridad.php");

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
            $this->seguridad = new Seguridad();
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

            $existe = $this->usuario->buscarUsuario($usuario, $password);

            if ($existe) {
                $data['msjInfo'] = "Sesión iniciada correctamente";
                $this->seguridad->abrirSesion($existe);
                $this->vista->mostrar("inicio", $data);
            } else {
                // Error al iniciar la sesión
                $data['msjError'] = "Nombre de usuario o contraseña incorrectos";
                $this->vista->mostrar("login", $data);
            }
        }

        /**
         * Cierra la sesión
         */
        public function cerrarSesion()
        {
            $data['msjInfo'] = "Sesión cerrada correctamente";
            $this->seguridad->cerrarSesion();
            $this->vista->mostrar("login");
        }

    }