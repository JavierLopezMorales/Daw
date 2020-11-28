<?php

    class Seguridad {

        public function abrirSesion($usuario) 
        {
            $_SESSION["idUser"] = $usuario->idUser;
            $_SESSION["name"] = $usuario->name;
            $_SESSION["lastname1"] = $usuario->lastname1;
            $_SESSION["lastname2"] = $usuario->lastname2;
            $_SESSION["email"] = $usuario->email;
            $_SESSION["type"] = $usuario->type;
            $_SESSION["image"] = $usuario->image;
        }

        public function cerrarSesion() 
        {
            session_destroy();
        }

        public function get($variable) 
        {
            return $_SESSION[$variable];
        }

        public function haySesionIniciada() 
        {
            if (isset($_SESSION["idUser"])) {
                return true;
            } else {
                return false;
            }
        }

        public function errorAccesoNoPermitido() 
        {
			$data['msjError'] = "No tienes permisos para hacer eso";
			$this->vista->mostrar("login", $data);
        }
    }