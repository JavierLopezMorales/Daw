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

        /**
         * Envia todos los datos de la tabla de reservas
         */
        public function getAll()
        {
            $reservation = $this->db->consulta("SELECT * FROM reservation");
            return $reservation;
        }

        /**
         * Envia todos los datos de la tabla reservas donde la fecha sea igual al valor introducido
         * @param fecha la fecha a buscar
         */
        public function getAllDate($fecha)
        {
            $reservation = $this->db->consulta("SELECT * FROM reservation WHERE date = '$fecha'");
            return $reservation;
        }

        /**
         * Crea una reserva
         * @param price el precio de la reserva
         * @param time la hora de la reserva
         * @param date la fecha de la reserva
         * @param idUser el usuario al que se le asigna la reserva
         * @param idFacility la instalacion que se reserva
         * @param duracionMaxima la duracion dee la reserva
         */
        public function crearReserva($price, $time, $date, $idUser, $idFacility, $duracionMaxima)
        {
            $result = $this->db->manipulacion("INSERT INTO reservation (price, time, date, duration, idUser, idFacility) 
            VALUES ('$price', '$time', '$date', '$duracionMaxima', '$idUser', '$idFacility')");
            return $result;
        }

        /**
         * Borra de la base de datos una reserva
         * @param idReservation el id de la reserva a borrar
         */
        public function borrarReserva($idReservation)
        {
            $result = $this->db->manipulacion("DELETE FROM reservation WHERE idReservation = '$idReservation'");
            return $result;
        }

        /**
         * Envia todos los datos de la tabla reservas donde la fecha sea igual al valor introducido
         * @param fecha la fecha a buscar
         */
        public function getReserva($idReservation)
        {
            $result = $this->db->consulta("SELECT * FROM reservation WHERE idReservation = '$idReservation'");
            return $result;
        }

        /**
         * Modifica los datos de la tabla reservas
         * @param idReservation id de la reserva a modificar
         * @param price el precio de la reserva
         * @param time la hora de la reserva
         * @param date la fecha de la reserva
         * @param idUser el usuario al que se le asigna la reserva
         * @param idFacility la instalacion que se reserva
         * @param duracionMaxima la duracion dee la reserva
         */
        public function modificarReserva($idReservation, $price, $time, $date, $idFacility, $duracionMaxima)
        {
            $result = $this->db->manipulacion("UPDATE reservation SET price = '$price', time = '$time', date = '$date', duracionMaxima = '$duracionMaxima' idFacility = '$idFacility' WHERE idReservation = '$idReservation'");
            return $result;
        }

        /**
         * Envia los datos de las reservas del ultimo mes de un usuario
         * @param idUser el usuario del que se buscan las reservas
         * @param fecha la fecha a buscar
         */
        public function getReservasUsuario($idUser, $fecha)
        {
            $result = $this->db->consulta("SELECT * FROM reservation WHERE idUser = '$idUser' AND date > DATE_SUB('$fecha', interval 1 month) AND date < '$fecha'");
            return $result;
        }

        /**
         * Envia todos los datos de la tabla reservas donde la fecha actial sea menor al valor introducido
         * @param idUser el id del usuario
         * @param fecha la fecha a buscar
         */
        public function getReservasProximas($idUser, $fecha)
        {
            $result = $this->db->consulta("SELECT * FROM reservation WHERE idUser = '$idUser' AND date < '$fecha'");
            return $result;
        }

        /**
         * Borra las reservas  futuras de un usuario
         * @param idUser el usuario del que se borran las reservas
         * @param fecha la fecha a buscar
         */
        public function borrarReservasUsuario($idUser, $fecha)
        {
            $result = $this->db->manipulacion("DELETE FROM reservation WHERE idUser = '$idUser' AND date > '$fecha'");
            return $result;
        }

        /**
         * Envia todos los datos de la tabla reservas de un usuario
         * @param idUser el usuario del que se buscan las reservas
         */
        public function getVacio($idUser)
        {
            $result = $this->db->consulta("SELECT * FROM reservation WHERE idUser = '$idUser'");
            return $result;
        }

        /**
         * Envia la duracion total de las reservas de un usuario en una instalacion en un mismo dia
         * @param date la fecha a buscar
         * @param idUser el usuario del que se buscan las reservas
         * @param idFacility la instalacion que se busca
         */
        public function getSumaDuracion($date, $idUser, $idFacility)
        {
            $result = $this->db->consulta("SELECT SUM(duration) AS 'sumDuration' FROM reservation WHERE idUser = '$idUser' AND idFacility = '$idFacility' AND date = '$date'");
            return $result;
        }

        /**
         * Envia todos los datos de la tabla reservas donde la fecha sea igual al valor introducido en un usuario
         * @param idUser el usuario del que se buscan las reservas
         * @param fecha la fecha a buscar
         */
        public function getDate($idUser, $fecha)
        {
            $result = $this->db->consulta("SELECT * FROM reservation WHERE idUser = '$idUser' AND date = '$fecha'");
            return $result;
        }
        
    }