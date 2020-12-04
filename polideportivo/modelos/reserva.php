<?php

    include_once("DB.php");

    class Reserva
    {
        private $db;

        /**
         * Constructor. Establece la conexión con la BD y la guarda
         * en una variable de la clase
         */
        public function __construct(){
            $this->db = new DB();
        }

        public function getAll()
        {
            $reservation = $this->db->consulta("SELECT * FROM reservation");
            return $reservation;
        }

        public function getAllDate($fecha)
        {
            $reservation = $this->db->consulta("SELECT * FROM reservation WHERE date = '$fecha'");
            return $reservation;
        }

        public function crearReserva($price, $time, $date, $idUser, $idFacility)
        {
            $result = $this->db->manipulacion("INSERT INTO reservation (price, time, date, idUser, idFacility) 
            VALUES ('$price', '$time', '$date', '$idUser', '$idFacility')");
            return $result;
        }

        public function borrarReserva($idReservation)
        {
            $result = $this->db->manipulacion("DELETE FROM reservation WHERE idReservation = '$idReservation'");
            return $result;
        }

        public function getReserva($idReservation)
        {
            $result = $this->db->consulta("SELECT * FROM reservation WHERE idReservation = '$idReservation'");
            return $result;
        }

        public function modificarReserva($idReservation, $price, $time, $date, $idFacility)
        {
            $result = $this->db->manipulacion("UPDATE reservation SET price = '$price', time = '$time', price = '$price', idFacility = '$idFacility' WHERE idReservation = '$idReservation'");
            return $result;
        }

    }