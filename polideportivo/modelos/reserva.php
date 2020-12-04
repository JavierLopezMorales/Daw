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

    }