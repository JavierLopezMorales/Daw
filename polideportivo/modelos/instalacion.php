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
        
        /**
         * Envia todos los datos de las instalaciones
         */
        public function getAll()
        {
            $facility = $this->db->consulta("SELECT * FROM facility");
            return $facility;
        }

        /**
         * Busca una instalacion mediante su id
         * @param idFacility la instalacion que se busca
         */
        public function getFacility($idFacility)
        {
            $facility = $this->db->consulta("SELECT * FROM facility WHERE idFacility = '$idFacility'");
            return $facility;
        }

        /**
         * Realiza una busqueda aproximada en la base de datos
         * @param textoBusqueda el texto a buscar
         * @param seleccion la seleccion en la que buscar
         */
        public function busquedaAproximada($textoBusqueda, $seleccion)
        {
            // Buscamos los usuarios de la BD que coincidan con el texto de búsqueda
            $result = $this->db->consulta("SELECT * FROM facility WHERE $seleccion LIKE '%$textoBusqueda%'");
            return $result;
        }

        /**
         * Consigue el id de la instalacion mediante el nombre
         * @param name el nombre de la instalacion
         */
        public function getId($name)
        {
            $facility = $this->db->consulta("SELECT idFacility FROM facility WHERE name = '$name' LIMIT 1");
            return $facility;
        }

        /**
         * Crea una instalacion
         * @param name el nombre de la instalacion
         * @param description la descripcion de la instalacion
         * @param price el precio de la instalacion
         */
        public function crearInstalacion($name, $description, $price)
        {
            $result = $this->db->manipulacion("INSERT INTO facility (name, description, price) 
            VALUES ('$name','$description', '$price')");
            return $result;
        }

        /**
         * Asigna imagen a la instalacion
         * @param idFacility el id de la instalacion
         */
        public function indicarImagen($idFacility)
        {
            $result = $this->db->manipulacion("UPDATE facility SET image = '$idFacility' WHERE idFacility = '$idFacility'");
            return $result;
        }

        /**
         * Borra una instalacion
         * @param idFacility el id de la instalacion a borrar
         */
        public function borrarInstalacion($idFacility)
        {
            $result = $this->db->manipulacion("DELETE FROM facility WHERE idFacility = '$idFacility'");
            return $result;
        }
        
        /**
         * Busca una instalacion mediante su id
         * @param idFacility la instalacion que se busca
         * Hace lo mismo que getFacility() // BORRAR //
         */
        public function getInstalacion($idFacility)
        {
            $facility = $this->db->consulta("SELECT * FROM facility WHERE idFacility = '$idFacility'");
            return $facility;
        }

        /**
         * Modifica la instalacion
         * @param idFacility el id de la instalacion
         * @param name el nombre de la instalacion
         * @param description la descripcion de la instalacion
         * @param price el precio de la instalacion
         */
        public function modificarInstalacion($idFacility, $name, $description, $price)
        {
            $result = $this->db->manipulacion("UPDATE facility SET name = '$name', description = '$description', price = '$price' WHERE idFacility = '$idFacility'");
            return $result;
        }

        /**
         * Busca una instalacion mediante su id
         * @param idFacility la instalacion que se busca
         * Hace lo mismo que getFacility() // BORRAR //
         */
        public function getMaxDuration($idFacility)
        {
            $result = $this->db->consulta("SELECT * FROM facility WHERE idFacility = '$idFacility'");
            return $result;
        }

    }