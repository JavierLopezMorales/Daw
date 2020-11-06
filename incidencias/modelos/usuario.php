<?php
    class Usuario {
        private $db;
        
        /**
         * Constructor. Establece la conexión con la BD y la guarda
         * en una variable de la clase
         */
        public function __construct() {
            $this->db = new mysqli("localhost:3306", "root", "", "practica_incidencias");
        }
       
        /**
         * Busca un usuario por nombre de usuario y password
         * @param usuario El nombre del usuario
         * @param passw La contraseña del usuario
         * @return True si existe un usuario con ese nombre y contraseña, false en caso contrario
         */
        public function buscarUsuario($usuario,$passw) {

            if ($result = $this->db->query("SELECT idUsuario, nombre, tipo, email FROM usuarios WHERE nombre = '$usuario' AND contraseña = '$passw'")) {
                if ($result->num_rows == 1) {
                    $usuario = $result->fetch_object();
                    // Iniciamos la sesión
                    $_SESSION["idUsuario"] = $usuario->idUsuario;
                    $_SESSION["nombre"] = $usuario->nombre;
                    $_SESSION["tipo"] = $usuario->tipo;
                    $_SESSION["email"] = $usuario->email;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        }

        /**
         * Busca todos los usuarios de la BD
         * @return arrayResult Todos los usuarios como objetos de un array o null en caso de error
         */
        public function getAll()
        {
            $arrayResult = array();
            if ($result = $this->db->query("SELECT * FROM usuarios
                                                ORDER BY idUsuario")) {
                while ($fila = $result->fetch_object()) {
                    $arrayResult[] = $fila;
                }
            } else {
                $arrayResult = null;
            }
            return $arrayResult;
        }

        /** 
         * Realiza una búsqueda de los usuarios de la BD
         * @param textoBusqueda El texto de búsqueda
         * @param seleccion La selección de búsqueda
         * @return Un array de objetos con los datos de los usuarios encontrados
         */
        public function busquedaAproximada($textoBusqueda, $seleccion)
        {
            $seleccionBusqueda = $seleccion;
            $arrayResult = array();
            // Buscamos los usuarios de la BD que coincidan con el texto de búsqueda
            if($seleccion == null || $seleccion = ""){
                if ($result = $this->db->query("SELECT * FROM usuarios
                    WHERE idUsuario LIKE '%$textoBusqueda%'
                    OR nombre LIKE '%$textoBusqueda%'
                    OR contraseña LIKE '%$textoBusqueda%'
                    OR tipo LIKE '%$textoBusqueda%'
                    OR email LIKE '%$textoBusqueda%'
                    ORDER BY idUsuario")) {
                        while ($fila = $result->fetch_object()) {
                            $arrayResult[] = $fila;
                        }
                } else {
                    $arrayResult = null;
                }
            }else{
                if ($result = $this->db->query("SELECT * FROM usuarios
                    WHERE $seleccionBusqueda LIKE '%$textoBusqueda%'")) {
                        while ($fila = $result->fetch_object()) {
                            $arrayResult[] = $fila;
                        }
                } else {
                    $arrayResult = null;
                }

            }
            return $arrayResult;

        }

    }