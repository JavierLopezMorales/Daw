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

        public function crearReserva($price, $time, $date, $idUser, $idFacility, $duracionMaxima)
        {
            $result = $this->db->manipulacion("INSERT INTO reservation (price, time, date, duration, idUser, idFacility) 
            VALUES ('$price', '$time', '$date', '$duracionMaxima', '$idUser', '$idFacility')");
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

        public function modificarReserva($idReservation, $price, $time, $date, $idFacility, $duracionMaxima)
        {
            $result = $this->db->manipulacion("UPDATE reservation SET price = '$price', time = '$time', date = '$date', duracionMaxima = '$duracionMaxima' idFacility = '$idFacility' WHERE idReservation = '$idReservation'");
            return $result;
        }

        public function getReservasUsuario($idUser, $fecha)
        {
            $result = $this->db->consulta("SELECT * FROM reservation WHERE idUser = '$idUser' AND date > DATE_SUB('$fecha', interval 1 month) AND date < '$fecha'");
            return $result;
        }

        public function getReservasProximas($idUser, $fecha)
        {
            $result = $this->db->consulta("SELECT * FROM reservation WHERE idUser = '$idUser' AND date < '$fecha'");
            return $result;
        }

        public function borrarReservasUsuario($idUser, $fecha)
        {
            $result = $this->db->manipulacion("DELETE FROM reservation WHERE idUser = '$idUser' AND date > '$fecha'");
            return $result;
        }

        public function getVacio($idUser)
        {
            $result = $this->db->consulta("SELECT * FROM reservation WHERE idUser = '$idUser'");
            return $result;
        }

        public function getSumaDuracion($date, $idUser, $idFacility)
        {
            $result = $this->db->consulta("SELECT SUM(duration) AS 'sumDuration' FROM reservation WHERE idUser = '$idUser' AND idFacility = '$idFacility' AND date = '$date'");
            return $result;
        }

        public function getDate($idUser, $fecha)
        {
            $result = $this->db->consulta("SELECT * FROM reservation WHERE idUser = '$idUser' AND date = '$fecha'");
            return $result;
        }
        
    }