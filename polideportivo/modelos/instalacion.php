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

        public function getId($name)
        {
            $facility = $this->db->consulta("SELECT idFacility FROM facility WHERE name = '$name' LIMIT 1");
            return $facility;
        }

        public function crearInstalacion($name, $description, $price)
        {
            $result = $this->db->manipulacion("INSERT INTO facility (name, description, price) 
            VALUES ('$name','$description', '$price')");
            return $result;
        }

        public function indicarImagen($idFacility)
        {
            $result = $this->db->manipulacion("UPDATE facility SET image = '$idFacility' WHERE idFacility = '$idFacility'");
            return $result;
        }

        public function borrarInstalacion($idFacility)
        {
            $result = $this->db->manipulacion("DELETE FROM facility WHERE idFacility = '$idFacility'");
            return $result;
        }

        public function getInstalacion($idFacility)
        {
            $facility = $this->db->consulta("SELECT * FROM facility WHERE idFacility = '$idFacility'");
            return $facility;
        }

        public function modificarInstalacion($idFacility, $name, $description, $price)
        {
            $result = $this->db->manipulacion("UPDATE facility SET name = '$name', description = '$description', price = '$price' WHERE idFacility = '$idFacility'");
            return $result;
        }

    }