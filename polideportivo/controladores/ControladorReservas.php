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

        // Mostrar el calendario
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

        // Mostrar la tabla de las reservas de el dia seleccionado
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

        // Mostrar el formulario de creacion de reservas
        public function crearReservas()
        {
            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $this->vista->mostrar("reservas/formularioReserva");
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        // Recoger los datos del formulario e insertalos en la base de datos
        public function insertarReservas()
        {
            if($this->seguridad->haySesionIniciada())
            {
                $price = $_REQUEST['price'];
                $time = $_REQUEST['time'];
                $date = $_REQUEST['date'];
                $idUser = $_REQUEST['idUser'];
                $idFacility = $_REQUEST['idFacility'];
    
                $result = $this->reserva->crearReserva($price, $time, $date, $idUser, $idFacility);
    
                if($result)
                {
                    $data['msjInfo'] = "Reserva creada con exito";
                    $data['listaReservas'] = $this->reserva->getAll();
                    $this->vista->mostrar("reservas/listaReservas", $data);
                }
                else
                {
                    $data['msjError'] = "Error en la creación de la reserva";
                    $data['listaReservas'] = $this->reserva->getAll();
                    $this->vista->mostrar("reservas/listaReservas", $data);
                }
                    
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
            

        }

        // Borrar una reserva
        public function borrarReserva()
        {
            if($this->seguridad->haySesionIniciada())
            {
                $idReservation = $_REQUEST['id'];
                $result = $this->reserva->borrarReserva($idReservation);
                if($result)
                {
                    $data['msjInfo'] = "Borrado con exito";
                    $data['listaReservas'] = $this->reserva->getAll();
                    $this->vista->mostrar("reservas/listaReservas", $data);
                }
                else
                {
                    $data['msjError'] = "Error en el borrado";
                    $this->vista->mostrar("reservas/listaReservas", $data);
                }
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        // Mostrar el formulario de modificacion de reservas
        public function modificarReserva()
        {
            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $idReservation = $_REQUEST['id'];
                $data['listaReservas'] = $this->reserva->getReserva($idReservation);
                $this->vista->mostrar("reservas/formularioReserva", $data);
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }
        }

        // Recoger los datos del formulario e insertarlos
        public function modificacionReserva()
        {

            if($this->seguridad->haySesionIniciada())/* && $_SESSION["type"] == "admin"*/
            {
                $idReservation = $_REQUEST['idReservation'];
                $price = $_REQUEST['price'];
                $time = $_REQUEST['time'];
                $date = $_REQUEST['date'];
                $idFacility = $_REQUEST['idFacility'];
    
                $result = $this->reserva->modificarReserva($idReservation, $price, $time, $date, $idFacility);
    
                if($result)
                {
                    $data['msjInfo'] = "Reserva modificada con exito";
                    $data['listaReservas'] = $this->reserva->getAll();
                    $this->vista->mostrar("reservas/listaReservas", $data);
                }
                else
                {
                    $data['msjError'] = "Error en la modificacion";
                    $data['listaReservas'] = $this->reserva->getAll();
                    $this->vista->mostrar("reservas/listaReservas", $data);
                }
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }

        }

    }