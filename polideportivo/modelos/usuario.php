<?php

    include_once("DB.php");

    class Usuario
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
         * Busca un usuario por nombre de usuario y password
         * @param usuario El nombre del usuario
         * @param password La contraseña del usuario
         */
        public function buscarUsuario($usuario,$password) 
        {
            $usuario = $this->db->consulta("SELECT * FROM user WHERE email = '$usuario' AND password = '$password'");
            if ($usuario) {
                return $usuario[0];
            } else {
                return null;
            }
        }

        /**
         * Busca un usuario por email para comprobar si existe
         * @param email El email del usuario
         */
        public function existeUsuario($email)
        {
            $result = $this->db->consulta("SELECT * FROM user WHERE email = '$email'");
            return $result;
        }

        /**
         * Enviar todos los valores de la tabla usuario
         */
        public function getAll()
        {
            $usuarios = $this->db->consulta("SELECT * FROM user");
            return $usuarios;
        }

        /**
         * Busca un usuario por su id 
         * @param idUser El id del usuario
         */
        public function getUser($idUser)
        {
            $usuario = $this->db->consulta("SELECT * FROM user WHERE idUser = '$idUser'");
            return $usuario;
        }

        /**
         * Busca un usuario por email para conseguir su id
         * @param email El email del usuario
         */
        public function getId($email)
        {
            $usuario = $this->db->consulta("SELECT idUser FROM user WHERE email = '$email' LIMIT 1");
            return $usuario;
        }

        /**
         * Borra un usuario de la base de datos
         * @param idUser El id del usuario
         */
        public function borrarUsuario($idUser)
        {
            $result = $this->db->manipulacion("DELETE FROM user WHERE idUser = '$idUser'");
            return $result;
        }

        /**
         * Se crea un usuario en la bd
         * @param name El nombre del usuario
         * @param lastname1 El primer apellido del usuario
         * @param lastname2 El segundo apellido del usuario
         * @param dni El dni del usuario
         * @param password El password del usuario
         * @param email El email del usuario
         * @param type El tipo del usuario
         */
        public function crearUsuario($name, $lastname1, $lastname2, $dni, $password, $email, $type)
        {
            $result = $this->db->manipulacion("INSERT INTO user (name, lastname1, lastname2, email, dni, password, type) 
            VALUES ('$name','$lastname1', '$lastname2', '$email', '$dni', '$password', '$type')");
            return $result;
        }

        /**
         * Se modifica un usuario en la bd
         * @param idUser El id del usuario
         * @param name El nombre del usuario
         * @param lastname1 El primer apellido del usuario
         * @param lastname2 El segundo apellido del usuario
         * @param dni El dni del usuario
         * @param password El password del usuario
         * @param email El email del usuario
         * @param type El tipo del usuario
         */
        public function modificarUsuario($idUser, $name, $lastname1, $lastname2, $dni, $password, $email, $type, $state)
        {
            $result = $this->db->manipulacion("UPDATE user SET name = '$name', lastname1 = '$lastname1', lastname2 = '$lastname2', email = '$email', dni = '$dni', password = '$password', type = '$type', state = '$state' WHERE idUser = '$idUser'");
            return $result;
        }

        /**
         * Se busca de manera aproximada los datos de la tabla usuario
         * @param textoBusqueda el texto a buscar
         * @param seleccion la seleccion del campo en el que buscar
         */
        public function busquedaAproximada($textoBusqueda, $seleccion)
        {
            // Buscamos los usuarios de la BD que coincidan con el texto de búsqueda
            $result = $this->db->consulta("SELECT * FROM user WHERE $seleccion LIKE '%$textoBusqueda%'");
            return $result;    
        }

        /**
         * Asigna la imagen al usuario
         * @param idUser el id del usuario al que asignar la imagen
         */
        public function indicarImagen($idUser)
        {
            $result = $this->db->manipulacion("UPDATE user SET image = '$idUser' WHERE idUser = '$idUser'");
            return $result;
        }

        /**
         * Se marca como borrado al usuario
         * @param idUser el id del usuario al que marcar borrado
         */
        public function marcarBorrado($idUser)
        {
            $result = $this->db->manipulacion("UPDATE user SET state = 'borrado' WHERE idUser = '$idUser'");
            return $result;
        }

    }