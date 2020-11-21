<?php
    class Usuario
    {
        private $db;

        /**
         * Constructor. Establece la conexión con la BD y la guarda
         * en una variable de la clase
         */
        public function __construct(){
            $this->db = new mysqli("localhost:3306", "root", "", "polideportivo");
        }

        /**
         * Busca un usuario por nombre de usuario y password
         * @param usuario El nombre del usuario
         * @param password La contraseña del usuario
         * @return True si existe un usuario con ese nombre y contraseña, false en caso contrario
         */
        public function buscarUsuario($usuario,$password) {

            if ($result = $this->db->query("SELECT idUser, name, lastname1, lastname2, image FROM user WHERE name = '$usuario' AND password = '$password'")) {
                if ($result->num_rows == 1) {
                    $usuario = $result->fetch_object();
                    // Iniciamos la sesión
                    $_SESSION["idUser"] = $usuario->idUser;
                    $_SESSION["name"] = $usuario->name;
                    $_SESSION["lastname1"] = $usuario->lastname1;
                    $_SESSION["lastname2"] = $usuario->lastname2;
                    $_SESSION["image"] = $usuario->image;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        }

    }