<?php

    include_once("DB.php");

    class Instalacion
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
            $facility = $this->db->consulta("SELECT * FROM facility");
            return $facility;
        }

        public function getFacility($idFacility)
        {
            $facility = $this->db->consulta("SELECT * FROM facility WHERE idFacility = '$idFacility'");
            return $facility;
        }

        public function busquedaAproximada($textoBusqueda, $seleccion)
        {
            // Buscamos los usuarios de la BD que coincidan con el texto de búsqueda
            $result = $this->db->consulta("SELECT * FROM facility WHERE $seleccion LIKE '%$textoBusqueda%'");
            return $result;
                 
        }

    }