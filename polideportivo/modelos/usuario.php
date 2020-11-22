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
         * @return True si existe un usuario con ese nombre y contraseña, false en caso contrario
         */
        public function buscarUsuario($usuario,$password) 
        {
            $usuario = $this->db->consulta("SELECT idUser, name, lastname1, lastname2, email, image FROM user WHERE email = '$usuario' AND password = '$password'");
            if ($usuario) {
                return $usuario;
            } else {
                return null;
            }
        }

    }