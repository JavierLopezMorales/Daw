<?php

    include_once("./modelos/reserva.php");
    include_once("./modelos/usuario.php");
    include_once("./vista.php");
    include_once("./modelos/seguridad.php");

    class ControladorReservas
    {
        private $reserva, $vista;
        /**
         * Constructor. Crea las variables de los modelos y la vista
         */
        public function __construct()
        {
            $this->reserva = new Reserva();
            $this->vista = new Vista();
            $this->seguridad = new Seguridad();
        }

        public function mostrarReservas()
        {
            if($this->seguridad->haySesionIniciada())
            {
                $data['listaReservas'] = $this->reserva->getAll();
                $this->vista->mostrar("reservas/listaReservas", $data);
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }

        }

        public function mostrarDia()
        {
            if($this->seguridad->haySesionIniciada())
            {
                $fecha = $_REQUEST['fecha'];
                $data['listaReservas'] = $this->reserva->getAllDate($fecha);
                $this->vista->mostrar("reservas/tablaListaReservas", $data);
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }

        }

    }