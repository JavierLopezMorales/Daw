<?php

    include_once("./modelos/reserva.php");
    include_once("./modelos/usuario.php");
    include_once("./modelos/instalacion.php");
    include_once("./vista.php");
    include_once("./modelos/seguridad.php");

    class ControladorReservas
    {
        private $reserva, $vista, $instalacion;
        /**
         * Constructor. Crea las variables de los modelos y la vista
         */
        public function __construct()
        {
            $this->reserva = new Reserva();
            $this->instalacion = new Instalacion();
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
                $idUser = $_SESSION['idUser'];
                if( $_SESSION['type'] == 'admin'){
                    $data['listaReservas'] = $this->reserva->getAllDate($fecha);
                    $this->vista->mostrar("reservas/tablaListaReservas", $data);
                }
                $data['listaReservas'] = $this->reserva->getDate($idUser, $fecha);
                if($data){
                    $this->vista->mostrar("reservas/tablaListaReservas", $data);
                }
                
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
    
                if($date < date('Y-m-d'))
                {
                    $data['msjError'] = "No puedes reservar un dia anterior al actual";
                    $this->vista->mostrar("reservas/formularioReserva", $data);
                }
                else
                {
                    /////////////////
                    //  COMPROBAR HORAS TOTALES RESTANTES PARA EL USUARIO HACIENDO LA RESERVA 
                    ////////////////

                    // Ver horas totales de la instalacion
                    $maxDuration['lista'] = $this->instalacion->getMaxDuration($idFacility);

                    // Ver horas de la reserva
                    $duration = $_REQUEST['duration'];

                    // Si $duration > $maxDuration ERROR
                    foreach($maxDuration['lista'] as $duracionMaxima)
                    {
                        if($duration > $duracionMaxima->maxDuration)
                        {
                            $data['msjError'] = "La duracion de su reserva es demasiado alta";
                            $this->vista->mostrar("reservas/formularioReserva", $data);
                        }
                        else
                        {

                            $sumDur['lista'] = $this->reserva->getSumaDuracion($date, $idUser, $idFacility);
                            foreach($sumDur['lista'] as $suma)
                            {
                                if((($suma->sumDuration)+$duration) > $duracionMaxima->maxDuration)
                                {
                                    $data['msjError'] = "El numero de horas que ha elegido es demasiado alto, reduzcalo por favor";
                                    $this->vista->mostrar("reservas/formularioReserva", $data);
                                }
                                else
                                {
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
                            }   
                        }
                    }
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
                $idUser = $_REQUEST['idUser'];
                $newDuration = $_REQUEST['duration'];

                if($date < date('Y-m-d'))
                {
                    $data['msjError'] = "No puedes reservar un dia anterior al actual";
                    $this->vista->mostrar("reservas/formularioReserva", $data);
                }

                // Ver horas totales de la instalacion
                $maxDuration['lista'] = $this->instalacion->getMaxDuration($idFacility);

                foreach($maxDuration['lista'] as $duracionMaxima)
                {
                    if($newDuration > $duracionMaxima->maxDuration)
                    {
                        $data['msjError'] = "La duracion de su reserva es demasiado alta";
                        $data['listaReservas'] = $this->reserva->getAll();
                        $this->vista->mostrar("reservas/listaReservas", $data);
                    }
                    else
                    {

                        $sumDur['lista'] = $this->reserva->getSumaDuracion($date, $idUser, $idFacility);
                        foreach($sumDur['lista'] as $suma)
                        {
                            if((($suma->sumDuration)+$newDuration) > $duracionMaxima->maxDuration)
                            {
                                $data['msjError'] = "El numero de horas que ha elegido es demasiado alto, reduzcalo por favor";
                                $data['listaReservas'] = $this->reserva->getAll();
                                    $this->vista->mostrar("reservas/listaReservas", $data);
                            }
                            else
                            {
                                $result = $this->reserva->modificarReserva($idReservation, $price, $time, $date, $idFacility, $duracionMaxima);
        
                                if($result)
                                {
                                    $data['msjInfo'] = "Reserva modificada con exito";
                                    $data['listaReservas'] = $this->reserva->getAll();
                                    $this->vista->mostrar("reservas/listaReservas", $data);
                                }
                                else
                                {
                                    $data['msjError'] = "Error en la modificacion de la reserva";
                                    $data['listaReservas'] = $this->reserva->getAll();
                                    $this->vista->mostrar("reservas/listaReservas", $data);
                                }
                            }
                        }   
                    }
                }
            }
            else
            {
                $data['msjError'] = "No tienes permisos para esto";
                $this->vista->mostrar("login", $data);
            }

        }

        public function diasReservas()
        {
            $idUser = $_REQUEST['id'];
            $fecha = $_REQUEST['fecha'];

            if($idUser != 0)
            {
                $result = $this->reserva->getDate($idUser, $fecha);
                if($result)
                {
                    echo $fecha;
                }
                else
                {
                    echo '0';
                }
            }
            if($idUser == 0)
            {
                $resultado = $this->reserva->getAllDate($fecha);
                if($resultado)
                {
                    echo $fecha;
                }
                else
                {
                    echo '0';
                }
            }

        }

    }